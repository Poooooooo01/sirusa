<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifyEmailNotification;

class SocialiteController extends Controller
{
    protected $redirectTo = 'patient';

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $userFromGoogle = Socialite::driver('google')->stateless()->user();
            $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

            if (!$userFromDatabase) {
                // Check if email already exists
                $userByEmail = User::where('email', $userFromGoogle->getEmail())->first();
                
                if ($userByEmail) {
                    // Update user with google_id and login
                    $userByEmail->update([
                        'google_id' => $userFromGoogle->getId(),
                    ]);

                    auth()->login($userByEmail);
                    return redirect()->intended($this->redirectTo);
                } else {
                    $newUser = User::create([
                        'google_id' => $userFromGoogle->getId(),
                        'username' => $userFromGoogle->getName(), // Adjust this based on your User model
                        'email' => $userFromGoogle->getEmail(),
                        'email_verified_at' => null, // Set email_verified_at to null initially
                        'email_verification_token' => Str::random(32), // Generate verification token
                        'password' => Hash::make("")
                    ]);

                    // Send email verification
                    $this->sendEmailVerification($newUser);

                    // Redirect to home or dashboard
                    auth()->login($newUser);
                    return redirect()->intended($this->redirectTo);
                }
            } else {
                auth()->login($userFromDatabase);
                return redirect()->intended($this->redirectTo);
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with("errorMessage", $e->getMessage());
        }
    }

    protected function sendEmailVerification($user)
    {
        $token = Str::random(32);

        DB::beginTransaction();

        try {
            // Insert verification token to database
            DB::table('email_verifications')->insert([
                'user_id' => $user->id,
                'token' => $token,
                'created_at' => now(),
            ]);

            DB::commit();

            // Send email verification notification
            Notification::route('mail', $user->email)
                        ->notify(new VerifyEmailNotification($token));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e; // Throw the exception to handle it further if needed
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}

