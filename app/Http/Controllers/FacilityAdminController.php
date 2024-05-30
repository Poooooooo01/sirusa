<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FacilityAdminController extends Controller
{
    public function index()
    {
        $facilities = Facility::get();
        return view('admin.facilitie.index', ['title' => 'facilities', 'facilities' => $facilities]);
    }

    public function create()
    {
        return view('admin.facilitie.form', ['title' => 'Add facility']);
    }

    public function store(Request $request)
    {
        $messages = [
            'facility_name.required' => 'Tolong isi facility_name dengan benar.',
            'description.required' => 'Isi description dengan benar.',

        ];

        $data = $request->validate([
            'facility_name' => 'required',
            'description' => 'required',
        ], $messages);

        Facility::create($data);

        return redirect()->route('facilitie.index')->with("successMessage", "Add data sukses");
    }

    public function show($id)
    {
        $facilitie = Facility::findOrFail($id);
        return view('admin.facilitie.detail', ['title' => 'facilitie Detail', 'facilitie' => $facilitie]);
    }

    public function edit($id)
    {
        $facilitie = Facility::findOrFail($id);
        return view('admin.facilitie.form', ['title' => 'Edit facilitie', 'facilitie' => $facilitie]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'facility_name.required' => 'Tolong isi facility_name dengan benar.',
            'description.required' => 'Isi description dengan benar.',

        ];

        $data = $request->validate([
            'facility_name' => 'required',
            'description' => 'required',
        ], $messages);

        try {
            $facilitie = Facility::findOrFail($id);

            if (!$request->filled('password')) {
                unset($data['password']);
            }

            $facilitie->update($data);

            return redirect()->route('facilitie.index')->with("successMessage", "Edit data success");
        } catch (\Throwable $th) {
            return redirect()->route('facilitie.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $facilitie = Facility::findOrFail($id);
            $facilitie->delete();
            return redirect()->route('facilitie.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('facilitie.index')->with("errorMessage", $th->getMessage());
        }
    }
}