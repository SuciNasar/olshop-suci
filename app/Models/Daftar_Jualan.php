<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Jualan extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama_penjual', 
    'nama_barang', 
    'alamat_toko', 
    'harga',
    'no_rek', 
    'foto'
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
