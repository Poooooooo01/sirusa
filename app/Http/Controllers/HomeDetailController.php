<?php

namespace App\Http\Controllers;

use App\Models\HomeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeDetailController extends Controller
{
    public function index()
    {
        $homeDetails = HomeDetail::get();
        return view('admin.homeDetail.index', ['title' => 'homeDetails', 'homeDetails' => $homeDetails]);
    }

    public function create()
    {
        return view('admin.homeDetail.form', ['title' => 'Add HomeDetail']);
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
            HomeDetail::create($data);
            return redirect()->route('homeDetail.index')->with("successMessage", "Add data sukses");
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors($messages);
        }
    }

    public function show($id)
    {
        $homeDetail = HomeDetail::findOrFail($id);
        return view('admin.homeDetail.detail', ['title' => 'HomeDetail Detail', 'homeDetail' => $homeDetail]);
    }

    public function edit($id)
    {
        $homeDetail = HomeDetail::findOrFail($id);
        return view('admin.homeDetail.form', ['title' => 'Edit HomeDetail', 'homeDetail' => $homeDetail]);
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
            $homeDetail = HomeDetail::findOrFail($id);
            $homeDetail->update($data);
            return redirect()->route('homeDetail.index')->with("successMessage", "Edit data success");
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors($messages);
        }
    }

    public function destroy($id)
    {
        try {
            $homeDetail = HomeDetail::findOrFail($id);
            $homeDetail->delete();
            return redirect()->route('homeDetail.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('homeDetail.index')->with("errorMessage", $th->getMessage());
        }
    }
}