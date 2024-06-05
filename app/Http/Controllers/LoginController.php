<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function adminLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Check if user role is admin or superadmin
            if ($user->role == 'admin' || $user->role == 'superadmin') {
                Auth::login($user);
                return redirect()->intended(route('admin.index')); // Use named route
            } else {
                return back()->with('error', 'Tempatmu bukan disini');
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
