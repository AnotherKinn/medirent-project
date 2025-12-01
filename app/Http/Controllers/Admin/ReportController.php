<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Alat;
use App\Models\Transaction;
use App\Models\User;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter dari request
        $filterAlat = $request->nama_alat;
        $filterStatus = $request->status;
        $searchUser = $request->user;

        // Query dasar
        $query = Transaction::with(['user', 'alat']);

        // Filter berdasarkan nama alat
        if ($filterAlat) {
            $query->whereHas('alat', function ($q) use ($filterAlat) {
                $q->where('nama_alat', 'LIKE', "%$filterAlat%");
            });
        }

        // Filter berdasarkan status transaksi
        if ($filterStatus) {
            $query->where('status', $filterStatus);
        }

        // Pencarian berdasarkan nama user
        if ($searchUser) {
            $query->whereHas('user', function ($q) use ($searchUser) {
                $q->where('nama', 'LIKE', "%$searchUser%");
            });
        }

        // Ambil hasil
        $transaksi = $query->latest()->get();

        // Dropdown data
        $listAlat = Alat::orderBy('nama_alat')->get();
        $listStatus = ['pending', 'berhasil', 'gagal', 'selesai']; // sesuaikan dengan tabelmu

        return view('admin.laporan-transaksi.index', compact(
            'transaksi',
            'listAlat',
            'listStatus'
        ));
    }
}
