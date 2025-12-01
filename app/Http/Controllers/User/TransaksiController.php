<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaction::with(['booking.alat'])
            ->where('id_user', Auth::id())
            ->latest()
            ->get();

        return view('users.transaksi.index', compact('transaksis'));
    }

    public function uploadForm($id)
    {
        $transaksi = Transaction::with(['booking.alat'])
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        return view('users.transaksi.upload', compact('transaksi'));
    }

    public function uploadProses(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $transaksi = Transaction::where('id_user', Auth::id())
            ->findOrFail($id);

        // Handle upload
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti_pembayaran'), $namaFile);

            // Update transaksi (hanya simpan bukti)
            $transaksi->bukti_pembayaran = $namaFile;
            $transaksi->save();

            // Update Booking → status jadi menunggu_verifikasi
            $booking = $transaksi->booking; // relasi
            if ($booking) {
                $booking->status = 'menunggu_verifikasi';
                $booking->save();
            }
        }

        return redirect()
            ->route('user.booking.index')
            ->with('success', 'Bukti pembayaran berhasil diupload, silahkan tunggu konfirmasi admin');
    }
}
