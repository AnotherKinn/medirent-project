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
        Schema::create('report_incomes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_booking')->constrained('bookings')->onDelete('cascade');
            $table->foreignId('id_transaksi')->constrained('transactions')->onDelete('cascade');

            $table->unsignedBigInteger('jumlah_pendapatan'); // ambil dari transaksi->sub_total
            $table->date('tanggal_pendapatan'); // untuk laporan bulanan / tahunan
            $table->string('keterangan')->nullable(); // opsional

            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_incomes');
    }
};
