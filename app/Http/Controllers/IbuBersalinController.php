<?php

namespace App\Http\Controllers;

use App\Models\IbuBersalin;
use Illuminate\Http\Request;

class IbuBersalinController extends Controller
{
    public function index() {
        $data = IbuBersalin::all();
        return view('ibu_bersalin.index', compact('data'));
    }

    public function create() {
        return view('ibu_bersalin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_ibu'            => 'required|string',
            'nik'                 => 'required|digits:16',
            'tanggal_persalinan'  => 'required|date',
            'tempat_persalinan'   => 'required',
            'penolong_persalinan' => 'required',
            'metode_persalinan'   => 'required',
            'kondisi_ibu'         => 'required',
            'kondisi_bayi'        => 'required',
            'alamat'              => 'required'
        ]);

        IbuBersalin::create($request->all());
        return redirect()->route('ibu-bersalin.index')->with('success', 'Data berhasil disimpan!');
    }

    // --- TAMBAHKAN FUNGSI EDIT DI BAWAH INI ---
    public function edit($id) {
        $bersalin = IbuBersalin::findOrFail($id);
        return view('ibu_bersalin.edit', compact('bersalin'));
    }

    // --- TAMBAHKAN FUNGSI UPDATE DI BAWAH INI ---
    public function update(Request $request, $id) {
        $request->validate([
            'nama_ibu'            => 'required|string',
            'nik'                 => 'required|digits:16',
            'tanggal_persalinan'  => 'required|date',
            'tempat_persalinan'   => 'required',
            'penolong_persalinan' => 'required',
            'metode_persalinan'   => 'required',
            'kondisi_ibu'         => 'required',
            'kondisi_bayi'        => 'required',
            'alamat'              => 'required'
        ]);

        $bersalin = IbuBersalin::findOrFail($id);
        $bersalin->update($request->all());

        return redirect()->route('ibu-bersalin.index')->with('success', 'Data berhasil diperbarui!');
    }

    // --- TAMBAHKAN FUNGSI DESTROY (HAPUS) ---
    public function destroy($id) {
        $bersalin = IbuBersalin::findOrFail($id);
        $bersalin->delete();
        return redirect()->route('ibu-bersalin.index')->with('success', 'Data berhasil dihapus!');
    }
}