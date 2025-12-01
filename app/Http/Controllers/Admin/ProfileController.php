<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil data admin yang login
        return view('admin.profil.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6'
        ]);

        // Update nama & email
        $user->nama = $request->nama;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
