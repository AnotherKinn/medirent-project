<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status', [
                'menunggu',
                'menunggu_verifikasi',
                'ditolak',
                'disetujui',
                'sedang_diantarkan',
                'barang_sampai',
                'barang_diambil',
                'selesai',
                'telat_pengembalian'
            ])->default('menunggu')->change();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status', [
                'menunggu',
                'menunggu_verifikasi',
                'disetujui',
                'ditolak',
                'selesai'
            ])->default('menunggu')->change();
        });
    }
};
