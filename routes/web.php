<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\IbuBersalinController;
use App\Http\Controllers\BayiBaruLahirController;
use App\Http\Controllers\PasienHivController;
use App\Http\Controllers\TerdugaTbcController;
use App\Http\Controllers\DashboardController;

// Route untuk masing-masing fitur
Route::resource('ibu-hamil', IbuHamilController::class);
Route::resource('ibu-bersalin', IbuBersalinController::class);
Route::resource('bayi-baru-lahir', BayiBaruLahirController::class);
Route::resource('pasien-hiv', PasienHivController::class);
Route::resource('terduga-tbc', TerdugaTbcController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');