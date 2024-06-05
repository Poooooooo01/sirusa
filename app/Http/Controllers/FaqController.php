<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faq.index', ['title' => 'faqs', 'faqs' => $faqs]);
    }

    public function create()
    {
        return view('faq.form', ['title' => 'Tambah ']);
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $messages = [
            'question.nullable' => 'Harap isi pertanyaan',
            'answer.nullable' => 'Isi Jawabannya',
        ];

        $data = $request->validate([
            'question' => 'nullable',
            'answer' => 'nullable',
        ], $messages);

        Faq::create($data);

        return redirect()->route('faq.index')->with("successMessage", "Add data sukses");
    }

    public function show(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.detail', ['title' => 'Detail faq', 'faq' => $faq]);
    }

    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.form', ['title' => 'Edit faq', 'faq' => $faq]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'question.nullable' => 'Harap isi pertanyaan',
            'answer.nullable' => 'Isi Jawabannya',
        ];

        $data = $request->validate([
            'question' => 'nullable',
            'answer' => 'nullable',
        ], $messages);

        $faq = Faq::findOrFail($id);
        $faq->update($data);

        return redirect()->route('faq.index')->with("successMessage", "Edit data sukses");
    }

    public function destroy(string $id)
    {
        try {
            $user = Faq::findOrFail($id);
            $user->delete();
            return redirect()->route('faq.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('faq.index')->with("errorMessage", $th->getMessage());
        }
    }
}
