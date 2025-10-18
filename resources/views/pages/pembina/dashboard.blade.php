@extends('layouts.app')
@section('title', 'Dashboard Pembina')

@section('content')
<style>
  /* === BASE === */
  body {
    background-color: #F8FBFD;
    min-height: 100vh;
  }

  .fade-in {
    animation: fadeIn 0.8s ease;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* === CARD === */
  .card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid rgba(0,0,0,0.05);
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
  }

  .card-header {
    background-color: #219EBC;
    color: #fff;
    font-weight: 600;
    border-top-left-radius: 16px !important;
    border-top-right-radius: 16px !important;
  }

  /* === STATISTICS === */
  .stat-card {
    background-color: #D0F0FA;
    border-radius: 14px;
    padding: 1rem;
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

  /* === BUTTONS === */
  .btn-main {
    background-color: #219EBC;
    color: white;
    border: none;
    border-radius: 8px;
    transition: 0.2s ease;
  }
  .btn-main:hover {
    background-color: #197B9B;
  }

  .btn-warning-custom {
    background-color: #d18c4fff;
    color: white;
  }
  .btn-danger-custom {
    background-color: #d14f4fff;
    color: white;
  }

  /* === MISC === */
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
  <!-- HEADER -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-0">Dashboard Pembina</h2>
      <p class="text-muted mb-0">Selamat datang kembali 👋 Semoga harimu menyenangkan!</p>
    </div>
    <div>
      <a href="{{ route('pembina.pembina.create') }}" class="btn btn-main me-2" style="padding: 10px 20px; font-size: 1rem;">
    <i class="ti ti-plus me-1"></i> Tambah Pembina
    </a>
    <a href="{{ route('pembina.informasi.create') }}" class="btn btn-main" style="padding: 10px 20px; font-size: 1rem;">
    <i class="ti ti-plus me-1"></i> Tambah Informasi
    </a>

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

  <!-- INFORMASI KEGIATAN -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div><i class="ti ti-info-circle me-2"></i>INFORMASI KEGIATAN</div>
    </div>
    <div class="card-body">
      @forelse($informasi as $info)
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
          <div>
            <h6 class="mb-1 fw-semibold"><i class="ti ti-bell me-2 text-primary"></i>{{ $info->kegiatan }}</h6>
            <small class="text-muted">
              <i class="ti ti-calendar me-1"></i>
              {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
            </small>
          </div>
          <div class="d-inline-flex gap-1">
            <a href="{{ route('pembina.informasi.edit', $info->id) }}" class="btn btn-sm btn-warning-custom">
              <i class="ti ti-pencil"></i>
            </a>
            <a href="javascript:;" class="btn btn-sm btn-danger-custom"
              onclick="actionDelete('{{ route('pembina.informasi.destroy', $info->id) }}')">
              <i class="ti ti-trash"></i>
            </a>
          </div>
        </div>
      @empty
        <p class="text-center text-muted my-3">
          <i class="ti ti-inbox me-1"></i> Belum ada informasi kegiatan
        </p>
      @endforelse
    </div>
  </div>

  <!-- PEMBINA & PELAKSANAAN -->
  <div class="row g-3">
    <!-- DAFTAR PEMBINA -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header"><i class="ti ti-users me-2"></i>DAFTAR PEMBINA</div>
        <div class="card-body">
          @forelse($pembina as $p)
            <div class="d-flex align-items-center border-bottom py-2">
              <div class="avatar-circle me-3">{{ strtoupper(substr($p->nama_lengkap, 0, 1)) }}</div>
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

    <!-- PELAKSANAAN EKSKUL -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header"><i class="ti ti-calendar-time me-2"></i>PELAKSANAAN EKSKUL</div>
        <div class="card-body">
          @forelse($pelaksanaan as $item)
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
              <div>
                <i class="ti ti-calendar me-1"></i>{{ $item->hari }}
              </div>
              <div class="d-inline-flex align-items-center gap-2">
                <span><i class="ti ti-clock me-1"></i>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam)->format('H:i') }}</span>
                <a href="{{ route('pembina.pelaksanaan_edit', $item->id) }}" class="btn btn-sm btn-warning-custom">
                  <i class="ti ti-pencil"></i>
                </a>
              </div>
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

<!-- FORM DELETE -->
<form id="form-delete" action="" method="POST" class="d-none">
  @csrf
  @method('DELETE')
</form>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function actionDelete(url){
  Swal.fire({
    title: "Apakah kamu yakin?",
    text: "Data yang dihapus tidak bisa dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
    confirmButtonColor: "#219EBC"
  }).then((result) => {
    if (result.isConfirmed) {
      $('#form-delete').attr('action', url);
      $('#form-delete').submit();
    }
  });
}
</script>
@if (Session::has('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{{ Session::get('success') }}',
  background: '#ffffff',
  confirmButtonColor: '#219EBC'
});
</script>
@endif
@endpush
@endsection
