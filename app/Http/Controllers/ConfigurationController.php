<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::all();
        return view('admin.configuration.index', ['title' => 'configurations', 'configurations' => $configurations]);
    }

    public function create()
    {
        return view('admin.configuration.form', ['title' => 'Tambah ']);
    }

    public function store(Request $request)
    {
        $messages = [
            'hospital_name.required' => 'Harap isi Nama Rumah sakir',
            'phone_number.required' => 'Isi nomor telepon',
            'address.required' => 'Isi alamat anda'
        ];

        $data = $request->validate([
            'hospital_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ], $messages);

        Configuration::create($data);

        return redirect()->route('configuration.index')->with("successMessage", "Add data sukses");
    }

    public function show(string $id)
    {
        $configuration = Configuration::findOrFail($id);
        return view('admin.configuration.detail', ['title' => 'Detail Configurasi', 'configuration' => $configuration]);
    }

    public function edit(string $id)
    {
        $configuration = Configuration::findOrFail($id);
        return view('admin.configuration.form', ['title' => 'Edit configuration', 'configuration' => $configuration]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'hospital_name.required' => 'Harap isi Nama Rumah sakir',
            'phone_number.required' => 'Isi nomor telepon',
            'address.required' => 'Isi alamat anda'
        ];

        $data = $request->validate([
            'hospital_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ], $messages);

        $configuration = Configuration::findOrFail($id);
        $configuration->update($data);

        return redirect()->route('configuration.index')->with("successMessage", "Edit data sukses");
    }

    public function destroy(string $id)
    {
        try {
            $user = Configuration::findOrFail($id);
            $user->delete();
            return redirect()->route('configuration.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('configuration.index')->with("errorMessage", $th->getMessage());
        }
    }
}
