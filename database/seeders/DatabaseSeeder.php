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
        $barang = [
            ['nama_barang' => 'Laptop', 'deskripsi_barang' => 'Laptop dengan spek tinggi', 'stok' => 10],
            ['nama_barang' => 'Kulkas', 'deskripsi_barang' => 'Kulkas 2 pintu', 'stok' => 5],
            ['nama_barang' => 'Smartphone', 'deskripsi_barang' => 'Smartphone dengan kamera 108 MP', 'stok' => 15],
            ['nama_barang' => 'Televisi', 'deskripsi_barang' => 'Televisi LED 50 inci', 'stok' => 8],
            ['nama_barang' => 'Kamera', 'deskripsi_barang' => 'Kamera mirrorless dengan lensa kit', 'stok' => 3],
            ['nama_barang' => 'AC', 'deskripsi_barang' => 'AC 1 PK', 'stok' => 6],
            ['nama_barang' => 'Microwave', 'deskripsi_barang' => 'Microwave dengan 20 liter kapasitas', 'stok' => 12],
            ['nama_barang' => 'Mesin Cuci', 'deskripsi_barang' => 'Mesin cuci 1 tabung', 'stok' => 7],
            ['nama_barang' => 'Blender', 'deskripsi_barang' => 'Blender 3 in 1', 'stok' => 20],
            ['nama_barang' => 'Rice Cooker', 'deskripsi_barang' => 'Rice cooker 1 liter', 'stok' => 5],
            ['nama_barang' => 'Fan', 'deskripsi_barang' => 'Kipas angin berdiri', 'stok' => 25],
            ['nama_barang' => 'Jam Tangan', 'deskripsi_barang' => 'Jam tangan digital', 'stok' => 30],
            ['nama_barang' => 'Mouse', 'deskripsi_barang' => 'Mouse wireless', 'stok' => 18],
            ['nama_barang' => 'Keyboard', 'deskripsi_barang' => 'Keyboard mekanik', 'stok' => 14],
            ['nama_barang' => 'Speaker', 'deskripsi_barang' => 'Speaker bluetooth', 'stok' => 10],
            ['nama_barang' => 'Power Bank', 'deskripsi_barang' => 'Power bank 10000mAh', 'stok' => 50],
            ['nama_barang' => 'Tas Ransel', 'deskripsi_barang' => 'Tas ransel multifungsi', 'stok' => 22],
            ['nama_barang' => 'Sepatu', 'deskripsi_barang' => 'Sepatu olahraga', 'stok' => 28],
            ['nama_barang' => 'Baju', 'deskripsi_barang' => 'Baju kaos lengan panjang', 'stok' => 33],
            ['nama_barang' => 'Celana', 'deskripsi_barang' => 'Celana panjang jeans', 'stok' => 19],
            ['nama_barang' => 'Sandal', 'deskripsi_barang' => 'Sandal casual', 'stok' => 25],
            ['nama_barang' => 'Kacamata', 'deskripsi_barang' => 'Kacamata hitam', 'stok' => 15],
            ['nama_barang' => 'Payung', 'deskripsi_barang' => 'Payung lipat', 'stok' => 50],
            ['nama_barang' => 'Sarung Tangan', 'deskripsi_barang' => 'Sarung tangan winter', 'stok' => 40],
            ['nama_barang' => 'Dompet', 'deskripsi_barang' => 'Dompet kulit', 'stok' => 35],
            ['nama_barang' => 'Parfum', 'deskripsi_barang' => 'Parfum pria 50ml', 'stok' => 20],
            ['nama_barang' => 'Shampoo', 'deskripsi_barang' => 'Shampoo anti ketombe', 'stok' => 50],
            ['nama_barang' => 'Sabun', 'deskripsi_barang' => 'Sabun mandi wangi', 'stok' => 45],
            ['nama_barang' => 'Lilin', 'deskripsi_barang' => 'Lilin aromaterapi', 'stok' => 60],
            ['nama_barang' => 'Peralatan Dapur', 'deskripsi_barang' => 'Peralatan dapur set lengkap', 'stok' => 15],
        ];

        DB::table('barang')->insert($barang);
    }
}
