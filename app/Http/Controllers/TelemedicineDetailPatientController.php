<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Drug;
use App\Models\TelemedicineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelemedicineDetailPatientController extends Controller
{
    public function index(Telemedicine $telemedicine)
    {
        $details = $telemedicine->details; // Eloquent relationship
        return view('patient.telemedicinedetail', ['details' => $details, 'telemedicine' => $telemedicine]);
    }
}
