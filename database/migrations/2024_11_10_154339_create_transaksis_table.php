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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jam_id')->constrained('jams')->onDelete('cascade'); // Foreign key untuk produk            
            $table->date('Tanggal_transaksi');
            $table->string('Nama_pembeli');
            $table->integer('Jumlah_barang');
            $table->bigInteger('Total_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
