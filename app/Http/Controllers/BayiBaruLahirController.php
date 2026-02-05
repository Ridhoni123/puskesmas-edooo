<?php

namespace App\Http\Controllers;

use App\Models\BayiBaruLahir;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'tempat_lahir'      => 'nullable|string',      // Tambahkan ini
            'berat_badan'       => 'nullable|numeric',     // Tambahkan ini
            'panjang_badan'     => 'nullable|numeric',     // Tambahkan ini
            'kondisi_kesehatan' => 'nullable|string',
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
            'tempat_lahir'      => 'nullable|string',      // Tambahkan ini
            'berat_badan'       => 'nullable|numeric',     // Tambahkan ini
            'panjang_badan'     => 'nullable|numeric',     // Tambahkan ini
            'kondisi_kesehatan' => 'nullable|string',
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

    public function cetakPdf(Request $request)
    {
        // 1. Cek Filter
        if ($request->filter == 'periode') {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // Filter berdasarkan 'tanggal_kn3' (Tanggal Pelayanan)
            $data = BayiBaruLahir::whereBetween('tanggal_kn3', [$tgl_awal, $tgl_akhir])->get();

            $periode = "Periode: " . Carbon::parse($tgl_awal)->translatedFormat('d F Y') . " s/d " . Carbon::parse($tgl_akhir)->translatedFormat('d F Y');
        } else {
            // Ambil Semua Data
            $data = BayiBaruLahir::all();
            $periode = "Semua Periode";
        }

        // 2. Kirim ke view cetak
        return view('bayi_baru_lahir.cetak', compact('data', 'periode'));
    }
}