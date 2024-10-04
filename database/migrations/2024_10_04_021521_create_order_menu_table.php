<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_menu', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Relasi ke Order
            $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // Relasi ke Menu
            $table->integer('quantity'); // Jumlah menu yang dipesan
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_menu');
    }
};
