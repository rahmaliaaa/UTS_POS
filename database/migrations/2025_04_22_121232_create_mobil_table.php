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
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model');
            $table->string('tipe');
            $table->integer('tahun');
            $table->decimal('harga', 15, 2);
            $table->integer('stok');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
