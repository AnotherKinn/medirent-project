<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alat::create([
            'id' => 1,
            'nama_alat' => 'Kursi Roda',
            'deskripsi' => 'Kursi Roda yang nyaman',
            'harga' => 100000,
            'stok' => 100,
            'foto' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRcLVZfs8w-2ZoiLrmRCWLZXZ4N7-TZtvOxHnpQnFaMHSAjh7Mj1oBjmNgNyKi547SBsBQF51KGWlBo35KYJoUSVu7jyqQHbhbfb9sAg1a224SdQSTa-tppfMBBwOlUTEIS9tsS-mE&usqp=CAc',
        ]);

         Alat::create([
            'id' => 2,
            'nama_alat' => 'Tensi Darah',
            'deskripsi' => 'Tensi darah untuk mengecek tekanan darah',
            'harga' => 50000,
            'stok' => 50,
            'foto' => 'https://sammora.id/uploads/img/product/20240604071123-alat-tensi-darah-digital-sammora-sm-569-tensimeter-lengan.jpg',
        ]);
    }
}
