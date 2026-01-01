<?php

namespace App\Http\Controllers;

use App\Models\PasienHiv;
use Illuminate\Http\Request;

class PasienHivController extends Controller
{
    public function index() {
        $data = PasienHiv::all();
        return view('pasien_hiv.index', compact('data'));
    }

    public function create() {
        return view('pasien_hiv.create');
    }

    public function store(Request $request) {
    $request->validate([
        'tanggal_sample' => 'required|date',
        'nama_pasien' => 'required',
        'tempat_tgl_lahir' => 'required', // Tambahkan ini 
        'nik' => 'required|digits:16',
        'alamat' => 'required',           // Tambahkan ini [cite: 19]
        'jenis_kelamin' => 'required',
        'umur' => 'required',
        'ruangan_pengirim' => 'required',
        'asuransi' => 'required',
        'hasil_tes' => 'required'
    ]);

    PasienHiv::create($request->all());
    return redirect()->route('pasien-hiv.index')->with('success', 'Data HIV Berhasil Disimpan');
}
}
