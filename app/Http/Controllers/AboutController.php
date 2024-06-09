<?php

namespace App\Http\Controllers;

use App\Models\AboutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AboutController extends Controller
{
    public function index()
    {
        $aboutDetails = AboutDetail::get();
        return view('admin.aboutDetail.index', ['title' => 'aboutDetails', 'aboutDetails' => $aboutDetails]);
    }

    public function create()
    {
        return view('admin.aboutDetail.form', ['title' => 'Add AboutDetail']);
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Tolong isi title dengan benar.',
            'description.required' => 'Isi description dengan benar.',
        ];

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], $messages);

        try {
            AboutDetail::create($data);
            return redirect()->route('aboutDetail.index')->with("successMessage", "Add data sukses");
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors($messages);
        }
    }

    public function show($id)
    {
        $aboutDetail = AboutDetail::findOrFail($id);
        return view('admin.aboutDetail.detail', ['title' => 'aboutDetail Detail', 'aboutDetail' => $aboutDetail]);
    }

    public function edit($id)
    {
        $aboutDetail = AboutDetail::findOrFail($id);
        return view('admin.aboutDetail.form', ['title' => 'Edit aboutDetail', 'aboutDetail' => $aboutDetail]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'title.required' => 'Tolong isi title dengan benar.',
            'description.required' => 'Isi description dengan benar.',
        ];

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], $messages);

        try {
            $aboutDetail = AboutDetail::findOrFail($id);
            $aboutDetail->update($data);
            return redirect()->route('aboutDetail.index')->with("successMessage", "Edit data success");
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors($messages);
        }
    }

    public function destroy($id)
    {
        try {
            $aboutDetail = AboutDetail::findOrFail($id);
            $aboutDetail->delete();
            return redirect()->route('aboutDetail.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('aboutDetail.index')->with("errorMessage", $th->getMessage());
        }
    }
}