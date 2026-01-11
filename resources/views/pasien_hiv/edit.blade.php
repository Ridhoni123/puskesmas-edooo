@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data Pasien HIV</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Pasien</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pasien-hiv.update', $hiv->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal Sample</label>
                    <input type="date" name="tanggal_sample" class="form-control" value="{{ $hiv->tanggal_sample }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" value="{{ $hiv->nama_pasien }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control" value="{{ $hiv->nik }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Tempat/Tgl Lahir</label>
                    <input type="text" name="tempat_tgl_lahir" class="form-control" value="{{ $hiv->tempat_tgl_lahir }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki" {{ $hiv->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $hiv->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" value="{{ $hiv->umur }}" required>
                </div>

                <div class="col-md-12 form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required>{{ $hiv->alamat }}</textarea>
                </div>

                <div class="col-md-6 form-group">
                    <label>Ruangan Pengirim</label>
                    <input type="text" name="ruangan_pengirim" class="form-control" value="{{ $hiv->ruangan_pengirim }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Asuransi</label>
                    <select name="asuransi" class="form-control" required>
                        <option value="BPJS" {{ $hiv->asuransi == 'BPJS' ? 'selected' : '' }}>BPJS</option>
                        <option value="Umum" {{ $hiv->asuransi == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label>Hasil Tes</label>
                    <select name="hasil_tes" class="form-control" required>
                        <option value="Non Reaktif" {{ $hiv->hasil_tes == 'Non Reaktif' ? 'selected' : '' }}>Non Reaktif</option>
                        <option value="Reaktif" {{ $hiv->hasil_tes == 'Reaktif' ? 'selected' : '' }}>Reaktif</option>
                    </select>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('pasien-hiv.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection