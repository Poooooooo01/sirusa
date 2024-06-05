<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginPatientController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function patientLogin()
    {
        return view('loginpatient.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->role === 'pasien') {
                Auth::login($user);
                return redirect()->intended(route('patient.index')); // Use named route
            } else {
                return back()->with('error', 'You do not have access to this area');
            }
        } else {
            return back()->with('error', 'Invalid username or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
