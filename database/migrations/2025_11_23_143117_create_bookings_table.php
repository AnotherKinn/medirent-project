<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_alat')->constrained('alats')->onDelete('cascade');

            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');

            $table->enum('status', [
                'menunggu',
                'menunggu_verifikasi',
                'disetujui',
                'ditolak',
                'selesai'
            ])->default('menunggu');

            $table->enum('metode_pengambilan', ['diantar', 'diambil'])->default('diambil');

            $table->integer('jumlah_unit')->default(1);
            $table->unsignedBigInteger('harga'); // total harga sewa

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
