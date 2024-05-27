<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorAdminController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->orderBy('NIK')->get();

        return view('admin.doctor.index', ['title' => 'doctors', 'doctors' => $doctors]);
    }

    public function create()
    {
        //  User::where('role', 'pasien')
        //     ->whereDoesntHave('patient') // Menyaring hanya pengguna yang belum memiliki pasien
        //     ->get();
        return view('admin.doctor.form', ['title' => 'Tambah Pengguna']);
    }

    public function store(Request $request)
    {
        $messages = [
            'nik.required' => 'Harap isi NIK dengan benar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'name.required' => 'Harap isi nama dengan benar.',
            'specialization' => 'Isi specialization dengan benar.',
            'education.required' => 'Silahkan isi educationnya',
            'office_number.required' => 'Isi Office number dengan benar.',
        ];

        $data = $request->validate([
            'nik' => 'required|unique:patients',
            'name' => 'required|string|max:255', // Tambahkan validasi untuk nama
            'specialization' => 'required',
            'education' => 'required',
            'office_number' => 'required',
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
    
            Doctor::create([
                'id' => $user->id,
                'nik' =>  $data['nik'],
                'name' => $data['name'],
                'specialization' => $data['specialization'],
                'education' => $data['education'],
                'office_number' => $data['office_number'],     
            ]);

            DB::commit();
            return redirect()->route('doctoradmin.index')->with("successMessage", "Tambah data sukses");    
        } catch (\Throwable $th) {
            DB::rollback();            
            return redirect()->route('doctoradmin.index')->with("errorMessage", $th->getMessage());
        } 
    }

    public function show($id)
    {
        $doctors = Doctor::findOrFail($id);
        return view('admin.doctor.detail', ['title' => 'Detail Pengguna', 'doctor' => $doctors]);
    }

    public function edit($id)
    {
        $doctors = Doctor::findOrFail($id);
        $users = User::where('role', 'doctor')
            ->whereDoesntHave('Doctor')
            ->orWhere('id', $doctors->user_id) // Menyertakan pengguna saat ini
            ->get();
        return view('admin.doctor.form', ['title' => 'Edit Pengguna', 'doctor' => $doctors, 'users' => $users]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'nik.required' => 'Harap isi NIK dengan benar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'name.required' => 'Harap isi nama dengan benar.',
            'specialization' => 'Isi specialization dengan benar.',
            'education.required' => 'Silahkan isi educationnya',
            'office_number.required' => 'Isi Office number dengan benar.',
        ];

        $data = $request->validate([
            'nik' => 'required|unique:patients,nik,' . $id,
            'name' => 'required',
            'specialization' => 'required',
            'education' => 'required',
            'office_number' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',
        ], $messages);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);

        return redirect()->route('doctoradmin.index')->with("successMessage", "Edit data sukses");
    }


    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            return redirect()->route('doctoradmin.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('doctoradmin.index')->with("errorMessage", $th->getMessage());
        }
    }
}
