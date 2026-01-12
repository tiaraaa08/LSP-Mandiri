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
        Layanan::create([
            'nama_layanan' => $validatedData['nama_layanan'],
            'harga_per_kg' => (int) $harga
        ]);

        return redirect()->back();
        // dd($request->all());
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string',
            'harga_per_kg' => 'required'
        ]);

        $validatedData['harga_per_kg'] = preg_replace('/\D/', '', $validatedData['harga_per_kg']);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($validatedData);
        
        return redirect()->back();
    }

    public function destroy ($id){
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->back();
    }
}
