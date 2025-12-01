<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with(['user', 'booking.alat', 'booking.user'])
            ->whereHas('booking', function ($q) {
                $q->where('status', '!=', 'menunggu'); // hanya tampilkan booking yg bukan pending
            })
            ->orderBy('created_at', 'desc');

        // SEARCH NAMA CUSTOMER
        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        // FILTER NAMA ALAT
        if ($request->filled('alat')) {
            $alat = $request->alat;

            $query->whereHas('booking.alat', function ($q) use ($alat) {
                $q->where('nama_alat', 'like', "%{$alat}%");
            });
        }

        // FILTER STATUS TRANSAKSI
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $transactions = $query->paginate(10);

        $alatList = Alat::select('id', 'nama_alat')->get();
        $statusList = ['menunggu', 'sukses', 'gagal'];

        return view('admin.transaksi.index', compact('transactions', 'alatList', 'statusList'));
    }

    /**
     * Menampilkan detail transaksi
     */
    public function show($id)
    {
        $transaksi = Transaction::with(['user', 'booking.alat', 'booking.user'])
            ->findOrFail($id);

        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Edit status transaksi
     */
    public function edit($id)
    {
        $transaksi = Transaction::with(['booking.alat', 'booking.user'])->findOrFail($id);
        $statusList = ['pending', 'success', 'failed', 'expired'];

        return view('admin.transaksi.edit', compact('transaksi', 'statusList'));
    }

    /**
     * Update status atau data lain transaksi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $transaksi = Transaction::findOrFail($id);

        $transaksi->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Status transaksi berhasil diperbarui!');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    public function export()
    {
        $file = storage_path('app/public/transaksi.xlsx');

        $writer = SimpleExcelWriter::create($file);

        $data = Transaction::with('user')->get()->map(function ($trx) {
            return [
                'Kode Transaksi' => $trx->kode_transaksi,
                'Tanggal' => $trx->created_at->format('d-m-Y'),
                'Customer' => $trx->user->nama ?? '-',
                'Total Harga' => $trx->sub_total,
                'Status' => ucfirst($trx->status),
            ];
        });

        $writer->addRows($data);

        return response()->download($file)->deleteFileAfterSend(true);
    }
}
