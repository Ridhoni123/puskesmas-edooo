@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Pelayanan Bayi Baru Lahir</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan Bayi (KN 3)</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('bayi-baru-lahir.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Pelayanan KN 3</label>
                    <input type="date" name="tanggal_kn3" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Bayi</label> [cite: 11]
                    <input type="text" name="nama_bayi" class="form-control" placeholder="Contoh: By. Ny. Jihan Saftri" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Lahir Bayi</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>NIK (Jika Ada)</label> [cite: 11]
                    <input type="text" name="nik" class="form-control" maxlength="16">
                </div>
            </div>
            {{-- Tambahkan di dalam <form> setelah baris NIK atau sebelum Alamat --}}
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Contoh: Banjarmasin">
                </div>
                <div class="col-md-3 form-group">
                    <label>Berat Badan (gram)</label>
                    <input type="number" name="berat_badan" class="form-control" placeholder="Contoh: 3000">
                </div>
                <div class="col-md-3 form-group">
                    <label>Panjang Badan (cm)</label>
                    <input type="number" name="panjang_badan" class="form-control" placeholder="Contoh: 49">
                </div>
            </div>

            <div class="form-group">
                <label>Kondisi Kesehatan</label>
                <select name="kondisi_kesehatan" class="form-control">
                    <option value="Sehat">Sehat</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Perlu Observasi">Perlu Observasi</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Ayah/Ibu</label> [cite: 11]
                    <input type="text" name="nama_orang_tua" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jaminan Kesehatan/PBI</label>
                    <select name="is_pbi" class="form-control">
                        <option value="1">Ya (v)</option> [cite: 11]
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label> [cite: 11]
                <textarea name="alamat" class="form-control" rows="2" placeholder="Contoh: Ais. Nasution Rt. 02"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-info">Simpan Data Bayi</button>

                <a href="{{ route('bayi-baru-lahir.index') }}"
                    class="btn btn-secondary ml-2">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>
@endsection