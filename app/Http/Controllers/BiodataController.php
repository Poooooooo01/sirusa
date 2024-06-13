<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $patient = Patient::where('id', Auth::user()->id)->first();

            // Check if patient data exists
            if ($patient) {
                return view('patient.biodata', ['patient' => $patient]);
            } else {
                // Jika data tidak ada, kirimkan variabel $showModal untuk menampilkan modal di halaman yang sama
                return view('patient.biodata', ['showModal' => true]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('patient.form');
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:255',
        ]);

        // Create new patient record
        $patient = new Patient();
        $patient->id = Auth::user()->id; // Assuming 'id' is the foreign key in 'patients' table referencing 'users' table
        $patient->nama = $request->nama;
        $patient->nik = $request->nik;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->emergency_contact = $request->emergency_contact;
        $patient->save();

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil disimpan.');
    }
}
