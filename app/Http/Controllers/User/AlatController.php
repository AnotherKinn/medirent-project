<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword pencarian
        $search = $request->input('search');

        // Ambil data alat dari tabel alats
        $alats = Alat::when($search, function ($query, $search) {
            return $query->where('nama_alat', 'like', '%' . $search . '%');
        })
            ->orderBy('nama_alat', 'asc')
            ->paginate(12);

        return view('users.daftar-alat.index', compact('alats', 'search'));
    }

    public function show($id)
    {
        // Ambil data alat berdasarkan ID
        $alat = Alat::findOrFail($id);
        $user = Auth::user();

        return view('users.daftar-alat.show', compact('alat', 'user'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'id_alat' => 'required|exists:alats,id',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
            'jumlah_unit' => 'required|integer|min:1',
            'metode_pengambilan' => 'required|in:diantar,diambil',
        ]);

        // Ambil data alat
        $alat = Alat::findOrFail($request->id_alat);

        // Cek stok
        if ($request->jumlah_unit > $alat->stok) {
            return back()->with('error', 'Jumlah yang dipesan melebihi stok tersedia.');
        }

        // Hitung total harga
        $tanggal_sewa = new \DateTime($request->tanggal_sewa);
        $tanggal_kembali = new \DateTime($request->tanggal_kembali);
        $selisih_hari = $tanggal_kembali->diff($tanggal_sewa)->days;

        if ($selisih_hari == 0) {
            $selisih_hari = 1;
        }

        $total_harga = $selisih_hari * $alat->harga * $request->jumlah_unit;

        // Simpan booking
        $booking = \App\Models\Booking::create([
            'user_id' => $request->user_id,
            'id_alat' => $request->id_alat,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah_unit' => $request->jumlah_unit,
            'metode_pengambilan' => $request->metode_pengambilan,
            'harga' => $total_harga,
            'status' => 'menunggu',
        ]);

        // Kurangi stok alat
        $alat->stok -= $request->jumlah_unit;
        $alat->save();
        /*
    |--------------------------------------------------------------------------
    |  GENERATE KODE TRANSAKSI
    |--------------------------------------------------------------------------
    */
        /*
|--------------------------------------------------------------------------
|  GENERATE KODE TRANSAKSI UNIK & RANDOM
|--------------------------------------------------------------------------
| Format: MD-YYYYMMDD-TSK-XXXXXX
*/
        $tanggal = date('Ymd');
        $prefix = "MD-$tanggal-TSK";

        do {
            $random = strtoupper(Str::random(6)); // contoh: A9FKD2
            $kodeTransaksi = "$prefix-$random";
        } while (\App\Models\Transaction::where('kode_transaksi', $kodeTransaksi)->exists());


        // Simpan transaksi
        \App\Models\Transaction::create([
            'id_booking' => $booking->id,
            'id_user' => $request->user_id,
            'kode_transaksi' => $kodeTransaksi,
            'sub_total' => $total_harga,
            'status' => 'menunggu', // default
        ]);

        return redirect()->route('user.konfirmasi.pembayaran', [
            'booking_id' => $booking->id
        ])->with('success', 'Booking berhasil dibuat, silahkan selesaikan pembayaran');
    }

    public function konfirmasiPembayaran($booking_id)
    {
        $booking = \App\Models\Booking::with('alat')->findOrFail($booking_id);

        $transaksi = \App\Models\Transaction::where('id_booking', $booking_id)->first();

        return view('users.transaksi.konfirmasi-pembayaran', compact('booking', 'transaksi'));
    }

    public function prosesKonfirmasiPembayaran(Request $request, $booking_id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|in:cod,bca,mandiri,bni,qris'
        ]);

        $booking = Booking::findOrFail($booking_id);
        $transaksi = Transaction::where('id_booking', $booking_id)->firstOrFail();

        $transaksi->update([
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        if ($request->metode_pembayaran === 'qris') {
            // URL atau data yang ingin dijadikan QR
            $paymentUrl = route('user.transaksi.index'); // sesuaikan jika mau ke halaman pembayaran spesifik

            // Build QR menggunakan Endroid
            $result = (new Builder(writer: new PngWriter()))
                ->build(
                    data: $paymentUrl,
                    size: 300,
                    margin: 10,
                );

            $qrBase64 = $result->getDataUri(); // langsung data:image/png;base64,...

            return redirect()
                ->back()
                ->with('success_payment', [
                    'payment_method' => 'qris',
                    'kode_transaksi' => $transaksi->kode_transaksi,
                    'qr_base64' => $qrBase64,
                ]);
        }

        return redirect()
            ->route('user.transaksi.index')
            ->with('success', 'Pembayaran berhasil dilakukan, silahkan upload bukti pembayaran');
    }
}
