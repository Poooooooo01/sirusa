<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['doctor', 'patient'])->where('patient_id', Auth::id())->get();
        return view('patient.appointment.index', compact('consultations'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('patient.appointment.form', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'consultation_date' => 'required|date_format:Y-m-d\TH:i',
            'notes' => 'nullable|string',
        ]);

        Consultation::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'consultation_date' => $request->consultation_date,
            'status' => 'offering',
            'notes' => $request->notes,
        ]);

        return redirect()->route('appointment.index')->with('success', 'Consultation request submitted successfully.');
    }
}

