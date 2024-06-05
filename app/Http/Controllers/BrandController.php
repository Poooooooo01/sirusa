<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Drug;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', ['title' => 'Brand', 'brands' => $brands]);
    }

    public function create()
    {
        return view('brand.form', ['title' => 'Tambah Brand']);
    }

    public function store(Request $request)
    {
        $messages = [
            'brand.required' => 'Nama kategori wajib diisi',
        ];

        $data = $request->validate([
            'brand' => 'required',
        ], $messages);

        Brand::create($data);

        return redirect()->route('brand.index')->with("successMessage", "Tambah brand sukses");
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand = $brand->brand;

        return view('brand$brand.detail', ['title' => 'Detail brand', 'brand' => $brand, 'brand' => $brand]);
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.form', ['title' => 'Edit brand', 'brand' => $brand]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'brand.required' => 'Nama kategori wajib diisi',
        ];

        $data = $request->validate([
            'brand' => 'required',
        ], $messages);

        $brand = Brand::findOrFail($id);
        $brand->update($data);

        return redirect()->route('brand.index')->with("successMessage", "Edit kategori sukses");
    }

    public function destroy(string $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();
            return redirect()->route('brand.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('brand.index')->with("errorMessage", $th->getMessage());
        }
    }
}
