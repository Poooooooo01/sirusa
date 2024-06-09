<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Models\Consultation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $doctorsCount = Doctor::count();
        $patientCount = Patient::count();
        $adminCount = User::where('role', 'admin')->orWhere('role', 'superadmin')->count();
        $appointmentCount = Consultation::count();

        return view("admin.index", compact('doctorsCount', 'patientCount', 'adminCount', 'appointmentCount'));
    }
}

