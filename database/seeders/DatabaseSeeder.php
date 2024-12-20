<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Laptop Asus',
                'deskripsi_barang' => 'Laptop Asus dengan spesifikasi tinggi, cocok untuk kebutuhan kerja dan gaming.',
                'stok' => 50,
            ],
            [
                'nama_barang' => 'Printer Epson',
                'deskripsi_barang' => 'Printer Epson multifungsi dengan kemampuan cetak warna dan hitam putih.',
                'stok' => 30,
            ],
            [
                'nama_barang' => 'Monitor LG',
                'deskripsi_barang' => 'Monitor LG dengan resolusi Full HD, ideal untuk produktivitas dan hiburan.',
                'stok' => 20,
            ],
            [
                'nama_barang' => 'Keyboard Logitech',
                'deskripsi_barang' => 'Keyboard Logitech ergonomis dengan fitur wireless untuk kenyamanan mengetik.',
                'stok' => 100,
            ],
            [
                'nama_barang' => 'Mouse Razer',
                'deskripsi_barang' => 'Mouse gaming Razer dengan sensor presisi tinggi dan desain ergonomis.',
                'stok' => 75,
            ],
        ]);
    }
}
