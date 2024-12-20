<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Nama tabel
    protected $primaryKey = 'kode_barang'; // Primary key
    public $incrementing = true; // Primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'nama_barang',
        'deskripsi_barang',
        'stok',
    ];

    /**
     * Relasi dengan BarangMasuk (One-to-Many).
     */
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'kode_barang', 'kode_barang');
    }

    /**
     * Relasi dengan BarangKeluar (One-to-Many).
     */
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'kode_barang', 'kode_barang');
    }
}
