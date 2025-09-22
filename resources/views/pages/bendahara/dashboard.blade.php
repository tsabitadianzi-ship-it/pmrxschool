@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container">
    <h2>Dashboard</h2>
    <div class="card card-body mb-6">
        <h3>Informasi</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Informasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $i => $info)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $info->kegiatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada kegiatan terdekat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card card-body mb-6">
        <h3>Pelaksanaan Ekskul</h3>
        <div>
            <h5><span class="ti ti-calendar"></span> Hari : Senin</h5>
            <h5><span class="ti ti-clock"></span> Jam : 15:45</h5>
        </div>
    </div>
    
    <div class="card card-body mb-6">
        <h3>Daftar Pembina</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembina as $i => $p)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $p->nama_lengkap }}</td>
                        <td>{{ $p->no_telp ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card card-body mb-6">
        <h3>Statistik Anggota</h3>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th width="25%">Jumlah Anggota</th>
                    <th width="10px">:</th>
                    <td>{{ $jumlahAnggota }}</td>
                </tr>
                <tr>
                    <th width="25%">Aktif</th>
                    <th width="10px">:</th>
                    <td>{{ $anggotaAktif }}</td>
                </tr>
                <tr>
                    <th width="25%">Pending</th>
                    <th width="10px">:</th>
                    <td>{{ $anggotaPending }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

