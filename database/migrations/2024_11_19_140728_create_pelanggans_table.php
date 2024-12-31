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
    Schema::create('pelanggans', function (Blueprint $table) {
        $table->id();        
        $table->string('nama');
        $table->string('no_rek');
        $table->string('alamat_pembeli');        
        $table->string('harga');
        $table->string('no_hp');        
        $table->foreignId('daftar_jualan_id')->constrained('daftar_jualan')->onDelete('cascade');
        $table->timestamps();
    });
    
}

public function down()
{
    Schema::dropIfExists('pelanggans');
}

};
