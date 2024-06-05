<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Consultation;
use Illuminate\Http\Request;

class TelemedicineAdminController extends Controller
{
    public function indexByConsultation($consultationId)
    {
        $consultation = Consultation::with('telemedicines')->findOrFail($consultationId);
        $telemedicines = $consultation->telemedicines;

        return view('telemedicine.index', compact('telemedicines', 'consultation'));
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
            'consultation_id.required' => 'Pilih Consultation',
        ];

        $data = $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'consultation_id' => 'required|exists:consultations,id',
        ], $messages);

        $telemedicine = Telemedicine::create($data);

        return redirect()->route('telemedicine.indexByConsultation', $telemedicine->consultation_id)->with("successMessage", "Tambah data sukses");
    }

    public function createFromConsultation($consultationId)
    {
        $consultation = Consultation::with('doctor')->findOrFail($consultationId);
        return view('telemedicine.form', [
            'title' => 'Tambah Telemedicine',
            'consultation' => $consultation,
        ]);
    }

    public function storeFromConsultation(Request $request)
    {
        $consultation = Consultation::findOrFail($request->consultation_id);

        $telemedicine = new Telemedicine();
        $telemedicine->service_name = $request->service_name;
        $telemedicine->description = $request->description ?? 'No description';
        $telemedicine->consultation_id = $consultation->id;
        $telemedicine->save();

        return redirect()->route('telemedicine.indexByConsultation', $consultation->id)->with("successMessage", "Telemedicine created successfully for consultation #{$consultation->id}");
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
            'consultation_id' => 'required|exists:consultations,id',
        ], $messages);

        $telemedicine = Telemedicine::findOrFail($id);
        $telemedicine->update($data);

        return redirect()->route('telemedicine.indexByConsultation', $telemedicine->consultation_id)->with("successMessage", "Edit data sukses");
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
