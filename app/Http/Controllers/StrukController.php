<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class StrukController extends Controller
{
    public function index($id) {
        $transaksi = Transaksi::find($id);
        $layanan = Layanan::find($id);

        return view('struk', compact('transaksi', 'layanan'));
    }
}
