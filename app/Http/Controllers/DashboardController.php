<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\IbuBersalin;
use App\Models\BayiBaruLahir;
use App\Models\PasienHiv;
use App\Models\TerdugaTbc;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total data dari masing-masing model
        $countHamil = \App\Models\IbuHamil::count();
        $countBersalin = \App\Models\IbuBersalin::count();
        $countBayi = \App\Models\BayiBaruLahir::count();

        // Data Penyakit
        $countHiv = \App\Models\PasienHiv::count();
        $countTbc = \App\Models\TerdugaTbc::count();

        // Hitung Total Pasien Terdaftar (Semua Kategori)
        $totalPasien = $countHamil + $countBersalin + $countBayi + $countHiv + $countTbc;

        return view('dashboard', compact(
            'countHamil',
            'countBersalin',
            'countBayi',
            'countHiv',
            'countTbc',
            'totalPasien'
        ));
    }
}
