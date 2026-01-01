<?php

namespace App\Http\Controllers;

use App\Models\TerdugaTbc;
use Illuminate\Http\Request;

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
}
