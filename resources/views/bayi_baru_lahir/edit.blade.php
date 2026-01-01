@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Bayi (KN 3)</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('bayi-baru-lahir.update', $bayi->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Pelayanan KN 3</label>
                    <input type="date" name="tanggal_kn3" class="form-control" value="{{ $bayi->tanggal_kn3 }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Bayi</label>
                    <input type="text" name="nama_bayi" class="form-control" value="{{ $bayi->nama_bayi }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $bayi->tanggal_lahir }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>NIK (16 Digit)</label>
                    <input type="text" name="nik" class="form-control" value="{{ $bayi->nik }}" maxlength="16">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Orang Tua</label>
                    <input type="text" name="nama_orang_tua" class="form-control" value="{{ $bayi->nama_orang_tua }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jaminan Kesehatan (PBI)</label>
                    <select name="is_pbi" class="form-control" required>
                        <option value="1" {{ $bayi->is_pbi == 1 ? 'selected' : '' }}>Ya (PBI)</option>
                        <option value="0" {{ $bayi->is_pbi == 0 ? 'selected' : '' }}>Tidak / Umum</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $bayi->alamat }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-info shadow-sm">Update Data Bayi</button>
                <a href="{{ route('bayi-baru-lahir.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection