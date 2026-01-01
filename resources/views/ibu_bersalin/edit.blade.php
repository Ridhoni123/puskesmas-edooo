@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Ibu Bersalin</h1>

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
    <div class="card-body">
        <form action="{{ route('ibu-bersalin.update', $bersalin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $bersalin->nama_ibu }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>NIK (16 Digit)</label>
                    <input type="text" name="nik" class="form-control" value="{{ $bersalin->nik }}" maxlength="16" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Tanggal Persalinan</label>
                    <input type="date" name="tanggal_persalinan" class="form-control" value="{{ $bersalin->tanggal_persalinan }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Metode Persalinan</label>
                    <select name="metode_persalinan" class="form-control" required>
                        <option value="Normal" {{ $bersalin->metode_persalinan == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="SC" {{ $bersalin->metode_persalinan == 'SC' ? 'selected' : '' }}>Sectio Caesarea (SC)</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Tempat Persalinan</label>
                    <select name="tempat_persalinan" class="form-control" required>
                        <option value="Puskesmas" {{ $bersalin->tempat_persalinan == 'Puskesmas' ? 'selected' : '' }}>Puskesmas Gadang Hanyar</option>
                        <option value="Rumah" {{ $bersalin->tempat_persalinan == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                        <option value="RS" {{ $bersalin->tempat_persalinan == 'RS' ? 'selected' : '' }}>Rumah Sakit</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Penolong Persalinan</label>
                    <select name="penolong_persalinan" class="form-control" required>
                        <option value="Bidan" {{ $bersalin->penolong_persalinan == 'Bidan' ? 'selected' : '' }}>Bidan</option>
                        <option value="Dokter" {{ $bersalin->penolong_persalinan == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                        <option value="Tenaga Kesehatan Lain" {{ $bersalin->penolong_persalinan == 'Tenaga Kesehatan Lain' ? 'selected' : '' }}>Nakes Lain</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Kondisi Ibu</label>
                    <select name="kondisi_ibu" class="form-control" required>
                        <option value="Sehat" {{ $bersalin->kondisi_ibu == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                        <option value="Meninggal" {{ $bersalin->kondisi_ibu == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Kondisi Bayi</label>
                    <select name="kondisi_bayi" class="form-control" required>
                        <option value="Lahir Hidup" {{ $bersalin->kondisi_bayi == 'Lahir Hidup' ? 'selected' : '' }}>Lahir Hidup</option>
                        <option value="Lahir Mati" {{ $bersalin->kondisi_bayi == 'Lahir Mati' ? 'selected' : '' }}>Lahir Mati</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="2" required>{{ $bersalin->alamat }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update Data</button>
                <a href="{{ route('ibu-bersalin.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection