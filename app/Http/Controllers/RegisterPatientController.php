<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Str;


class RegisterPatientController extends Controller
{
    public function showRegistrationForm()
    {
        return view('patient.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'nik.required' => 'Harap isi NIK dengan benar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'date_of_birth.required' => 'Isi tanggal lahir dengan benar.',
            'gender.required' => 'Pilih jenis kelamin.',
            'address.required' => 'Isi alamat dengan benar.',
            'emergency_contact.required' => 'Isi kontak darurat dengan benar.',
            'nama.required' => 'Harap isi nama dengan benar.',
        ];

        $data = $request->validate([
            'nik' => 'required|unique:patients',
            'nama' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',
        ], $messages);

        try {
            DB::beginTransaction();

            $user = User::create([
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data["password"]),
                'role' => $data['role'],
            ]);

            Patient::create([
                'id' => $user->id,
                'nik' => $data['nik'],
                'nama' => $data['nama'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'emergency_contact' => $data['emergency_contact'],
            ]);

            // Buat token verifikasi
            $token = Str::random(64);

            // Simpan token ke database
            DB::table('email_verifications')->insert([
                'user_id' => $user->id,
                'token' => $token,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Kirim Email Verifikasi
            $emailData = [
                'email' => $data['email'],
                'subject' => 'Email Verification',
                'view' => 'emails.verify',
                'token' => $token,
            ];

            Mail::to($data['email'])->send(new SendEmail($emailData));

            DB::commit();
            return redirect()->route('login')->with("successMessage", "Selamat Proses Register Anda Sukses. Silakan cek email untuk verifikasi.");
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('login')->with("errorMessage", $th->getMessage());
        }
    }
}

