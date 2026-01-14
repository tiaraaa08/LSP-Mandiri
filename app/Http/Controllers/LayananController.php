<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.main', compact('layanan'));
    }

    public function store(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string',
            'harga_per_kg' => 'required'
        ]);
        // ubah biar rp nya ilang, biar angka mentahan aja yang masuk
        $harga = preg_replace('/\D/', '', $request->harga_per_kg);
        // masukin ke database

        $duplikat = Layanan::where('nama_layanan', $validatedData['nama_layanan'])
            ->where('harga_per_kg', $harga)->exists();

        //cek duplikat
        if ($duplikat) {
            return back()->withErrors(['error' => 'Layanan Tersebut Telah Terdaftar']);
        }

        Layanan::create([
            'nama_layanan' => $validatedData['nama_layanan'],
            'harga_per_kg' => (int) $harga
        ]);

        return redirect()->back()->with('success', 'Data Layanan Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string',
            'harga_per_kg' => 'required'
        ]);

        $validatedData['harga_per_kg'] = preg_replace('/\D/', '', $validatedData['harga_per_kg']);

        $layanan = Layanan::findOrFail($id);

        //validasi duplikat
        if ($layanan->nama_layanan !== $request->nama_layanan) {
            $duplikat = Layanan::where('nama_layanan', $validatedData['nama_layanan'])
                ->where('harga_per_kg', $validatedData['harga_per_kg'])->exists();

            if ($duplikat) {
                return back()->withErrors(['error' => 'Data Layanan Telah Tersedia']);
            }
        }

        $layanan->update($validatedData);

        return redirect()->back()->with('success', 'Data Layanan Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->back()->with('success', 'Data Layanan Berhasil Dihapus');
    }
}
