@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <div>
            <a href="{{ route('pembina.pembina_tambah') }}" class="btn btn-primary me-2">
                <span class="ti ti-plus me-1"></span> Tambah Pembina
            </a>
            <a href="{{ route('pembina.informasi.create') }}" class="btn btn-success">
                <span class="ti ti-plus me-1"></span> Tambah Informasi
            </a>
        </div>
    </div>

    <!-- Informasi -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">
            INFORMASI KEGIATAN
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Informasi</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($informasi as $i => $info)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $info->kegiatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('pembina.informasi.edit', $info->id) }}" 
                                        class="btn btn-sm btn-warning">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="actionDelete('{{ route('pembina.informasi.destroy', $info->id) }}')">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada informasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pelaksanaan Ekskul -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">
            PELAKSANAAN EKSKUL
        </div>
        <div class="card-body">
            @foreach($pelaksanaan as $item)
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <i class="ti ti-calendar"></i> {{ $item->hari }} <br>
                        <i class="ti ti-clock"></i> 
                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam)->format('H:i') }}
                    </div>
                    <div>
                        <a href="{{ route('pembina.pelaksanaan_edit', $item->id) }}" 
                        class="btn btn-sm btn-warning">
                            <i class="ti ti-pencil"></i> Edit
                        </a>
                    </div>
                </div>
            @endforeach        
        </div>
    </div>


    <!-- Daftar Pembina -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">
            DAFTAR PEMBINA
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
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
        </div>
    </div>

    <!-- Statistik Anggota -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">
            STATISTIK ANGGOTA
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <h4 class="fw-bold">{{ $jumlahAnggota }}</h4>
                    <small class="text-muted">Jumlah Anggota</small>
                </div>
                <div class="col-md-4 mb-3">
                    <h4 class="fw-bold text-success">{{ $anggotaAktif }}</h4>
                    <small class="text-muted">Aktif</small>
                </div>
                <div class="col-md-4 mb-3">
                    <h4 class="fw-bold text-danger">{{ $anggotaPending }}</h4>
                    <small class="text-muted">Pending</small>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection