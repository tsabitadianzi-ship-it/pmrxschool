@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<div class="container">
    <h3 class="mb-3">Detail Anggota</h3>
    <div class="card card-body p-0">
        <table class="table table-striped mb-0">
            <tbody>
                <tr>
                    <th width="25%">Nama</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th width="25%">NIS</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->nis_k }}</td>
                </tr>
                <tr>
                    <th width="25%">Tanggal Lahir</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th width="25%">Alamat</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
                <tr>
                    <th width="25%">No Telepon</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->no_telp }}</td>
                </tr>
                <tr>
                    <th width="25%">Kelas</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->kelas }}</td>
                </tr>
                <tr>
                    <th width="25%">Jenis Kelamin</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th width="25%">Alasan Masuk Ekstrakurikuler</th>
                    <th width="10px">:</th>
                    <td>{{ $anggota->alasan }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex gap-2 mt-3">
         <a href="{{ route('pembina.anggota') }}" class="btn btn-sm btn-secondary">
            <span class="ti ti-arrow-left me-1"></span> Kembali
        </a>
        <form action="{{ route('pembina.anggota.terima', $anggota->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-success">
                <span class="ti ti-check me-1"></span> Terima
            </button>
        </form>

        <form action="{{ route('pembina.anggota.tolak', $anggota->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="ti ti-x me-1"></span> Tolak
            </button>
        </form>

    </div>
</div>
@endsection
