<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar'; // Nama tabel
    protected $primaryKey = 'id_barang_keluar'; // Primary key
    public $incrementing = true; // Primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'kode_barang',
        'petugas',
        'no_barang_keluar',
        'quantity',
        'destination',
        'tanggal_keluar',
    ];

    /**
     * Relasi dengan Barang (Many-to-One).
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
