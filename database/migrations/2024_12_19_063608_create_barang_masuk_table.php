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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_barang_masuk'); // Primary Key
            $table->string('no_barang_masuk', 150)->unique(); // Tujuan barang
            $table->unsignedBigInteger('kode_barang'); // Foreign Key ke Barang
            $table->integer('quantity'); // Jumlah barang masuk
            $table->string('origin', 150); // Asal barang
            $table->date('tanggal_masuk'); // Tanggal barang masuk
            $table->timestamps(); // created_at and updated_at

            // Definisi foreign key
            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
