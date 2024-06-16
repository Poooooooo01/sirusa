<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Consultation;
use Illuminate\Http\Request;

class TelemedicinePatientController extends Controller
{
    public function indexByConsultation($consultationId)
    {
        $consultation = Consultation::with('telemedicines')->findOrFail($consultationId);
        $telemedicines = $consultation->telemedicines;

        return view('patient.telemedicine', compact('telemedicines', 'consultation'));
    }
}
