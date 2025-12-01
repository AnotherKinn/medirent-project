<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportIncome extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_booking',
        'id_transaksi',
        'jumlah_pendapatan',
        'tanggal_pendapatan',
        'keterangan'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'id_transaksi');
    }
}
