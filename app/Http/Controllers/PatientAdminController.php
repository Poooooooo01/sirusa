<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PatientAdminController extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->orderBy('NIK')->get();

        return view('admin.patient.index', ['title' => 'patients', 'patients' => $patients]);
    }

    public function create()
    {
        //  User::where('role', 'pasien')
        //     ->whereDoesntHave('patient') // Menyaring hanya pengguna yang belum memiliki pasien
        //     ->get();
        return view('admin.patient.form', ['title' => 'Tambah Pengguna']);
    }

    public function store(Request $request)
    {
        $messages = [
            'nik.required' => 'Harap isi NIK dengan benar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'date_of_birth.required' => 'Isi tanggal lahir dengan benar.',
            'gender.required' => 'Pilih jenis kelamin.',
            'address.required' => 'Isi alamat dengan benar.',
            'emergency_contact.required' => 'Isi kontak darurat dengan benar.',
            'nama.required' => 'Harap isi nama dengan benar.', // Tambahkan pesan validasi untuk nama
        ];

        $data = $request->validate([
            'nik' => 'required|unique:patients',
            'nama' => 'required|string|max:255', // Tambahkan validasi untuk nama
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',            
        ], $messages);
        try {
            //use Illuminate\Support\Facades\DB;
            DB::beginTransaction();

            $user = User::create([
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data["password"]),
                'role' => $data['role'], 
            ]);
    
            Patient::create([
                'id' => $user->id,
                'nik' =>  $data['nik'],
                'nama' => $data['nama'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'emergency_contact' => $data['emergency_contact'],       
            ]);

            DB::commit();
            return redirect()->route('patientadmin.index')->with("successMessage", "Tambah data sukses");    
        } catch (\Throwable $th) {
            DB::rollback();            
            return redirect()->route('patientadmin.index')->with("errorMessage", $th->getMessage());
        } 
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patient.detail', ['title' => 'Detail Pengguna', 'patient' => $patient]);
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $users = User::where('role', 'pasien')
            ->whereDoesntHave('patient')
            ->orWhere('id', $patient->user_id) // Menyertakan pengguna saat ini
            ->get();
        return view('admin.patient.form', ['title' => 'Edit Pengguna', 'patient' => $patient, 'users' => $users]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'nik.required' => 'Harap isi NIK dengan benar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'date_of_birth.required' => 'Isi tanggal lahir dengan benar.',
            'gender.required' => 'Pilih jenis kelamin.',
            'address.required' => 'Isi alamat dengan benar.',
            'emergency_contact.required' => 'Isi kontak darurat dengan benar.',
            'user_id.required' => 'Pilih pengguna.',
            'user_id.unique' => 'Pengguna ini sudah terdaftar sebagai pasien.',
        ];

        $data = $request->validate([
            'nik' => 'required|unique:patients,nik,' . $id,
            'nama' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'user_id' => 'required|exists:users,id',
        ], $messages);

        $patient = Patient::findOrFail($id);
        $patient->update($data);

        return redirect()->route('patientadmin.index')->with("successMessage", "Edit data sukses");
    }


    public function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->delete();
            return redirect()->route('patientadmin.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('patientadmin.index')->with("errorMessage", $th->getMessage());
        }
    }
}
