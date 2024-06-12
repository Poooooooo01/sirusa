<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
                return redirect()->intended(route('patient.index'));
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

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email does not exist');
        }

        $token = Str::random(60);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::to($request->email)->send(new SendEmail([
            'subject' => 'Password Reset Request',
            'view' => 'email.passwordReset',
            'token' => $token
        ]));

        return back()->with('success', 'We have emailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed'
        ]);

        $passwordReset = \DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if (!$passwordReset) {
            return back()->with('error', 'Invalid token');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return back()->with('error', 'Email does not exist');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        \DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('login')->with('nganu', 'Password has been reset');
    }

}
