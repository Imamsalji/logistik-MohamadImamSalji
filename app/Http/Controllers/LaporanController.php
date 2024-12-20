<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Barang;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function barangMasukPDF()
    {
        $barangMasuk = BarangMasuk::with('barang')->get();

        $pdf = PDF::loadView('laporan.barang_masuk', compact('barangMasuk'));
        return $pdf->stream('laporan_barang_masuk.pdf');
    }

    public function barangKeluarPDF()
    {
        $barangKeluar = BarangKeluar::with('barang')->get();

        $pdf = PDF::loadView('laporan.barang_keluar', compact('barangKeluar'));
        return $pdf->stream('laporan_barang_keluar.pdf');
    }

    public function barangPDF()
    {
        $barang = Barang::all();

        $pdf = PDF::loadView('laporan.barang', compact('barang'));
        return $pdf->stream('laporan_barang.pdf');
    }
}
