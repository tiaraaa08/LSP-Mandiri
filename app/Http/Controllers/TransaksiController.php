<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $transaksi = Transaksi::with('layanan')->get();
        return view('transaksi.main', compact('layanan', 'transaksi'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // validasi
        $validatedData = $request->validate([
            'waktu_transaksi' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'id_layanan' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
            'pembayaran' => 'required',
        ]);

        Transaksi::create($validatedData);

        return redirect()->back()->with('success', 'Data Transaksi Telah Tersimpan');
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->pembayaran = 'Lunas';
        $transaksi->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'waktu_transaksi' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'id_layanan' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
            'pembayaran' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validatedData);
        return redirect()->back()->with('success', 'Data Transaksi Telah Diperbarui');
    }

    public function destroy($id)
    {
        $hapus = Transaksi::findOrFail($id);
        $hapus->delete();
        return redirect()->back()->with('success', 'Data Transaksi Telah Dihapus');
    }
}
