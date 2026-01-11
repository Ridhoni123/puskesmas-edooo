<?php

namespace App\Http\Controllers;

use App\Models\PasienHiv;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PasienHivController extends Controller
{
    public function index()
    {
        $data = PasienHiv::all();
        return view('pasien_hiv.index', compact('data'));
    }

    public function create()
    {
        return view('pasien_hiv.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_sample' => 'required|date',
            'nama_pasien' => 'required',
            'tempat_tgl_lahir' => 'required',
            'nik' => 'required|digits:16',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'ruangan_pengirim' => 'required',
            'asuransi' => 'required',
            'hasil_tes' => 'required'
        ]);

        PasienHiv::create($request->all());
        return redirect()->route('pasien-hiv.index')->with('success', 'Data HIV Berhasil Disimpan');
    }

    // --- BAGIAN INI YANG BARU DITAMBAHKAN ---

    // 1. Method Edit: Untuk menampilkan form edit
    public function edit($id)
    {
        // Kita ubah nama variabelnya menjadi $hiv agar cocok dengan View
        $hiv = PasienHiv::find($id);

        // Kirim data ke view menggunakan compact('hiv')
        return view('pasien_hiv.edit', compact('hiv'));
    }

    // 2. Method Update: Untuk menyimpan perubahan
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_sample' => 'required|date',
            'nama_pasien' => 'required',
            'tempat_tgl_lahir' => 'required',
            'nik' => 'required|digits:16',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'ruangan_pengirim' => 'required',
            'asuransi' => 'required',
            'hasil_tes' => 'required'
        ]);

        $pasien = PasienHiv::find($id);
        $pasien->update($request->all());

        return redirect()->route('pasien-hiv.index')->with('success', 'Data HIV Berhasil Diupdate');
    }

    // 3. Method Destroy: Untuk menghapus data
    public function destroy($id)
    {
        $pasien = PasienHiv::find($id);
        $pasien->delete();

        return redirect()->route('pasien-hiv.index')->with('success', 'Data HIV Berhasil Dihapus');
    }

    public function cetakPdf(Request $request)
    {
        // 1. Cek Filter
        if ($request->filter == 'periode') {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // Filter berdasarkan 'tanggal_sample'
            $data = PasienHiv::whereBetween('tanggal_sample', [$tgl_awal, $tgl_akhir])->get();

            $periode = "Periode: " . Carbon::parse($tgl_awal)->translatedFormat('d F Y') . " s/d " . Carbon::parse($tgl_akhir)->translatedFormat('d F Y');
        } else {
            // Ambil Semua Data
            $data = PasienHiv::all();
            $periode = "Semua Periode";
        }

        // 2. Kirim ke view cetak
        return view('pasien_hiv.cetak', compact('data', 'periode'));
    }
}
