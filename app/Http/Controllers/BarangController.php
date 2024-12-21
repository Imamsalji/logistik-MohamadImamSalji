<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Dashboard.
     */
    public function dashboard()
    {
        // Ambil Data barang
        $barangData = DB::table('barang')
            ->leftJoin('barang_masuk', 'barang.kode_barang', '=', 'barang_masuk.kode_barang')
            ->leftJoin('barang_keluar', 'barang.kode_barang', '=', 'barang_keluar.kode_barang')
            ->select(
                'barang.kode_barang',
                'barang.nama_barang',
                'barang.deskripsi_barang',
                'barang.stok',
                DB::raw('SUM(barang_masuk.quantity) as total_barang_masuk'),
                DB::raw('SUM(barang_keluar.quantity) as total_barang_keluar'),
                DB::raw('(SUM(barang_masuk.quantity) - SUM(barang_keluar.quantity)) as total_barang')
            )
            ->groupBy('barang.kode_barang', 'barang.nama_barang', 'barang.deskripsi_barang', 'barang.stok')
            ->get();

        $seluruhBarang = [
            'stok' => 0,
            'total_barang_masuk' => 0,
            'total_barang_keluar' => 0,
            'total_barang' => 0
        ];

        foreach ($barangData as $barang) {
            $seluruhBarang['stok'] += $barang->stok;
            $seluruhBarang['total_barang_masuk'] += $barang->total_barang_masuk;
            $seluruhBarang['total_barang_keluar'] += $barang->total_barang_keluar;
        }
        $seluruhBarang['total_barang'] = count($barangData);

        // Ambil total quantity per tahun
        $totalQuantityPerYear = DB::table('barang_masuk')
            ->selectRaw('YEAR(tanggal_masuk) as tahun, SUM(quantity) as total_quantity')
            ->groupByRaw('YEAR(tanggal_masuk)')
            ->orderByRaw('YEAR(tanggal_masuk) ASC')
            ->get();
        // dd($seluruhBarang, $barangData, $totalQuantityPerYear);

        return view('dashboard', [
            'totalQuantityPerYear' => $totalQuantityPerYear,
            'seluruhBarang' => $seluruhBarang,
            'barangData' => $barangData,
        ]);
    }

    /**
     * Data daftar barang masuk.
     */
    public function barangstok()
    {
        $barang = Barang::all(); // Ambil data barang masuk beserta relasi
        return view('barang.index', compact('barang'));
    }

    /**
     * Data daftar barang masuk.
     */
    public function daftarBarangMasuk()
    {
        $barangMasuk = BarangMasuk::with('barang')->paginate(10); // Ambil data barang masuk beserta relasi
        return view('barang_masuk.index', compact('barangMasuk'));
    }

    /**
     * Form input barang masuk.
     */
    public function formBarangMasuk()
    {
        $barang = Barang::all(); // Ambil semua data barang untuk dropdown
        return view('barang_masuk.create', compact('barang'));
    }

    /**
     * Simpan barang masuk.
     */
    public function simpanBarangMasuk(Request $request)
    {
        $validated = $request->validate([
            'no_barang_masuk' => 'required|string|unique:barang_masuk,no_barang_masuk|max:50',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'quantity' => 'required|integer|min:1',
            'origin' => 'required|string|max:150',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create($validated);

        // Update stok barang
        $barang = Barang::find($validated['kode_barang']);
        $barang->stok += $validated['quantity'];
        $barang->save();

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil dicatat.');
    }

    /**
     * Data daftar barang keluar.
     */
    public function daftarBarangKeluar()
    {
        $barangKeluar = BarangKeluar::with('barang')->paginate(10); // Ambil data barang keluar beserta relasi
        return view('barang_keluar.index', compact('barangKeluar'));
    }

    /**
     * Form input barang keluar.
     */
    public function formBarangKeluar()
    {
        $barang = Barang::all(); // Ambil semua data barang untuk dropdown
        return view('barang_keluar.create', compact('barang'));
    }

    /**
     * Simpan barang keluar.
     */
    public function simpanBarangKeluar(Request $request)
    {
        $validated = $request->validate([
            'no_barang_keluar' => 'required|string|unique:barang_keluar,no_barang_keluar|max:50',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'quantity' => 'required|integer|min:1',
            'destination' => 'required|string|max:150',
            'tanggal_keluar' => 'required|date',
        ]);

        $barang = Barang::find($validated['kode_barang']);
        if ($validated['quantity'] > $barang->stok) {
            return back()->withErrors(['quantity' => 'Jumlah barang keluar melebihi stok yang tersedia.'])->withInput();
        }

        BarangKeluar::create($validated);

        // Update stok barang
        $barang->stok -= $validated['quantity'];
        $barang->save();

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }

    /**
     * Form edit barang masuk.
     */
    public function editBarangMasuk($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id); // Temukan barang masuk berdasarkan ID
        $barang = Barang::all(); // Ambil semua data barang untuk dropdown
        return view('barang_masuk.edit', compact('barangMasuk', 'barang'));
    }

    /**
     * Update barang masuk.
     */
    public function updateBarangMasuk(Request $request, $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $validated = $request->validate([
            'no_barang_masuk' => 'required|string|unique:barang_masuk,no_barang_masuk,' . $id . '|max:50',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'quantity' => 'required|integer|min:1',
            'origin' => 'required|string|max:150',
            'tanggal_masuk' => 'required|date',
        ]);

        // Update stok barang
        $oldQuantity = $barangMasuk->quantity;
        $barang = Barang::find($barangMasuk->kode_barang);
        $barang->stok -= $oldQuantity; // Kurangi stok lama
        $barang->stok += $validated['quantity']; // Tambahkan stok baru
        $barang->save();

        $barangMasuk->update($validated);
        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil diperbarui.');
    }

    /**
     * Hapus barang masuk.
     */
    public function hapusBarangMasuk($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::find($barangMasuk->kode_barang);

        // Kurangi stok barang
        $barang->stok -= $barangMasuk->quantity;
        $barang->save();

        $barangMasuk->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil dihapus.');
    }

    /**
     * Form edit barang keluar.
     */
    public function editBarangKeluar($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id); // Temukan barang keluar berdasarkan ID
        $barang = Barang::all(); // Ambil semua data barang untuk dropdown
        return view('barang_keluar.edit', compact('barangKeluar', 'barang'));
    }

    /**
     * Update barang keluar.
     */
    public function updateBarangKeluar(Request $request, $id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $validated = $request->validate([
            'no_barang_keluar' => 'required|string|unique:barang_keluar,no_barang_keluar,' . $id . '|max:50',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'quantity' => 'required|integer|min:1',
            'destination' => 'required|string|max:150',
            'tanggal_keluar' => 'required|date',
        ]);

        // Update stok barang
        $oldQuantity = $barangKeluar->quantity;
        $barang = Barang::find($barangKeluar->kode_barang);
        $barang->stok += $oldQuantity; // Tambahkan stok lama
        if ($validated['quantity'] > $barang->stok) {
            return back()->withErrors(['quantity' => 'Jumlah barang keluar melebihi stok yang tersedia.'])->withInput();
        }
        $barang->stok -= $validated['quantity']; // Kurangi stok baru
        $barang->save();

        $barangKeluar->update($validated);
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil diperbarui.');
    }

    /**
     * Hapus barang keluar.
     */
    public function hapusBarangKeluar($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barang = Barang::find($barangKeluar->kode_barang);

        // Tambahkan stok barang
        $barang->stok += $barangKeluar->quantity;
        $barang->save();

        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil dihapus.');
    }
}
