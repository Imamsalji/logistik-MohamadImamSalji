<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BarangController::class, 'dashboard'])->name('dashboard');

    Route::prefix('barang')->group(function () {
        // Group untuk Barang Masuk
        Route::prefix('masuk')->group(function () {
            Route::get('/', [BarangController::class, 'daftarBarangMasuk'])->name('barang_masuk.index');
            Route::get('/create', [BarangController::class, 'formBarangMasuk'])->name('barang_masuk.create');
            Route::post('/', [BarangController::class, 'simpanBarangMasuk'])->name('barang_masuk.store');
            Route::post('/{id}', [BarangController::class, 'hapusBarangMasuk'])->name('barang_masuk.destroy');
        });

        // Group untuk Barang Keluar
        Route::prefix('keluar')->group(function () {
            Route::get('/', [BarangController::class, 'daftarBarangKeluar'])->name('barang_keluar.index');
            Route::get('/create', [BarangController::class, 'formBarangKeluar'])->name('barang_keluar.create');
            Route::post('/', [BarangController::class, 'simpanBarangKeluar'])->name('barang_keluar.store');
            Route::post('/{id}', [BarangController::class, 'hapusBarangKeluar'])->name('barang_keluar.destroy');
        });
        Route::get('/stok', [BarangController::class, 'barangStok'])->name('barang.stok');
    });

    //Laporan Route
    Route::prefix('laporan')->group(function () {
        Route::get('/barang-masuk', [LaporanController::class, 'barangMasukPDF'])->name('laporan.barangMasukPDF');
        Route::get('/barang-keluar', [LaporanController::class, 'barangKeluarPDF'])->name('laporan.barangKeluarPDF');
        Route::get('/barang', [LaporanController::class, 'barangPDF'])->name('laporan.barangPDF');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
