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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barang_keluar'); // Primary Key
            $table->string('no_barang_keluar', 150)->unique(); // Tujuan barang
            $table->unsignedBigInteger('kode_barang'); // Foreign Key ke Barang
            $table->integer('quantity'); // Jumlah barang keluar
            $table->string('destination', 150); // Tujuan barang
            $table->date('tanggal_keluar'); // Tanggal barang keluar
            $table->timestamps(); // created_at and updated_at

            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
