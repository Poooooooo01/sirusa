<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('username')->get();
        return view('admin.user.index', ['title' => 'Users', 'users' => $users]);
    }

    public function create()
    {
        return view('admin.user.form', ['title' => 'Add User']);
    }

    public function store(Request $request)
    {
        $messages = [
            'username.required' => 'Tolong isi username dengan benar.',
            'username.unique' => 'Username sudah terisi.',
            'password.required' => 'Isi password dengan benar.',
            'password.min' => 'Password kurang panjang minimal 3.',
            'role.required' => 'Isi role dengan benar.',
            'email.required' => 'Tolong isi alamat email dengan benar.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar.',
        ];

        $data = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'password' => 'required|min:3',
            'role' => 'required',
        ], $messages);

        User::create($data);

        return redirect()->route('useradmin.index')->with("successMessage", "Add data sukses");
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.detail', ['title' => 'User Detail', 'user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.form', ['title' => 'Edit User', 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'username.required' => 'Tolong isi username dengan benar.',
            'username.unique' => 'Username sudah terpakai.',
            'password.min' => 'Password kurang panjang minimal 3.',
            'role.required' => 'Isi role dengan benar.',
            'email.required' => 'Tolong isi alamat email dengan benar.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar.',
        ];

        $data = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|alpha_num|unique:users,username,' . $id,
            'password' => 'nullable|min:3',
            'role' => 'required',
        ], $messages);

        try {
            $user = User::findOrFail($id);

            if (!$request->filled('password')) {
                unset($data['password']);
            }

            $user->update($data);

            return redirect()->route('useradmin.index')->with("successMessage", "Edit data success");
        } catch (\Throwable $th) {
            return redirect()->route('useradmin.index')->with("errorMessage", $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('useradmin.index')->with("successMessage", "Delete data sukses");
        } catch (\Throwable $th) {
            return redirect()->route('useradmin.index')->with("errorMessage", $th->getMessage());
        }
    }
}
