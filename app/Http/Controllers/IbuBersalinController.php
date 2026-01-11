<?php

namespace App\Http\Controllers;

use App\Models\IbuBersalin;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function cetakPdf(Request $request)
    {
        // 1. Cek Filter
        if ($request->filter == 'periode') {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // Filter berdasarkan 'tanggal_persalinan'
            $data = IbuBersalin::whereBetween('tanggal_persalinan', [$tgl_awal, $tgl_akhir])->get();

            $periode = "Periode: " . Carbon::parse($tgl_awal)->translatedFormat('d F Y') . " s/d " . Carbon::parse($tgl_akhir)->translatedFormat('d F Y');
        } else {
            // Ambil Semua Data
            $data = IbuBersalin::all();
            $periode = "Semua Periode";
        }

        // 2. Kirim ke view cetak
        return view('ibu_bersalin.cetak', compact('data', 'periode'));
    }
}