@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Data Ibu Bersalin</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pelayanan Ibu Bersalin (Persalinan)</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('ibu-bersalin.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" maxlength="16" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Tanggal Persalinan</label>
                    <input type="date" name="tanggal_persalinan" class="form-control" value="{{ old('tanggal_persalinan') }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Metode Persalinan</label>
                    <select name="metode_persalinan" class="form-control" required>
                        <option value="Normal">Normal</option>
                        <option value="SC">Sectio Caesarea (SC)</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Tempat Persalinan</label>
                    <select name="tempat_persalinan" class="form-control" required>
                        <option value="Puskesmas">Puskesmas Gadang Hanyar</option>
                        <option value="Rumah">Rumah</option>
                        <option value="RS">Rumah Sakit</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Penolong Persalinan</label>
                    <select name="penolong_persalinan" class="form-control" required>
                        <option value="Bidan">Bidan</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Tenaga Kesehatan Lain">Nakes Lain</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Kondisi Ibu</label>
                    <select name="kondisi_ibu" class="form-control" required>
                        <option value="Sehat">Sehat</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Kondisi Bayi</label>
                    <select name="kondisi_bayi" class="form-control" required>
                        <option value="Lahir Hidup">Lahir Hidup</option>
                        <option value="Lahir Mati">Lahir Mati</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat Lengkap" required>{{ old('alamat') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan Data Persalinan</button>
            <a href="{{ route('ibu-bersalin.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection