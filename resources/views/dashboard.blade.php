@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Dashboard Puskesmas</h1>
        <p class="mb-0 text-gray-600">Selamat Datang, <strong>{{ Auth::user()->name }}</strong>! Berikut rangkuman data hari ini.</p>
    </div>
    <div class="d-none d-sm-inline-block">
        <span class="btn btn-sm btn-light shadow-sm">
            <i class="fas fa-calendar-alt fa-sm text-gray-400"></i> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </span>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Rekam Medis</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPasien }} Data</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ibu Hamil (K6)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countHamil }} Pasien</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ibu Bersalin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBersalin }} Pasien</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-baby-carriage fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Bayi (KN3)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBayi }} Bayi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie mr-1"></i> Pemantauan Penyakit Menular</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="text-white-50 small text-uppercase">Pemeriksaan HIV</div>
                                    <div class="h4 font-weight-bold mb-0">{{ $countHiv }} Pasien</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-virus fa-2x text-white-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="text-white-50 small text-uppercase">Terduga TBC</div>
                                    <div class="h4 font-weight-bold mb-0">{{ $countTbc }} Terduga</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-lungs fa-2x text-white-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-rocket mr-1"></i> Akses Cepat Input Data</h6>
            </div>
            <div class="card-body">
                <p>Klik tombol di bawah untuk menambahkan data pasien baru secara cepat.</p>
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{ route('ibu-hamil.create') }}" class="btn btn-success btn-block shadow-sm py-3">
                            <i class="fas fa-female fa-lg mb-2 d-block"></i>
                            + Ibu Hamil
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('ibu-bersalin.create') }}" class="btn btn-info btn-block shadow-sm py-3">
                            <i class="fas fa-baby-carriage fa-lg mb-2 d-block"></i>
                            + Ibu Bersalin
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('pasien-hiv.create') }}" class="btn btn-danger btn-block shadow-sm py-3">
                            <i class="fas fa-virus fa-lg mb-2 d-block"></i>
                            + Pasien HIV
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('terduga-tbc.create') }}" class="btn btn-warning btn-block shadow-sm py-3 text-dark">
                            <i class="fas fa-lungs fa-lg mb-2 d-block"></i>
                            + Terduga TBC
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection