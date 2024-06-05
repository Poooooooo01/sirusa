<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $facilitiesCount = Facility::count();
        $doctorsCount = Doctor::count();

        return view('patient.index', compact('facilitiesCount', 'doctorsCount'));
    }

    // public function patient()
    // {
    //     $patient = Patient::all();

    //     return view('patient.biodata');
    // }
}
