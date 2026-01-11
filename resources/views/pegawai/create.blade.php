@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Pegawai Baru</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email (Untuk Login)</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Level Akses</label>
                <select name="level" class="form-control" required>
                    <option value="petugas">Petugas Medis</option>
                    <option value="kepala">Kepala Puskesmas</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection