@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Pengaturan Profil</h1>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{-- Form Utama - Pastikan ada enctype="multipart/form-data" untuk upload file --}}
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Kolom Kiri: Foto Profil --}}
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        {{-- Logika Menampilkan Foto: Jika ada di database tampilkan, jika tidak pakai default --}}
                        <img class="img-profile rounded-circle mb-3"
                            src="{{ Auth::user()->foto ? asset('storage/profile/' . Auth::user()->foto) : asset('img/user.jpeg') }}"
                            style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #4e73df;">

                        <h5 class="font-weight-bold text-primary">{{ Auth::user()->name }}</h5>
                        <p class="badge badge-primary mb-3">{{ ucfirst(Auth::user()->level) }}</p>

                        <div class="form-group text-left">
                            <label class="small font-weight-bold">Ganti Foto Profil</label>
                            <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror">
                            <small class="text-muted">Format: JPG, PNG (Max 2MB)</small>
                            @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Data Akun --}}
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Nama & Password</h6>
                    </div>
                    <div class="card-body">
                        {{-- Edit Nama --}}
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Username (Read Only) --}}
                        <div class="form-group">
                            <label>Email / Username (Tetap)</label>
                            <input type="text" class="form-control bg-light" value="{{ Auth::user()->email ?? Auth::user()->username }}" readonly>
                        </div>

                        <hr class="my-4">
                        <p class="text-primary font-weight-bold">Keamanan Password</p>
                        <small class="text-muted d-block mb-3">* Kosongkan password jika tidak ingin mengubahnya.</small>

                        {{-- Password Baru --}}
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="fas fa-save fa-sm text-white-50 mr-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection