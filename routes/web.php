<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\IbuBersalinController;
use App\Http\Controllers\BayiBaruLahirController;
use App\Http\Controllers\PasienHivController;
use App\Http\Controllers\TerdugaTbcController;
use App\Http\Controllers\PegawaiController; // Jangan lupa import ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Route untuk Tamu (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// 2. Route untuk User yang Sudah Login (Semua Level)
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard (Bisa diakses Admin, Kepala, Petugas)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // -------------------------------------------------------
    // PEMBATASAN HAK AKSES (ROLE)
    // -------------------------------------------------------

    // Grup Route yang HANYA bisa diakses Admin dan Petugas
    Route::middleware(['ceklevel:admin,petugas'])->group(function () {

        // --- PERBAIKAN DI SINI ---
        // Route khusus (Cetak) HARUS diletakkan SEBELUM Route Resource
        Route::get('ibu-hamil/cetak-laporan', [IbuHamilController::class, 'cetakPdf'])->name('ibu-hamil.cetak');
        Route::get('ibu-bersalin/cetak-laporan', [IbuBersalinController::class, 'cetakPdf'])->name('ibu-bersalin.cetak');
        Route::get('bayi-baru-lahir/cetak-laporan', [BayiBaruLahirController::class, 'cetakPdf'])->name('bayi-baru-lahir.cetak');
        Route::get('pasien-hiv/cetak-laporan', [PasienHivController::class, 'cetakPdf'])->name('pasien-hiv.cetak');
        Route::get('terduga-tbc/cetak-laporan', [TerdugaTbcController::class, 'cetakPdf'])->name('terduga-tbc.cetak');

        // Baru kemudian Route Resource
        Route::resource('ibu-hamil', IbuHamilController::class);

        Route::resource('ibu-bersalin', IbuBersalinController::class);
        Route::resource('bayi-baru-lahir', BayiBaruLahirController::class);

        // Data Penyakit
        Route::resource('pasien-hiv', PasienHivController::class);
        Route::resource('terduga-tbc', TerdugaTbcController::class);
    });

    // Grup Route KHUSUS ADMIN (Kelola Pegawai)
    Route::middleware(['ceklevel:admin'])->group(function () {
        Route::resource('pegawai', PegawaiController::class);
    });

    // Grup Route KHUSUS KEPALA (Opsional)
    Route::middleware(['ceklevel:kepala,admin'])->group(function () {
        // Route::get('laporan', [LaporanController::class, 'index']);
    });
});
