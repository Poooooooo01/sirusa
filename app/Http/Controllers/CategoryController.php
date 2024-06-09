<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug; 
use Illuminate\Http\Request;

class CategoryController extends Controller 
{
    public function index()
    {
        $categories = Category::with('drugs')->orderBy('categories')->get();
        return view('category.index', ['title' => 'Categories', 'categories' => $categories]);
    }

    public function create()
    {
        return view('category.form', ['title' => 'Tambah Kategori']);
    }

    public function store(Request $request)
    {
        $messages = [
            'categories.required' => 'Nama kategori wajib diisi',
        ];

        $data = $request->validate([
            'categories' => 'required',
        ], $messages);
     
        Category::create($data);

        return redirect()->route('category.index')->with("successMessage", "Tambah kategori sukses");
    }

    public function show(string $id)
    {
        $drug = Drug::findOrFail($id);
        $category = $drug->category;

        return view('drug.detail', ['title' => 'Detail Obat', 'drug' => $drug, 'category' => $category]);
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.form', ['title' => 'Edit Kategori', 'category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'categories.required' => 'Nama kategori wajib diisi',
        ];

        $data = $request->validate([
            'categories' => 'required',
        ], $messages);

        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->route('category.index')->with("successMessage", "Edit kategori sukses");
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')->with("successMessage", "Hapus data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with("errorMessage", $th->getMessage());
        }
    }
}
