<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'alat']);

        // Default: tampilkan hanya booking yang statusnya tidak pending
        // KECUALI jika user memilih filter status
        if (!$request->status) {
            $query->where('status', '!=', 'menunggu');
        }

        // Filter nama user
        if ($request->user) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->user . '%');
            });
        }

        // Filter alat
        if ($request->alat) {
            $query->where('id_alat', $request->alat);
        }

        // Filter status (mengizinkan user memilih selain default)
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();
        $listAlat = \App\Models\Alat::all();
        $listStatus = ['menunggu_verifikasi', 'disetujui', 'ditolak'];

        return view('admin.booking.index', compact('bookings', 'listAlat', 'listStatus'));
    }



    /**
     * Detail dari satu booking
     */
    public function show($id)
    {
        $booking = Booking::with(['user', 'alat'])->findOrFail($id);

        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Update status booking (disetujui / ditolak)
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi status
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        // Cari booking
        $booking = Booking::with('transaksi')->findOrFail($id);

        // Update status booking
        $booking->status = $request->status;
        $booking->save();

        // === UPDATE STATUS TRANSAKSI ===
        if ($booking->transaksi) {

            if ($request->status === 'disetujui') {
                $booking->transaksi->status = 'sukses';
            } else {
                $booking->transaksi->status = 'gagal';
            }

            $booking->transaksi->save();
        }

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function antarBarang($id)
    {
        $booking = Booking::findOrFail($id);

        // Hanya bisa antar jika disetujui
        if ($booking->status !== 'disetujui') {
            return back()->with('error', 'Booking belum disetujui.');
        }

        $booking->status = 'sedang_diantarkan';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Barang sedang dalam proses pengantaran.');
    }

    public function barangDiambil($id)
    {
        $booking = Booking::findOrFail($id);

        // Update status jadi barang_diambil
        $booking->status = 'barang_diambil';
        $booking->save();

        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Barang Diambil.');
    }

    public function cekTelat()
    {
        $now = Carbon::now();

        $bookings = Booking::where('status', 'barang_diambil')->get();

        foreach ($bookings as $booking) {
            if ($now->greaterThan(Carbon::parse($booking->tanggal_kembali))) {
                $booking->status = 'telat_pengembalian';
                $booking->save();
            }
        }

        return "Cek telat selesai";
    }

    public function selesaikan($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'barang_diambil') {
            return back()->with('error', 'Booking belum dapat diselesaikan.');
        }

        // Tambahkan stok alat kembali
        $alat = Alat::find($booking->id_alat);
        $alat->stok += $booking->jumlah_unit;
        $alat->save();

        // Update status
        $booking->status = 'selesai';
        $booking->tanggal_kembali = Carbon::now();
        $booking->save();

        // Transaksi → sukses

        return redirect()->route('admin.booking.index')->with('success', 'Booking telah diselesaikan dan alat dikembalikan.');
    }
    /**
     * Hapus booking
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil dihapus.');
    }
}
