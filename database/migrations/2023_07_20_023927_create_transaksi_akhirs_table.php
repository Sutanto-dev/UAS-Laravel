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
        Schema::create('transaksi_akhirs', function (Blueprint $table) {
            $table->id();
            $table->string('nomorTransaksi');
            $table->string('kasir');
            $table->string('pembeli');
            $table->date('tanggalPembelian');
            $table->integer('subtotal');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_akhirs');
    }
};
