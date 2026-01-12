<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::post('layanan/store', [LayananController::class, 'store'])->name('layanan.store');
Route::post('layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post( 'transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post( 'transaksi/bayar/{id}', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
Route::post('transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('struk/{id}', [StrukController::class, 'index'])->name('struk');