<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HealthAdminController extends Controller
{
    public function index()
    {
        $healts = Health::get();
        return view('admin.health_information.index', ['title' => 'healts', 'healts' => $healts]);
    }

    public function create()
    {
        return view('admin.health_information.form', ['title' => 'Add Health']);
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Tolong isi title dengan benar.',
            'content.required' => 'Isi content dengan benar.',
           
        ];

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], $messages);

        Health::create($data);

        return redirect()->route('health.index')->with("successMessage", "Add data sukses");
    }

    public function show($id)
    {
        $health = Health::findOrFail($id);
        return view('admin.health_information.detail', ['title' => 'health Detail', 'health' => $health]);
    }

    public function edit($id)
    {
        $health = Health::findOrFail($id);
        return view('admin.health_information.form', ['title' => 'Edit health', 'health' => $health]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'title.required' => 'Tolong isi title dengan benar.',
            'content.required' => 'Isi content dengan benar.',
           
        ];

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], $messages);

        try {
            $health = Health::findOrFail($id);

            if (!$request->filled('password')) {
                unset($data['password']);
            }

            $health->update($data);

            return redirect()->route('health.index')->with("successMessage", "Edit data success");
        } catch (\Throwable $th) {
            return redirect()->route('health.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $health = Health::findOrFail($id);
            $health->delete();
            return redirect()->route('health.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('health.index')->with("errorMessage", $th->getMessage());
        }
    }
}