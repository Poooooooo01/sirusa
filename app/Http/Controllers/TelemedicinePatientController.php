<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class TelemedicinePatientController extends Controller
{
    public function indexByConsultation($consultationId)
    {
        // Load telemedicines along with their details
        $consultation = Consultation::with('telemedicines.details')->findOrFail($consultationId);
        $telemedicines = $consultation->telemedicines;

        // Calculate total for each telemedicine
        foreach ($telemedicines as $telemedicine) {
            $telemedicine->total = $telemedicine->details->sum('total');
        }

        return view('patient.telemedicine', compact('telemedicines', 'consultation'));
    }

    public function checkout(Request $request)
    {
        // Validate the request
        $request->validate([
            'telemedicine_id' => 'required|exists:telemedicine,id'
        ]);

        $telemedicine = Telemedicine::with('details')->findOrFail($request->telemedicine_id);
        $totalAmount = $telemedicine->details->sum('total');

        // Assuming patient is related to telemedicine through consultation
        $consultation = $telemedicine->consultation;
        $patient = $consultation->patient;

        // Assuming Patient model has a relationship with User model
        $user = $patient->user;
        $email = $user->email ?? 'default@example.com';

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $telemedicine->id,
                'gross_amount' => $totalAmount,
            ),
            'customer_details' => array(
                'first_name' => $patient->nama,
                'last_name' => '',
                'email' => $email,
                'phone' => $patient->emergency_contact,
                'address' => $patient->address
            ),
        );

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $error = null;
        } catch (\Exception $e) {
            // Handle the error appropriately
            $snapToken = null;
            $error = 'Invalid or expired token. Please try again.';
        }

        // Send invoice email
        Mail::to($email)->send(new InvoiceMail($telemedicine, $totalAmount));

        return view('patient.payment', compact('snapToken', 'telemedicine', 'error'));
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $telemedicine = Telemedicine::findOrFail($request->order_id);
                $telemedicine->status = 'paid';
                $telemedicine->save();

                return redirect()->route('telemedicine.indexByConsulPatient', ['consultationId' => $telemedicine->consultation_id])
                    ->with('success', 'Payment Success');
            }
        }

        return response()->json(['status' => 'ok']);
    }
}






