@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Pasien HIV</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('pasien-hiv.update', $hiv->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" value="{{ $hiv->nama_pasien }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Hasil Tes</label>
                    <select name="hasil_tes" class="form-control">
                        <option value="Non Reaktif" {{ $hiv->hasil_tes == 'Non Reaktif' ? 'selected' : '' }}>Non Reaktif</option>
                        <option value="Reaktif" {{ $hiv->hasil_tes == 'Reaktif' ? 'selected' : '' }}>Reaktif</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Update Data</button>
        </form>
    </div>
</div>
@endsection