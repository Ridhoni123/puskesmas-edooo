@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Terduga TBC</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('terduga-tbc.update', $tbc->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>No. Rekam Medis</label>
                    <input type="text" name="no_rm" class="form-control" value="{{ $tbc->no_rm }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" value="{{ $tbc->nama_pasien }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Hasil TCM</label>
                    <input type="text" name="hasil_tcm" class="form-control" value="{{ $tbc->hasil_tcm }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" class="form-control" value="{{ $tbc->tindak_lanjut }}">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update Data</button>
        </form>
    </div>
</div>
@endsection