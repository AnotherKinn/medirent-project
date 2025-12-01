<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user (dinamis)
     */
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile; // Ambil data profil

        return view('users.profil.index', compact('user', 'profile'));
    }


    /**
     * Menampilkan form edit profil
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('users.profil.edit', compact('user', 'profile'));
    }

    /**
     * Update profil user
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        if (!$profile) {
            $profile = $user->profile()->create([]);
        }

        // Upload Foto Profil
        if ($request->hasFile('foto_profil')) {
            $fotoProfil = $request->file('foto_profil')->store('foto_profil', 'public');
            $profile->foto_profil = $fotoProfil;
        }

        // Upload Foto KTP
        if ($request->hasFile('foto_ktp')) {
            $fotoKTP = $request->file('foto_ktp')->store('ktp', 'public');
            $profile->foto_ktp = $fotoKTP;
        }

        $profile->alamat = $request->alamat;
        $profile->nomor_telepon = $request->nomor_telepon;
        $profile->save();

        return redirect()->route('user.profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
