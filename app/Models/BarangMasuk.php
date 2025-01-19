<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk'; // Nama tabel
    protected $primaryKey = 'id_barang_masuk'; // Primary key
    public $incrementing = true; // Primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'kode_barang',
        'petugas',
        'no_barang_masuk',
        'quantity',
        'origin',
        'tanggal_masuk',
    ];

    /**
     * Relasi dengan Barang (Many-to-One).
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
