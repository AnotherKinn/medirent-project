<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/ambulance', function () {
    return view('ambulance');
});

Route::get('/kursi', function () {
    return view('kursi');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/nebulizer', function () {
    return view('nebulizer');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/tensi', function () {
    return view('tensi');
});

Route::get('/tentang', function () {
    return view('tentang');
});