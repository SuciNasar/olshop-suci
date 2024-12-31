<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; // Pastikan nama tabel benar
    protected $fillable = [
        'nama',
        'no_rek',
        'alamat_pembeli',
        'harga',
        'no_hp',
        'daftar_jualan_id',
    ];

    public function daftar__jualan()
    {
        return $this->belongsTo(Daftar_Jualan::class, 'daftar_jualan_id');
    }
}
