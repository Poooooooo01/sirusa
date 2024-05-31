<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Menambahkan use statement untuk model Doctor
use App\Models\Patient; // Menambahkan use statement untuk model Patient
use App\Models\User; // Menambahkan use statement untuk model User

class LandingpageController extends Controller
{
    public function index()
    {

        $doctors = Doctor::all();
        $doctorsCount = Doctor::count();
        $patientCount = Patient::count();
        $adminCount = User::where('role', 'admin')->orWhere('role', 'superadmin')->count();

        return view('dashboard.index', compact('adminCount', 'doctorsCount', 'patientCount'));
        return view('dashboard.index', compact('doctors'));
        // $data = [
        //     "title" => "Dashboard",
        // ];
        // return view("dashboard.index", $data);
    }
}
