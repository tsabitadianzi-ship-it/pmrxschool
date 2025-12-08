@extends('layouts.app')
@section('title', 'Dashboard Pembina')

@section('content')
<style>
  body {
    background-color: #F8FBFD;
    min-height: 100vh;
  }

  .card {
    background: #FFFFFF;
    border-radius: 16px;
  }

  .card-header {
    background-color: #219EBC;
    color: #ffffff;
    font-weight: 600;
    border-top-left-radius: 16px !important;
    border-top-right-radius: 16px !important;
  }


  .stat-card {
    background-color: #D0F0FA;
    border-radius: 14px;
    padding: 1.2rem;
    text-align: center;
  }

  .stat-card h6 {
    color: #287C96;
    font-weight: 500;
  }

  .stat-card h4 {
    color: #125366;
    font-weight: 700;
    margin-top: 4px;
  }

  .avatar-circle {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background-color: #E1F6FA;
    color: #219EBC;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
  }

  h2 {
    color: #2f4f4f;
    font-weight: 700;
  }

</style>

<div class="container py-4 fade-in">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-0">Dashboard Sekertaris</h2>
      <p class="text-muted mb-0">Selamat datang kembali! Semoga harimu menyenangkan</p>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0" style="background-color: #fff;">
            <div class="card-body">
                <h5 class="fw-semibold">Jumlah Pembina</h5>
                <p class="fs-3 fw-bold" style="color: #f4a261;">{{ $pembina->count() }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0" style="background-color: #fff;">
            <div class="card-body">
                <h5 class="fw-semibold">Total Anggota</h5>
                <p class="fs-3 fw-bold" style="color: #f4a261;">{{ $jumlahAnggota }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0" style="background-color: #fff;">
            <div class="card-body">
                <h5 class="fw-semibold">Jumlah Kegiatan</h5>
                <p class="fs-3 fw-bold" style="color: #f4a261;">{{ $informasi->count() }}</p>
            </div>
        </div>
    </div>
  </div>

  @php
      $notifications = auth()->user()->unreadNotifications;
  @endphp
  @if($notifications->count() > 0)
  <div class="alert alert-info mb-3">
      <h6><i class="ti ti-bell me-2 text-primary"></i> Notifikasi Baru</h6>
      <ul class="mb-0">
          @foreach($notifications as $notif)
              <li>
                  <strong>{{ $notif->data['title'] ?? '' }}</strong> - {{ $notif->data['kegiatan'] ?? '' }}
                  ({{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }})
              </li>
          @endforeach
      </ul>
  </div>
  @endif
  @php
      auth()->user()->unreadNotifications->markAsRead();
  @endphp

  <div class="card mb-4 shadow-sm">
    <div class="card-header d-flex align-items-center gap-2">
      <i class="ti ti-info-circle"></i> INFORMASI KEGIATAN
    </div>
    <div class="card-body">
      @forelse($informasi as $info)
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
          <div>
            <h6 class="mb-1 fw-semibold">
              <i class="ti ti-bell me-2 text-primary"></i>{{ $info->kegiatan }}
            </h6>
            <small class="text-muted">
              <i class="ti ti-calendar me-1"></i>
              {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
            </small>
          </div>
        </div>
      @empty
        <p class="text-center text-muted my-3">
          <i class="ti ti-inbox me-1"></i> Belum ada informasi kegiatan
        </p>
      @endforelse
    </div>
  </div>

  <div class="row g-3">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center gap-2">
          <i class="ti ti-users"></i> DAFTAR PEMBINA
        </div>
        <div class="card-body">
          @forelse($pembina as $p)
            <div class="d-flex align-items-center border-bottom py-2">
              <div class="avatar-circle me-3">
                {{ strtoupper(substr($p->nama_lengkap, 0, 1)) }}
              </div>
              <div>
                <h6 class="mb-0">{{ $p->nama_lengkap }}</h6>
                <small class="text-muted">{{ $p->no_telp ?? '-' }}</small>
              </div>
            </div>
          @empty
            <p class="text-center text-muted my-3">
              <i class="ti ti-inbox me-1"></i> Belum ada pembina
            </p>
          @endforelse
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center gap-2">
          <i class="ti ti-calendar-time"></i> PELAKSANAAN EKSKUL
        </div>
        <div class="card-body">
          @forelse($pelaksanaan as $item)
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
              <span><i class="ti ti-calendar"></i> {{ $item->hari }}</span>
              <span><i class="ti ti-clock"></i>
                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam)->format('H:i') }}
              </span>
            </div>
          @empty
            <p class="text-center text-muted my-2">
              <i class="ti ti-inbox me-1"></i> Belum ada jadwal pelaksanaan
            </p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
<script>
  const latest = @json(auth()->user()->unreadNotifications->first()->data);
  Swal.fire({
    title: '📢 Informasi Baru!',
    html: `<strong>${latest.kegiatan}</strong><br>
           <small>${new Date(latest.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</small>`,
    icon: 'info',
    confirmButtonColor: '#219EBC'
  });
</script>
@endpush
@endif