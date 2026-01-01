@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Terduga TBC</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Register Terduga TBC (TBC.06)</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('terduga-tbc.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>No. Identitas Sediaan</label> 
                    <input type="text" name="no_sediaan" class="form-control" value="{{ old('no_sediaan') }}" placeholder="Contoh: 25/P6371..." required>
                </div>
                <div class="col-md-4 form-group">
                    <label>No. Rekam Medis</label> 
                    <input type="text" name="no_rm" class="form-control" value="{{ old('no_rm') }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Tanggal Didaftar</label> 
                    <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 form-group">
                    <label>Nama Lengkap Terduga TBC</label> 
                    <input type="text" name="nama_pasien" class="form-control" value="{{ old('nama_pasien') }}" required>
                </div>
                <div class="col-md-5 form-group">
                    <label>NIK (16 Digit)</label> 
                    <input type="text" name="nik" class="form-control" maxlength="16" value="{{ old('nik') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih L/P --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Umur (Tahun)</label> 
                    <input type="number" name="umur" class="form-control" value="{{ old('umur') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label> 
                <textarea name="alamat_lengkap" class="form-control" rows="2" placeholder="Alamat Terduga TBC" required>{{ old('alamat_lengkap') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Hasil Pemeriksaan TCM</label> 
                    <select name="hasil_tcm" class="form-control">
                        <option value="Neg">Negatif</option>
                        <option value="Rif Sen">Rif Sen (Sensitif Rifampisin)</option>
                        <option value="Error">Error / No Result</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Status HIV</label>
                    <select name="status_hiv" class="form-control">
                        <option value="Tidak Diketahui">Tidak Diketahui</option>
                        <option value="Negatif">Negatif</option>
                        <option value="Positif">Positif</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Tindak Lanjut</label> 
                    <select name="tindak_lanjut" class="form-control">
                        <option value="Bukan TBC">Bukan TBC</option>
                        <option value="Akan Diobati/Dirujuk">Akan Diobati/Dirujuk</option>
                    </select>
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-warning shadow-sm">
                <i class="fas fa-save fa-sm text-white-50"></i> Simpan Register TBC
            </button>
            <a href="{{ route('terduga-tbc.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection