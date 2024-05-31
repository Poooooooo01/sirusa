<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::with('category')->orderBy('description')->get();
        return view('drug.index', ['title' => 'Drugs', 'drugs' => $drugs]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('drug.form', ['title' => 'Tambah Obat', 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'Harap isi deskripsi',
            'category_id.required' => 'Pilih kategori',
        ];

        $data = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
            'description' => 'required',
            'category_id' => 'required',
        ], $messages);


        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('img', 'public');
        }else{
            $data['image'] = null;
        }

        Drug::create($data);

        return redirect()->route('drug.index')->with("successMessage", "Tambah data sukses");
    }

    public function show(string $id)
    {
        $drug = Drug::findOrFail($id);
        return view('drug.detail', ['title' => 'Detail Obat', 'drug' => $drug]);
    }

    public function edit(string $id)
    {
        $drug = Drug::findOrFail($id);
        $categories = Category::all();
        return view('drug.form', ['title' => 'Edit Obat', 'drug' => $drug, 'categories' => $categories]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'description.required' => 'Harap isi deskripsi',
            'category_id.required' => 'Pilih kategori',
        ];

        $data = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
            'description' => 'required',
            'category_id' => 'required',
        ], $messages);

            $drug = Drug::find($id);

            if($request->hasFile('image')){
                //use Illuminate\Support\Facades\Storage;
                if($drug->image) {
                    Storage::delete($drug->image);
                }
                $data['image'] = $request->file('image')->store('img', 'public');
            }else{
                $data['image'] = $drug->image;
            }
        $drug = Drug::findOrFail($id);
        $drug->update($data);

        return redirect()->route('drug.index')->with("successMessage", "Edit data sukses");
    }

    public function destroy(string $id)
    {
        try {
            $drug = Drug::findOrFail($id);
            $drug->delete();
            return redirect()->route('drug.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('drug.index')->with("errorMessage", $th->getMessage());
        }
    }
}
