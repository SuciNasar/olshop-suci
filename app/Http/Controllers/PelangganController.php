<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Daftar_Jualan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $daftar__jualans = Daftar_Jualan::all();
        return view('pelanggan.index', compact('daftar__jualans'));
    }

    public function create($daftar_jualan_id)
    {
        $daftar_jualan = Daftar_Jualan::findOrFail($daftar_jualan_id);
        return view('pelanggan.transaksi', [
            'daftar_jualan_id' => $daftar_jualan->id,
            'harga' => $daftar_jualan->harga,
            'no_rek' => $daftar_jualan->no_rek,
            'foto' => $daftar_jualan->foto,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_rek' => 'required|string|max:20',
            'alamat_pembeli' => 'required|string|max:500',
            'harga' => 'required',
            'no_hp' => 'required',
            'daftar_jualan_id' => 'required|exists:daftar__jualans,id',
        ]);

        try {
            Pelanggan::create($request->only([
                'nama',
                'no_rek',
                'alamat_pembeli',
                'harga',
                'no_hp',
                'daftar_jualan_id',
            ]));

            return redirect()->route('pelanggan.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('transaksi.transaksi')->with('success', 'Data pembeli berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.transaksi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
