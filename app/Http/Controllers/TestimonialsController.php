<?php

// app/Http/Controllers/TestimonialsController.php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::all(); 
        return view('testimonials.index', ['testimonials' => $testimonials]);
    }

    public function create()
    {
        $patient = Auth::user()->patient; // Get the logged-in user's patient information
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
