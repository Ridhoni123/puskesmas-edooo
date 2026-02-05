@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Ibu Hamil</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('ibu-hamil.update', $hamil->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Pemeriksaan K6</label>
                    <input type="date" name="tanggal_k6" class="form-control" value="{{ $hamil->tanggal_k6 }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Ibu Hamil</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $hamil->nama_ibu }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Lahir Ibu</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $hamil->tanggal_lahir }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $hamil->nik }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Suami</label>
                    <input type="text" name="nama_suami" class="form-control" value="{{ $hamil->nama_suami }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jaminan Kesehatan (PBI)</label>
                    <select name="is_pbi" class="form-control" required>
                        <option value="1" {{ $hamil->is_pbi == 1 ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ $hamil->is_pbi == 0 ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>No. HP / WhatsApp</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $hamil->no_hp }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ $hamil->keterangan }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" required>{{ $hamil->alamat }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>
@endsection