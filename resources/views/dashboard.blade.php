@extends('layouts.admin')

@section('content')

{{-- Header --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
            👋 Dashboard Puskesmas
        </h1>
        <p class="mb-0 text-gray-600">
            Selamat datang, <strong>{{ Auth::user()->name }}</strong>.
            Semoga hari Anda produktif!
        </p>
    </div>

    <div class="d-none d-sm-inline-block">
        <span class="btn btn-sm btn-white shadow-sm border">
            <i class="fas fa-calendar-alt text-primary mr-1"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </span>
    </div>
</div>


{{-- Statistik --}}
<div class="row">

    <!-- Total Pasien -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100 stat-card stat-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase text-primary small font-weight-bold mb-1">
                            Total Rekam Medis
                        </div>
                        <h4 class="mb-0 font-weight-bold">
                            {{ $totalPasien }}
                        </h4>
                        <small class="text-muted">Data pasien</small>
                    </div>
                    <div class="icon-circle bg-primary text-white">
                        <i class="fas fa-folder-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ibu Hamil -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100 stat-card stat-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase text-success small font-weight-bold mb-1">
                            Ibu Hamil (K6)
                        </div>
                        <h4 class="mb-0 font-weight-bold">
                            {{ $countHamil }}
                        </h4>
                        <small class="text-muted">Pasien aktif</small>
                    </div>
                    <div class="icon-circle bg-success text-white">
                        <i class="fas fa-female"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bersalin -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100 stat-card stat-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase text-info small font-weight-bold mb-1">
                            Ibu Bersalin
                        </div>
                        <h4 class="mb-0 font-weight-bold">
                            {{ $countBersalin }}
                        </h4>
                        <small class="text-muted">Pasien tercatat</small>
                    </div>
                    <div class="icon-circle bg-info text-white">
                        <i class="fas fa-baby-carriage"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bayi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100 stat-card stat-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase text-warning small font-weight-bold mb-1">
                            Bayi (KN3)
                        </div>
                        <h4 class="mb-0 font-weight-bold">
                            {{ $countBayi }}
                        </h4>
                        <small class="text-muted">Data bayi</small>
                    </div>
                    <div class="icon-circle bg-warning text-white">
                        <i class="fas fa-baby"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


{{-- Content --}}
<div class="row">

    <!-- Penyakit -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0">
                <h6 class="font-weight-bold text-primary mb-0">
                    <i class="fas fa-heartbeat mr-1"></i>
                    Pemantauan Penyakit Menular
                </h6>
            </div>

            <div class="card-body">

                <!-- HIV -->
                <div class="mb-3">
                    <div class="card bg-gradient-danger text-white border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-white-50">Pemeriksaan HIV</small>
                                <h4 class="mb-0 font-weight-bold">
                                    {{ $countHiv }}
                                </h4>
                            </div>
                            <i class="fas fa-virus fa-2x text-white-50"></i>
                        </div>
                    </div>
                </div>

                <!-- TBC -->
                <div>
                    <div class="card bg-gradient-warning text-white border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-white-50">Terduga TBC</small>
                                <h4 class="mb-0 font-weight-bold">
                                    {{ $countTbc }}
                                </h4>
                            </div>
                            <i class="fas fa-lungs fa-2x text-white-50"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Quick Access -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0">
                <h6 class="font-weight-bold text-primary mb-0">
                    <i class="fas fa-bolt mr-1"></i>
                    Akses Cepat Input Data
                </h6>
            </div>

            <div class="card-body">

                <p class="text-muted mb-4">
                    Tambahkan data pasien secara cepat melalui menu berikut.
                </p>

                <div class="row">

                    <div class="col-6 mb-3">
                        <a href="{{ route('ibu-hamil.create') }}"
                           class="btn btn-success btn-block py-3 shadow-sm quick-btn">
                            <i class="fas fa-female fa-lg d-block mb-1"></i>
                            Ibu Hamil
                        </a>
                    </div>

                    <div class="col-6 mb-3">
                        <a href="{{ route('ibu-bersalin.create') }}"
                           class="btn btn-info btn-block py-3 shadow-sm quick-btn">
                            <i class="fas fa-baby-carriage fa-lg d-block mb-1"></i>
                            Ibu Bersalin
                        </a>
                    </div>
                    
<div class="col-6 mb-3">
    <a href="{{ route('bayi-baru-lahir.create') }}"
       class="btn btn-primary btn-block py-3 shadow-sm quick-btn">
        <i class="fas fa-baby fa-lg d-block mb-1"></i>
        Bayi Baru Lahir
    </a>
</div>


                    <div class="col-6 mb-3">
                        <a href="{{ route('pasien-hiv.create') }}"
                           class="btn btn-danger btn-block py-3 shadow-sm quick-btn">
                            <i class="fas fa-virus fa-lg d-block mb-1"></i>
                            Pasien HIV
                        </a>
                    </div>

                    <div class="col-6 mb-3">
                        <a href="{{ route('terduga-tbc.create') }}"
                           class="btn btn-warning btn-block py-3 shadow-sm text-dark quick-btn">
                            <i class="fas fa-lungs fa-lg d-block mb-1"></i>
                            Terduga TBC
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection


{{-- Custom Style --}}
@push('styles')
<style>

.stat-card {
    transition: 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.12);
}

.icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.quick-btn {
    transition: 0.25s;
    border-radius: 12px;
}

.quick-btn:hover {
    transform: scale(1.05);
}

.bg-gradient-danger {
    background: linear-gradient(135deg,#e74a3b,#be2617);
}

.bg-gradient-warning {
    background: linear-gradient(135deg,#f6c23e,#dda20a);
}

</style>
@endpush
