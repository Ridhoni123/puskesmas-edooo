@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Lengkap Pelayanan Ibu Bersalin</h1>
    <a href="{{ route('ibu-bersalin.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th width="30px">No</th>
                        <th>Nama Ibu</th>
                        <th>NIK</th>
                        <th>Alamat Lengkap</th>
                        <th>Tgl Persalinan</th>
                        <th>Tempat</th>
                        <th>Metode</th>
                        <th>Penolong</th>
                        <th>Kondisi Ibu</th>
                        <th>Kondisi Bayi</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="font-weight-bold">{{ $row->nama_ibu }}</td>
                        <td>{{ $row->nik }}</td>
                        <td class="small">{{ $row->alamat }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal_persalinan)->format('d-m-Y') }}</td>
                        <td>{{ $row->tempat_persalinan }}</td>
                        <td class="text-center">
                            <span class="badge badge-info">{{ $row->metode_persalinan }}</span>
                        </td>
                        <td>{{ $row->penolong_persalinan }}</td>
                        <td class="text-center">{{ $row->kondisi_ibu }}</td>
                        <td class="text-center">{{ $row->kondisi_bayi }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('ibu-bersalin.edit', $row->id) }}" 
                                   class="btn btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('ibu-bersalin.destroy', $row->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus data ibu {{ $row->nama_ibu }}?')">
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
