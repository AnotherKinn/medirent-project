<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_alat',
        'tanggal_sewa',
        'tanggal_kembali',
        'status',
        'metode_pengambilan',
        'jumlah_unit',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaction::class, 'id_booking');
    }
}
