<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['patient', 'doctor'])->get();
        return view('consultation.index', compact('consultations'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        
        return view('consultation.form', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'consultation_date' => 'required|date',
            'status' => 'required|in:completed,scheduled,canceled',
            'notes' => 'nullable|string',
        ]);

        Consultation::create($request->all());

        return redirect()->route('consultation.index')->with('successMessage', 'Consultation added successfully');
    }

    public function show($id)
    {
        $consultation = Consultation::with(['patient', 'doctor'])->findOrFail($id);
        return view('consultation.detail', compact('consultation'));
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return redirect()->route('consultation.index')->with('successMessage', 'Consultation deleted successfully');
    }
}
