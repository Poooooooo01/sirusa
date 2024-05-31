<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Consultation;
use Illuminate\Http\Request;

class TelemedicineAdminController extends Controller
{
    public function index()
    {
        $telemedicines = Telemedicine::orderBy('description')->get();
        return view('telemedicine.index', ['title' => 'telemedicines', 'telemedicines' => $telemedicines]);
    }

    public function create()
    {
        $consultations = Consultation::all();
        return view('telemedicine.form', ['title' => 'Tambah', 'consultations' => $consultations]);
    }

    public function store(Request $request)
    {
        $messages = [
            'service_name.required' => 'Harap isi service_name',
            'description.required' => 'Harap isi deskripsi',
            'price.required' => 'Harap isi price',
            'consultation_id.required' => 'Pilih Consultation',
        ];

        $data = $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'consultation_id' => 'required',
        ], $messages);

        Telemedicine::create($data);

        return redirect()->route('telemedicine.index')->with("successMessage", "Tambah data sukses");
    }

    public function show(string $id)
    {
        $telemedicine = Telemedicine::findOrFail($id);
        return view('telemedicine.detail', ['title' => 'Detail Obat', 'telemedicine' => $telemedicine]);
    }

    public function edit(string $id)
{
    $telemedicine = Telemedicine::with('consultation.doctor')->findOrFail($id);
    $consultations = Consultation::with('doctor')->get();
    return view('telemedicine.form', [
        'title' => 'Edit Obat', 
        'telemedicine' => $telemedicine, 
        'consultations' => $consultations
    ]);
}


    public function update(Request $request, string $id)
    {
        $messages = [
            'service_name.required' => 'Harap isi service_name',
            'description.required' => 'Harap isi deskripsi',
            'consultation_id.required' => 'Pilih kategori',
        ];

        $data = $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'consultation_id' => 'required',
        ], $messages);

        $telemedicine = Telemedicine::findOrFail($id);
        $telemedicine->update($data);

        return redirect()->route('telemedicine.index')->with("successMessage", "Edit data sukses");
    }

    public function destroy(string $id)
    {
        try {
            $telemedicine = Telemedicine::findOrFail($id);
            $telemedicine->delete();
            return redirect()->route('telemedicine.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('telemedicine.index')->with("errorMessage", $th->getMessage());
        }
    }
}