@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Pemeriksaan HIV</h1>
    <a href="{{ route('pasien-hiv.create') }}" class="btn btn-danger btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pasien
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Tgl Sample</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
                        <th>JK</th>
                        <th>Umur</th>
                        <th>Hasil</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_sample)->format('d-m-Y') }}</td>
                        <td>{{ $row->nama_pasien }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->umur }} Thn</td>
                        <td>
                            <span class="badge {{ $row->hasil_tes == 'Reaktif' ? 'badge-danger' : 'badge-success' }}">
                                {{ $row->hasil_tes }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('pasien-hiv.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('pasien-hiv.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus data pasien {{ $row->nama_pasien }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection