<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Consultation;

class ConversationController extends Controller
{
    public function show($consultation_id)
    {
        $consultation = Consultation::find($consultation_id); // Ambil konsultasi berdasarkan ID
        $messages = Conversation::where('consultation_id', $consultation_id)->get();
        return view('patient.appointment.conversation', compact('messages', 'consultation_id', 'consultation')); // Kirim variabel $consultation ke tampilan
    }

    public function store(Request $request)
    {
        $request->validate([
            'consultation_id' => 'required',
            'message' => 'required',
            'sender' => 'required',
        ]);

        Conversation::create($request->all());

        return back()->with('success', 'Message sent successfully!');
    }
}

