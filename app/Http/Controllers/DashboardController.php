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
        // Menghitung jumlah total data dari setiap tabel
        $countHamil = IbuHamil::count();
        $countBersalin = IbuBersalin::count();
        $countBayi = BayiBaruLahir::count();
        $countHiv = PasienHiv::count();
        $countTbc = TerdugaTbc::count();

        return view('dashboard', compact('countHamil', 'countBersalin', 'countBayi', 'countHiv', 'countTbc'));
    }
}
