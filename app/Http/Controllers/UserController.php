<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function confirmDelete($id)
    {
        $user = User::find($id);
        return view('confirm-delete', compact('user'));
    }

    public function deleteConfirm(Request $request)
    {
        $selectedUsers = $request->input('selectedUsers');
        User::whereIn('id', $selectedUsers)->delete();

        return redirect('/table')->with('success', 'Data berhasil dihapus.');
    }

    public function info($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/table')->with('error', 'User tidak ditemukan');
        }

        return view('info', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/table')->with('error', 'User tidak ditemukan');
        }

        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/table')->with('error', 'User tidak ditemukan');
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/table')->with('success', 'User berhasil diperbarui');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'image' => 'required|image|max:2048', // Hanya menerima file gambar dengan ukuran maksimal 2MB
    ]);

    // Simpan gambar ke storage
    $imagePath = $request->file('image')->store('public/images');
    $imageName = str_replace('public/images/', '', $imagePath);

    // Buat data user baru dengan gambar
    $user = new User;
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->image = $imageName; // Simpan nama gambar dalam database
    $user->save();

    return redirect('/table')->with('success', 'Data berhasil ditambahkan.');
}
}