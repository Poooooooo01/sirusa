<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configuration; // Menambahkan use statement untuk model Doctor
use App\Models\Facility; // Menambahkan use statement untuk model Doctor
use App\Models\Doctor; // Menambahkan use statement untuk model Doctor
use App\Models\Faq;
use App\Models\Patient; // Menambahkan use statement untuk model Patient
use App\Models\User; // Menambahkan use statement untuk model User
use App\Models\AboutDetail;

class LandingpageController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $aboutDetails = AboutDetail::all();
        $configurations = Configuration::all();
        $doctors = Doctor::all();
        $facilities = Facility::all();
        $doctorsCount = Doctor::count();
        $patientCount = Patient::count();
        $adminCount = User::where('role', 'admin')->orWhere('role', 'superadmin')->count();

        return view('dashboard.index', compact('adminCount', 'doctorsCount', 'patientCount', 'doctors', 'facilities', 'configurations', 'faqs', 'aboutDetails'));
        // $data = [
        //     "title" => "Dashboard",
        // ];
        // return view("dashboard.index", $data);
    }
}
