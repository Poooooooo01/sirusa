<?php

namespace App\Http\Controllers;

use App\Models\HomeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Configuration;
use App\Models\Facility;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\Patient;
use App\Models\User;
use App\Models\AboutDetail;
use App\Models\Galleries; // Tambahkan model Galleries
use App\Models\Testimonials;
use App\Models\Report;

class LandingpageController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $aboutDetails = AboutDetail::all();
        $configurations = Configuration::all();
        $doctors = Doctor::all();
        $homeDetails = HomeDetail::all();
        $facilities = Facility::all();
        $doctorsCount = Doctor::count();
        $patientCount = Patient::count();
        $adminCount = User::where('role', 'admin')->orWhere('role', 'superadmin')->count();
        $galleries = Galleries::all();
        $testimonials = Testimonials::all();

        return view('dashboard.index', compact('adminCount', 'doctorsCount', 'patientCount', 'doctors', 'facilities', 'configurations', 'faqs', 'aboutDetails', 'homeDetails', 'testimonials', 'galleries'));
    }
}
