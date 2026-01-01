@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Data Ibu Hamil</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pelayanan K6</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('ibu-hamil.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Pemeriksaan K6</label>
                    <input type="date" name="tanggal_k6" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Ibu Hamil</label>
                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Lengkap" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>NIK (16 Digit)</label>
                    <input type="text" name="nik" class="form-control" maxlength="16" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Tanggal Lahir Ibu</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Suami</label>
                    <input type="text" name="nama_suami" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jaminan Kesehatan (PBI)</label>
                    <select name="is_pbi" class="form-control" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Contoh: Ais. Nasution Rt. 05"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Laporan</button>
            <a href="{{ route('ibu-hamil.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection