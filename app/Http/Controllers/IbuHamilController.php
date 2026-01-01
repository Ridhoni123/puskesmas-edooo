<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil; 
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    // Menampilkan Tabel Data
    public function index() {
        $data = IbuHamil::all(); 
        return view('ibu_hamil.index', compact('data'));
    }

    // Menampilkan Form Input
    public function create() {
        return view('ibu_hamil.create');
    }

    // Menyimpan Data Baru
    public function store(Request $request) {
        $request->validate([
            'tanggal_k6' => 'required|date',
            'nama_ibu'   => 'required|string',
            'nik'        => 'required|digits:16',
            'nama_suami' => 'required',
            'alamat'     => 'required',
            'is_pbi'     => 'required'
        ]);

        IbuHamil::create($request->all());

        return redirect()->route('ibu-hamil.index')->with('success', 'Data berhasil disimpan!');
    }

    // Menampilkan Form Edit
    public function edit($id) {
        $hamil = IbuHamil::findOrFail($id); 
        return view('ibu_hamil.edit', compact('hamil'));
    }

    // Menyimpan Perubahan Data (Update)
    public function update(Request $request, $id) {
    $request->validate([
        'tanggal_k6'    => 'required|date',
        'nama_ibu'      => 'required|string',
        'tanggal_lahir' => 'required|date', // TAMBAHKAN INI
        'nik'           => 'required|digits:16',
        'nama_suami'    => 'required',
        'alamat'        => 'required',
        'is_pbi'        => 'required'
    ]);

    $hamil = IbuHamil::findOrFail($id);
    $hamil->update($request->all());

    return redirect()->route('ibu-hamil.index')->with('success', 'Data berhasil diperbarui!');
}

    // Menghapus Data
    public function destroy($id) {
        $hamil = IbuHamil::findOrFail($id);
        $hamil->delete();

        return redirect()->route('ibu-hamil.index')->with('success', 'Data berhasil dihapus!');
    }
}