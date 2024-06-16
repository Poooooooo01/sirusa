<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Consultation;
use Illuminate\Http\Request;

class TelemedicineController extends Controller
{
    public function indexByConsultation($consultationId)
    {
        $consultation = Consultation::with('telemedicines')->findOrFail($consultationId);
        $telemedicines = $consultation->telemedicines;

        return view('doctor.telemedicine.index', compact('telemedicines', 'consultation'));
    }

    public function create($consultationId)
    {
        \Log::info('Telemedicine create method accessed by user: ' . auth()->user()->id);
        $consultation = Consultation::findOrFail($consultationId);
        return view('doctor.telemedicine.form', compact('consultation'));
    }

    public function store(Request $request)
    {
        $messages = [
            'service_name.required' => 'Harap isi service_name',
            'description.required' => 'Harap isi deskripsi',
            'consultation_id.required' => 'Pilih Consultation',
        ];

        $data = $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'consultation_id' => 'required|exists:consultations,id',
        ], $messages);

        $telemedicine = Telemedicine::create($data);

        return redirect()->route('telemedicine.indexByConsul', $telemedicine->consultation_id)->with("successMessage", "Tambah data sukses");
    }


    public function show(string $id)
    {
        $telemedicine = Telemedicine::findOrFail($id);
        return view('telemedicine.detail', ['title' => 'Detail Obat', 'telemedicine' => $telemedicine]);
    }

    public function edit($id)
    {
        $telemedicine = Telemedicine::with('consultation.doctor')->findOrFail($id);
        $consultations = Consultation::with('doctor')->get();

        return view('doctor.telemedicine.form', [
            'title' => 'Edit Telemedicine',
            'telemedicine' => $telemedicine,
            'consultations' => $consultations, // Perlu perbaikan dari $consultation ke $consultations
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
            'consultation_id' => 'required|exists:consultations,id',
        ], $messages);

        $telemedicine = Telemedicine::findOrFail($id);
        $telemedicine->update($data);

        return redirect()->route('telemedicine.indexByConsul', $telemedicine->consultation_id)->with("successMessage", "Edit data sukses");
    }

    public function destroy(string $id)
    {
        try {
            $telemedicine = Telemedicine::findOrFail($id);
            $consultationId = $telemedicine->consultation_id;
            $telemedicine->delete();
            return redirect()->route('telemedicine.indexByConsultation', $consultationId)->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('telemedicine.indexByConsultation', $consultationId)->with("errorMessage", $th->getMessage());
        }
    }
}
