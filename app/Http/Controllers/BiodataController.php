<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class BiodataController extends Controller
{
    public function index()
    {
        if (Auth::check()) { 
            $patients = Patient::where('id', Auth::id())->get(); 
            return view('patient.biodata', ['patients' => $patients]);
        } else {
            return redirect()->route('login');
        }
    }
}

