<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $layanan = Layanan::all();
        $transaksi = Transaksi::orderByDesc('waktu_transaksi')->paginate(5);

        $proses = Transaksi::where('keterangan', 'proses')->count();
        $belumBayar = Transaksi::where('pembayaran', 'Belum Bayar')->count();
        return view('dashboard', compact('layanan', 'transaksi', 'proses', 'belumBayar'));
    }
}
