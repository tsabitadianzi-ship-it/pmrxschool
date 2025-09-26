@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
    </div>

    <!-- Informasi -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">INFORMASI KEGIATAN</div>
        <div class="card-body">
            @forelse($informasi as $info)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <h6 class="mb-1">{{ $info->kegiatan }}</h6>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
                        </small>
                    </div>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada informasi</p>
            @endforelse
        </div>
    </div>

    <div class="row">
    <!-- Daftar Pembina -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">DAFTAR PEMBINA</div>
            <div class="card-body">
                @forelse($pembina as $p)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <h6 class="mb-1">{{ $p->nama_lengkap }}</h6>
                            <small class="text-muted">{{ $p->no_telp ?? '-' }}</small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mb-0">Belum ada pembina</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Pelaksanaan Ekskul -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">PELAKSANAAN EKSKUL</div>
            <div class="card-body">
                @foreach($pelaksanaan as $item)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-calendar"></i> {{ $item->hari }}</span>
                            <span><i class="ti ti-clock"></i> 
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam)->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    
@endsection