<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        $verification = DB::table('email_verifications')->where('token', $token)->first();

        if (!$verification) {
            return redirect()->route('login')->with('errorMessage', 'Token verifikasi tidak valid.');
        }

        $user = User::find($verification->user_id);
        $user->email_verified_at = now();
        $user->save();

        DB::table('email_verifications')->where('token', $token)->delete();

        return redirect()->route('login')->with('successMessage', 'Email Anda berhasil diverifikasi.');
    }
}
