<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AppointmentDoctorController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['doctor', 'patient'])->where('doctor_id', Auth::id())->get();
        return view('doctor.appointment.index', compact('consultations'));
    }
}

