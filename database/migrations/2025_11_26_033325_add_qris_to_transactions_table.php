<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tambahkan opsi 'qris' ke enum metode_pembayaran
        Schema::table('transactions', function (Blueprint $table) {
            // Perlu menggunakan raw SQL karena MySQL enum tidak bisa langsung diubah via change()
            DB::statement("ALTER TABLE transactions MODIFY metode_pembayaran ENUM('cod','bca','mandiri','bni','qris') NULL AFTER status");
        });
    }

    public function down()
    {
        // Kembalikan seperti enum semula
        DB::statement("ALTER TABLE transactions MODIFY metode_pembayaran ENUM('cod','bca','mandiri','bni') NULL AFTER status");
    }
};
