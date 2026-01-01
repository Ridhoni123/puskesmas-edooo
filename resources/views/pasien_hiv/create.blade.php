@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Data Pemeriksaan HIV</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Serologi HIV</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pasien-hiv.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Sample</label> <input type="date" name="tanggal_sample" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Pasien</label> <input type="text" name="nama_pasien" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>NIK / ID KTP</label> <input type="text" name="nik" class="form-control" maxlength="16" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jenis Kelamin</label> <select name="jenis_kelamin" class="form-control" required>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Umur</label> <input type="text" name="umur" class="form-control" placeholder="Contoh: 23 Thn">
                </div>
                <div class="col-md-4 form-group">
                    <label>Ruangan Pengirim</label> <select name="ruangan_pengirim" class="form-control">
                        <option value="KIA">KIA</option>
                        <option value="UMUM">UMUM</option>
                        <option value="GIGI">GIGI</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                <label>Tempat & Tgl Lahir</label>
                <input type="text" name="tempat_tgl_lahir" class="form-control" placeholder="Contoh: BANJARMASIN, 18-08-2000" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Hasil Tes (HIV 1/2)</label> <select name="hasil_tes" class="form-control" required>
                        <option value="Non Reaktif">Non Reaktif</option>
                        <option value="Reaktif">Reaktif</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Asuransi</label>
                    <select name="asuransi" class="form-control" required>
                        <option value="">-- Pilih Asuransi --</option>
                        <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-danger">Simpan Data HIV</button>
        </form>
    </div>
</div>
@endsection