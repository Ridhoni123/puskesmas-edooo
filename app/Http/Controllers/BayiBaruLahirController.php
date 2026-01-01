<?php

namespace App\Http\Controllers;

use App\Models\BayiBaruLahir;
use Illuminate\Http\Request;

class BayiBaruLahirController extends Controller
{
    public function index() {
        $data = BayiBaruLahir::latest()->get();
        return view('bayi_baru_lahir.index', compact('data'));
    }

    public function create() {
        return view('bayi_baru_lahir.create');
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal_kn3'    => 'required|date',
            'nama_bayi'      => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'nik'            => 'nullable|digits:16',
            'nama_orang_tua' => 'required|string',
            'is_pbi'         => 'required',
            'alamat'         => 'required'
        ]);

        BayiBaruLahir::create($request->all());
        return redirect()->route('bayi-baru-lahir.index')->with('success', 'Data bayi baru lahir berhasil ditambahkan!');
    }

    public function edit($id) {
        $bayi = BayiBaruLahir::findOrFail($id);
        return view('bayi_baru_lahir.edit', compact('bayi'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tanggal_kn3'    => 'required|date',
            'nama_bayi'      => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'nik'            => 'nullable|digits:16',
            'nama_orang_tua' => 'required|string',
            'is_pbi'         => 'required',
            'alamat'         => 'required'
        ]);

        $bayi = BayiBaruLahir::findOrFail($id);
        $bayi->update($request->all());

        return redirect()->route('bayi-baru-lahir.index')->with('success', 'Data bayi berhasil diperbarui!');
    }

    public function destroy($id) {
        $bayi = BayiBaruLahir::findOrFail($id);
        $bayi->delete();
        return redirect()->route('bayi-baru-lahir.index')->with('success', 'Data bayi berhasil dihapus!');
    }
}