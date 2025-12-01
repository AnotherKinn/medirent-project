<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Pendapatan bulan ini (pakai sub_total)
        $pendapatanBulanIni = Transaction::where('status', 'sukses')
            ->whereMonth('created_at', now()->month)
            ->sum('sub_total');

        // Total transaksi sukses
        $totalTransaksiSukses = Transaction::where('status', 'sukses')->count();

        // Total alat tersedia
        $totalAlat = Alat::count();

        // Penyewa tiap minggu → booking completed
        // Penyewa per bulan (12 bulan)
        $penyewaPerBulan = Booking::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->where('status', 'selesai')
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Inisialisasi 12 bulan dari Januari–Desember
        $labelsPenyewa = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];

        $dataPenyewa = array_fill(0, 12, 0);

        foreach ($penyewaPerBulan as $row) {
            $dataPenyewa[$row->bulan - 1] = $row->total;
        }


        // Alat paling sering disewa (sum jumlah_unit)
        $alatSeringDisewa = Booking::select(
            'id_alat',
            DB::raw('SUM(jumlah_unit) as total_unit')
        )
            ->groupBy('id_alat')
            ->orderByDesc('total_unit')
            ->limit(4)
            ->get();

        // Ambil nama alat
        $labelsAlat = $alatSeringDisewa->map(function ($item) {
            return $item->alat->nama_alat ?? 'Unknown';
        });

        $dataAlat = $alatSeringDisewa->pluck('total_unit');

        return view('admin.dashboard', [
            'pendapatanBulanIni' => $pendapatanBulanIni,
            'totalTransaksiSukses' => $totalTransaksiSukses,
            'totalAlat' => $totalAlat,
            'labelsPenyewa' => $labelsPenyewa,
            'dataPenyewa' => $dataPenyewa,
            'labelsAlat' => $labelsAlat,
            'dataAlat' => $dataAlat,
        ]);
    }
}
