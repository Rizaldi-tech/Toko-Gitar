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
        Schema::create('jams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Gambar');
            $table->string('Nama');
            $table->string('Merek');
            $table->bigInteger('Harga');
            $table->bigInteger('Stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jams');
    }
};
