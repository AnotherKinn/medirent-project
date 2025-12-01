<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::latest()->paginate(10);
        return view('admin.alat.index', compact('alat'));
    }

    public function create()
    {
        return view('admin.alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat'  => 'required|string|max:255',
            'deskripsi'  => 'required',
            'harga'      => 'required|numeric',
            'stok'       => 'required|integer',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('alat', 'public');
        }

        Alat::create([
            'nama_alat' => $request->nama_alat,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'foto'      => $foto,
        ]);

        return redirect()->route('admin.data-alat.index')->with('success', 'Alat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $alat = Alat::findOrFail($id);
        return view('admin.alat.edit', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);

        $request->validate([
            'nama_alat'  => 'required|string|max:255',
            'deskripsi'  => 'required',
            'harga'      => 'required|numeric',
            'stok'       => 'required|integer',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $alat->foto;

        if ($request->hasFile('foto')) {
            // hapus foto lama
            if ($alat->foto) {
                Storage::disk('public')->delete($alat->foto);
            }
            // upload baru
            $foto = $request->file('foto')->store('alat', 'public');
        }

        $alat->update([
            'nama_alat' => $request->nama_alat,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'foto'      => $foto,
        ]);

        return redirect()->route('admin.data-alat.index')->with('success', 'Alat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $alat = Alat::findOrFail($id);

        if ($alat->foto) {
            Storage::disk('public')->delete($alat->foto);
        }

        $alat->delete();

        return redirect()->route('admin.data-alat.index')->with('success', 'Alat berhasil dihapus!');
    }
}
