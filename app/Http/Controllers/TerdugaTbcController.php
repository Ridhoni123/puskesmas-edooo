<?php

namespace App\Http\Controllers;

use App\Models\TerdugaTbc;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TerdugaTbcController extends Controller
{
    public function index() {
        $data = TerdugaTbc::all();
        return view('terduga_tbc.index', compact('data'));
    }

    public function create() {
        return view('terduga_tbc.create');
    }

    public function store(Request $request) {
    $request->validate([
        'no_sediaan' => 'required',
        'no_rm' => 'required',
        'tanggal_daftar' => 'required|date',
        'nik' => 'required|digits:16',
        'nama_pasien' => 'required',
        'umur' => 'required|numeric',
        'jenis_kelamin' => 'required',
        'alamat_lengkap' => 'required',
        'hasil_tcm' => 'nullable',
        'status_hiv' => 'nullable', // Tambahkan kolom ini
        'tindak_lanjut' => 'nullable'
    ]);

    TerdugaTbc::create($request->all());
    return redirect()->route('terduga-tbc.index')->with('success', 'Data TBC Berhasil Disimpan');
}
// app/Http/Controllers/TerdugaTbcController.php

public function edit($id)
{
    // 1. Cari data berdasarkan ID
    $tbc = TerdugaTbc::findOrFail($id);
    // 2. Kirim data ke view edit
    return view('terduga_tbc.edit', compact('tbc'));
}

public function update(Request $request, $id)
{
    // 1. Validasi data (samakan dengan fungsi store)
    $request->validate([
        'no_sediaan' => 'required',
        'no_rm' => 'required',
        'tanggal_daftar' => 'required|date',
        'nik' => 'required|digits:16',
        'nama_pasien' => 'required',
        'umur' => 'required|numeric',
        'jenis_kelamin' => 'required',
        'alamat_lengkap' => 'required',
    ]);

    // 2. Cari data yang akan diupdate
    $tbc = TerdugaTbc::findOrFail($id);
    
    // 3. Simpan perubahan
    $tbc->update($request->all());

    // 4. Kembali ke halaman index
    return redirect()->route('terduga-tbc.index')->with('success', 'Data TBC Berhasil Diperbarui');
}

    public function cetakPdf(Request $request)
    {
        // 1. Cek Filter
        if ($request->filter == 'periode') {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // Filter berdasarkan 'tanggal_daftar'
            $data = TerdugaTbc::whereBetween('tanggal_daftar', [$tgl_awal, $tgl_akhir])->get();

            $periode = "Periode: " . Carbon::parse($tgl_awal)->translatedFormat('d F Y') . " s/d " . Carbon::parse($tgl_akhir)->translatedFormat('d F Y');
        } else {
            // Ambil Semua Data
            $data = TerdugaTbc::all();
            $periode = "Semua Periode";
        }

        // 2. Kirim ke view cetak
        return view('terduga_tbc.cetak', compact('data', 'periode'));
    }
}
