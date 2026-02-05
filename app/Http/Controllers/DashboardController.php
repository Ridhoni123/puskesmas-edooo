<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\IbuBersalin;
use App\Models\BayiBaruLahir;
use App\Models\PasienHiv;
use App\Models\TerdugaTbc;
use App\Exports\LaporanKeseluruhanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function laporanKeseluruhan()
    {
        $data = [
            'total_ibu_hamil'    => IbuHamil::count(),
            'total_ibu_bersalin' => IbuBersalin::count(),
            'total_bayi'         => BayiBaruLahir::count(),
            'total_hiv'          => PasienHiv::count(),
            'total_tbc'          => TerdugaTbc::count(),
        ];

        return view('laporan.keseluruhan', $data);
    }

    public function exportExcel()
    {
        $data = $this->getDataRekap();
        return Excel::download(new LaporanKeseluruhanExport($data), 'Laporan_Puskesmas_' . date('Y-m-d') . '.xlsx');
    }

    public function exportPdf()
    {
        $data = $this->getDataRekap();
        $pdf = Pdf::loadView('laporan.pdf_keseluruhan', $data);
        return $pdf->download('Laporan_Puskesmas_' . date('Y-m-d') . '.pdf');
    }

    // Fungsi pembantu agar tidak menulis ulang hitungan count()
    private function getDataRekap()
    {
        return [
            'total_ibu_hamil'    => \App\Models\IbuHamil::count(),
            'total_ibu_bersalin' => \App\Models\IbuBersalin::count(),
            'total_bayi'         => \App\Models\BayiBaruLahir::count(),
            'total_hiv'          => \App\Models\PasienHiv::count(),
            'total_tbc'          => \App\Models\TerdugaTbc::count(),
            'tanggal'            => date('d F Y')
        ];
    }
}
