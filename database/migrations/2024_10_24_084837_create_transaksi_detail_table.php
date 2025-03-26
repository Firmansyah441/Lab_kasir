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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id();
            $table->char('transaksi_id',10);
            $table->char('barang_id',10);
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->foreign('transaksi_id')->references('kode_transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('barang_id')->references('kode_barang')->on('barang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
    }
};
