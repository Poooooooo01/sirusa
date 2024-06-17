<?php

// app/Http/Controllers/TestimonialsController.php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            // Redirect to biodata edit page if patient data does not exist
            return redirect()->route('biodata.create')->with('warning', 'Please complete your biodata before submitting a testimonial.');
        }

        return view('testimonials.create', ['patient' => $patient]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'commentar' => 'required|string',
            'star_rating' => 'required',
        ]);

        Testimonials::create($request->all());

        return redirect()->route('testimonial.create')->with('success', 'Thanks for your review');
    }

    public function destroy($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
