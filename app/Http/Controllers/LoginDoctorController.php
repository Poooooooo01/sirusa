<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginDoctorController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function doctorLogin()
    {
        return view('logindoctor.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->role === 'dokter') {
                Auth::login($user);
                return redirect()->intended(route('doctor.index')); // Use named route
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
