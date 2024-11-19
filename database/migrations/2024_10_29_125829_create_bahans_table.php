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
        Schema::create('bahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->integer('jumlah_stok');
            $table->string('satuan');
            $table->integer('minimum_stok');
            $table->decimal('harga_terakhir', 8, 2);
            $table->date('tanggal_terakhir_stok');
            $table->timestamps();
        });
    }
    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahans');
    }
};
