<?php

use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfilController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\AlatController as UserAlatController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ProfileController as UserProfilController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.admin');

    Route::get('/data-alat', [AlatController::class, 'index'])->name('admin.data-alat.index');
    Route::get('/data-alat/create', [AlatController::class, 'create'])->name('admin.data-alat.create');
    Route::post('/data-alat/store', [AlatController::class, 'store'])->name('admin.data-alat.store');
    Route::get('/data-alat/{id}/edit', [AlatController::class, 'edit'])->name('admin.data-alat.edit');
    Route::put('/data-alat/{id}/update', [AlatController::class, 'update'])->name('admin.data-alat.update');
    Route::delete('/data-alat/{id}/destroy', [AlatController::class, 'destroy'])->name('admin.data-alat.destroy');

    Route::get('/booking', [AdminBookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/booking/{id}', [AdminBookingController::class, 'show'])->name('admin.booking.show');
    Route::post('/booking/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.booking.updateStatus');
    // ADMIN antar barang
    Route::post('/admin/booking/{id}/antar', [AdminBookingController::class, 'antarBarang'])
        ->name('admin.booking.antarBarang');
    Route::post('/admin/booking/{id}/diambil', [AdminBookingController::class, 'barangDiambil'])
        ->name('admin.booking.diambil');
    Route::post('/booking/{id}/selesai', [AdminBookingController::class, 'selesaikan'])
        ->name('admin.booking.selesai');


    Route::delete('/booking/{id}', [AdminBookingController::class, 'destroy'])->name('admin.booking.destroy');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::get('/transaksi/{id}/detail', [TransaksiController::class, 'show'])->name('admin.transaksi.show');
    // routes/web.php
    Route::get('/transaksi/export', [TransaksiController::class, 'export'])
    ->name('admin.transaksi.export');

    Route::delete('/transaksi/{id}/destroy', [TransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');

    Route::get('/pengguna', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/pengguna/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/pengguna/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/pengguna/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/pengguna/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/profil', [AdminProfilController::class, 'index'])->name('admin.profil.index');
    Route::get('/profil/edit', [AdminProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('/profil/update', [AdminProfilController::class, 'update'])->name('admin.profil.update');

    Route::get('/laporan', [ReportController::class, 'index'])->name('admin.laporan.index');
});

Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard.user');

    Route::get('/tentang', [AboutController::class, 'index'])->name('user.about');

    Route::get('/datfar-alat', [UserAlatController::class, 'index'])->name('user.daftar-alat.index');
    Route::get('/datfar-alat/{id}', [UserAlatController::class, 'show'])->name('user.daftar-alat.show');

    Route::get('/booking', [UserBookingController::class, 'index'])->name('user.booking.index');
    Route::get('/booking/{id}/edit', [UserBookingController::class, 'edit'])->name('user.booking.edit');
    Route::put('/booking/{id}/update', [UserBookingController::class, 'update'])->name('user.booking.update');
    Route::delete('/booking/{id}/destroy', [UserBookingController::class, 'destroy'])->name('user.booking.destroy');
    // USER konfirmasi barang sampai
    Route::post('/booking/{id}/barang-sampai', [UserBookingController::class, 'barangSampai'])
        ->name('booking.barangSampai');
    Route::post('/booking/{id}/selesai', [UserBookingController::class, 'selesaiCepat'])
        ->name('booking.selesaiCepat');
    Route::post('booking', [UserAlatController::class, 'store'])->name('user.booking.store');

    Route::get('/transaksi', [UserTransaksiController::class, 'index'])->name('user.transaksi.index');
    Route::get('/transaksi/{id}/upload', [UserTransaksiController::class, 'uploadForm'])->name('user.transaksi.upload');
    Route::post('/transaksi/{id}/upload', [UserTransaksiController::class, 'uploadProses'])->name('user.transaksi.uploadProses');
    Route::get('/konfirmasi-pembayaran/{booking_id}', [UserAlatController::class, 'konfirmasiPembayaran'])
        ->name('user.konfirmasi.pembayaran');
    Route::post(
        '/konfirmasi-pembayaran/{booking_id}/store',
        [UserAlatController::class, 'prosesKonfirmasiPembayaran']
    )->name('user.transaksi.bayar');


    Route::get('/profil', [UserProfilController::class, 'index'])->name('user.profile.index');
    Route::get('/profil/edit', [UserProfilController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profil/update', [UserProfilController::class, 'update'])->name('user.profile.update');
});


require __DIR__ . '/auth.php';
