<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $facilitiesCount = Facility::count();
        $patientCount = Patient::count();

        return view('doctor.index', compact('facilitiesCount', 'patientCount'));
    }

    // public function patient()
    // {
    //     $patient = Patient::all();

    //     return view('patient.biodata');
    // }
}
