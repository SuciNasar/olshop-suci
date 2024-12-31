<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('daftar__jualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penjual');
            $table->string('nama_barang');
            $table->string('alamat_toko');
            $table->string('harga');            
            $table->string('foto');
            $table->string('no_rek');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('daftar__jualans');
    }
    
};
