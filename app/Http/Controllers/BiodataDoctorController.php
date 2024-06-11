<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class BiodataDoctorController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $doctors = Doctor::where('id', Auth::id())->get();
            return view('doctor.biodatadoctor', ['doctors' => $doctors]);
        } else {
            return redirect()->route('login');
        }
    }
}
