<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Alat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan list booking user
    public function index(Request $request)
    {
        $query = Booking::with('alat')
            ->where('user_id', Auth::id());

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pencarian berdasarkan nama alat
        if ($request->filled('search')) {
            $query->whereHas('alat', function ($q) use ($request) {
                $q->where('nama_alat', 'like', '%' . $request->search . '%');
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('users.booking.index', compact('bookings'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $booking = Booking::with('alat') // ambil info alat
            ->where('user_id', Auth::id())
            ->whereIn('status', ['menunggu', 'menunggu_verifikasi'])
            ->findOrFail($id);

        return view('users.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::with(['alat', 'transaksi'])
            ->where('user_id', Auth::id())
            ->whereIn('status', ['menunggu', 'menunggu_verifikasi'])
            ->findOrFail($id);

        // Validasi
        $request->validate([
            'tanggal_sewa' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
            'jumlah_unit' => 'required|integer|min:1|max:' . ($booking->alat->stok + $booking->jumlah_unit),
            'metode_pengambilan' => 'required|in:diantar,diambil',
        ]);

        $selisihUnit = $request->jumlah_unit - $booking->jumlah_unit;

        // Update stok alat
        $booking->alat->stok -= $selisihUnit;
        $booking->alat->save();

        // Update booking
        $booking->update([
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah_unit' => $request->jumlah_unit,
            'metode_pengambilan' => $request->metode_pengambilan,
        ]);

        // ==========================
        // 🔥 HITUNG ULANG TOTAL HARGA
        // ==========================
        $tanggalSewa = Carbon::parse($request->tanggal_sewa);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);
        $lamaSewa = $tanggalSewa->diffInDays($tanggalKembali);

        if ($lamaSewa == 0) {
            $lamaSewa = 1; // Minimal 1 hari
        }

        $hargaPerHari = $booking->alat->harga;
        $totalBaru = $hargaPerHari * $request->jumlah_unit * $lamaSewa;

        // ================================
        // 🔥 Update sub_total di transaksi
        // ================================
        if ($booking->transaksi) {
            $booking->transaksi->update([
                'sub_total' => $totalBaru
            ]);
        }

        return redirect()->route('user.booking.index')
            ->with('success', 'Booking berhasil diperbarui dan total harga ikut diperbarui.');
    }

    public function barangSampai($id)
    {
        $booking = Booking::findOrFail($id);

        // Hanya user yang bisa konfirmasi barang sampai
        if ($booking->status !== 'sedang_diantarkan') {
            return back()->with('error', 'Barang belum dalam proses pengantaran.');
        }

        $booking->status = 'barang_sampai';
        $booking->save();

        return back()->with('success', 'Barang sudah dikonfirmasi sampai.');
    }

    public function selesaiCepat($id)
    {
        $booking = Booking::with('alat')->findOrFail($id);

        // Cek status agar tidak double update
        if ($booking->status === 'selesai') {
            return back()->with('info', 'Booking ini sudah selesai sebelumnya.');
        }

        // Tambahkan kembali stok alat
        if ($booking->alat) {
            $booking->alat->stok += $booking->jumlah_unit;
            $booking->alat->save();
        }

        // Update status menjadi selesai
        $booking->status = 'selesai';
        $booking->save();

        return back()->with('success', 'Barang telah ditandai selesai dan stok alat telah dikembalikan.');
    }



    // Hapus booking
    public function destroy($id)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->whereIn('status', ['menunggu', 'menunggu_verifikasi'])
            ->findOrFail($id);

        $booking->delete();

        return redirect()->route('user.booking.index')->with('success', 'Booking berhasil dihapus.');
    }
}
