<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class DrugDoctorController extends Controller
{
    public function index()
    {
        $drugs = Drug::with('category', 'brand')->orderBy('description')->get();
        return view('doctor.drug.index', ['title' => 'Drugs', 'drugs' => $drugs]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('doctor.drug.form', ['title' => 'Tambah Obat', 'categories' => $categories, 'brands' => $brands]);
    }

    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'Harap isi deskripsi',
            'category_id.required' => 'Pilih kategori',
        ];

        $data = $request->validate([
            'drug_name' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
        ], $messages);

        try {
            if($request->hasFile('image')) {
                $data['image'] = $request->file("image")->store('img', 'public');
            } else {
                $data['image'] = null;
            }

            Drug::create($data);

            return redirect()->route('drugdoctor.index')->with("successMessage", "Tambah data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('drugdoctor.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $drug = Drug::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('doctor.drug.form', ['title' => 'Edit Obat', 'drug' => $drug, 'categories' => $categories, 'brands' => $brands]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'description.required' => 'Harap isi deskripsi',
            'category_id.required' => 'Pilih kategori',
        ];

        $data = $request->validate([
            'drug_name' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:2048',
        ], $messages);

        try {
            if($request->hasFile('image')) {
                $data['image'] = $request->file("image")->store('img', 'public');
            } else {
                unset($data['image']);
            }

            $drug = Drug::findOrFail($id);
            $drug->update($data);

            return redirect()->route('drugdoctor.index')->with("successMessage", "Edit data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('drugdoctor.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $drug = Drug::findOrFail($id);
            $drug->delete();
            return redirect()->route('drugdoctor.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('drugdoctor.index')->with("errorMessage", $th->getMessage());
        }
    }
}
