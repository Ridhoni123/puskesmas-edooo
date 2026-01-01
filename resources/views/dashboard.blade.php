@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Puskesmas Gadang Hanyar</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Ibu Hamil (K6)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countHamil }} Pasien</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Ibu Bersalin</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBersalin }} Pasien</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Bayi (KN3)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBayi }} Bayi</div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pemeriksaan HIV</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countHiv }} Pasien</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Terduga TBC</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countTbc }} Terduga</div>
            </div>
        </div>
    </div>
</div>
@endsection