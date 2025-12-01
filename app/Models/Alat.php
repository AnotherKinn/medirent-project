<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_alat',
        'deskripsi',
        'harga',
        'stok',
        'foto',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_alat');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_alat');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaction::class, 'id_alat');
    }
}
