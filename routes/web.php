<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('layanan', function () {
    return view('layanan.main');
})->name('index.layanan');

Route::get('transaksi', function () {
    return view('transaksi.main');
})->name('index.transaksi');

Route::get('struk', function () {
    return view('struk');
})->name('struk');
