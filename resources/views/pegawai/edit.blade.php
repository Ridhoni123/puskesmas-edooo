@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Pegawai</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('pegawai.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label>Password Baru (Kosongkan jika tidak ingin mengganti)</label>
                <input type="password" name="password" class="form-control" placeholder="***">
            </div>
            <div class="form-group">
                <label>Level Akses</label>
                <select name="level" class="form-control" required>
                    <option value="petugas" {{ $user->level == 'petugas' ? 'selected' : '' }}>Petugas Medis</option>
                    <option value="kepala" {{ $user->level == 'kepala' ? 'selected' : '' }}>Kepala Puskesmas</option>
                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection