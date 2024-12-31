<?php

namespace App\Http\Controllers;

use App\Models\Daftar_Jualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class Daftar_JualanController extends Controller
{
    public function index()
    {   
        $daftar__jualans = Daftar_Jualan::all();
        return view('daftar_jualan.index', compact('daftar__jualans'));
    }

    public function transaksi()
    {   
        $pelanggans = Pelanggan::all();        
        return view('transaksi.transaksi', compact('pelanggans'));
    }
    
    public function create()
    {
        return view('daftar_jualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penjual' => 'required|string|max:100',
            'nama_barang' => 'required|string|max:100',
            'alamat_toko' => 'required|string|max:100',
            'no_rek' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
            'foto' => 'nullable|image|max:10000',
        ]);

        try {
            $data = $request->all();
            if ($request->hasFile('foto')) {
                $fileName = time() . '_' . $request->foto->getClientOriginalName();
                $request->foto->move(public_path('upload/foto'), $fileName);
                $data['foto'] = $fileName;
            }

            Daftar_Jualan::create($data);

            return redirect()->route('daftar_jualan.index')->with('success', 'Berhasil Ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('daftar_jualan.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $daftar_jualan = Daftar_Jualan::findOrFail($id);
        return view('daftar_jualan.edit', compact('daftar_jualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'alamat_toko' => 'required|string|max:100',
            'no_rek' => 'required|string|max:100',
            'harga' => 'required|string',
            'foto' => 'nullable|image|max:10000',
        ]);

        try {
            $daftar_jualan = Daftar_Jualan::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('foto')) {
                if ($daftar_jualan->foto && file_exists(public_path('upload/foto/' . $daftar_jualan->foto))) {
                    unlink(public_path('upload/foto/' . $daftar_jualan->foto));
                }

                $fileName = time() . '_' . $request->foto->getClientOriginalName();
                $request->foto->move(public_path('upload/foto'), $fileName);
                $data['foto'] = $fileName;
            }

            $daftar_jualan->update($data);

            return redirect()->route('daftar_jualan.index')->with('success', 'Barang berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('daftar_jualan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $daftar_jualan = Daftar_Jualan::findOrFail($id);
            if ($daftar_jualan->foto && file_exists(public_path('upload/foto/' . $daftar_jualan->foto))) {
                unlink(public_path('upload/foto/' . $daftar_jualan->foto));
            }

            $daftar_jualan->delete();
            return redirect()->route('daftar_jualan.index')->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('daftar_jualan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
