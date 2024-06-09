<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function index()
    {
        $galleries = Galleries::all();
        return view('gallery.index', ['title' => 'Gallery', 'galleries' => $galleries]);
    }

    public function create()
    {
        return view('gallery.form', ['title' => 'Tambah gallery']);
    }

    public function store(Request $request)
    {
        $messages = [
            'photo.required' => 'Photo wajib diisi',
        ];

        $data = $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
        ], $messages);

        try {
            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file("photo")->store('img', 'public');
            } else {
                $data['photo'] = null;
            }

            Galleries::create($data);

            return redirect()->route('gallery.index')->with("successMessage", "Tambah data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('gallery.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $gallery = Galleries::findOrFail($id);
        return view('gallery.form', ['title' => 'Edit gallery', 'gallery' => $gallery]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'photo.required' => 'Photo wajib diisi',
        ];

        $data = $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
        ], $messages);

        try {
            $gallery = Galleries::findOrFail($id);

            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file("photo")->store('img', 'public');
            } else {
                $data['photo'] = $gallery->photo; // Retain the old photo if no new file is uploaded
            }

            $gallery->update($data);

            return redirect()->route('gallery.index')->with("successMessage", "Edit data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('gallery.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $gallery = Galleries::findOrFail($id);
            $gallery->delete();
            return redirect()->route('gallery.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('gallery.index')->with("errorMessage", $th->getMessage());
        }
    }
}

