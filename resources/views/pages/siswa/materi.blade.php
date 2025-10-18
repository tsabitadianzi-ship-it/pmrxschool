@extends('layouts.app')
@section('title', 'Materi')

@section('content')
<style>
  /* === BASE STYLE === */
  body {
    background-color: #f6fbff;
    min-height: 100vh;
    position: relative;
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
    border: 1px solid rgba(0, 0, 0, 0.04);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    transition: none !important;
    overflow: hidden;
  }

  .card:hover {
    transform: none !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
  }

  /* Header card disesuaikan warna sidebar */
  .card-header {
    background-color: #219EBC;
    color: #ffffff;
    font-weight: 600;
    border-top-left-radius: 16px !important;
    border-top-right-radius: 16px !important;
    box-shadow: 0 2px 8px rgba(33, 158, 188, 0.25);
  }

  .card-body p {
    color: #4a6b74;
  }

  /* === TEXT === */
  h2 {
    color: #2f4f4f;
    font-weight: 700;
  }

  h3 {
    color: #164b5c;
    font-weight: 600;
  }

  /* === BUTTON === */
  .btn-view {
    background-color: #219EBC;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 14px;
    font-weight: 500;
    letter-spacing: 0.3px;
    box-shadow: 0 3px 10px rgba(33, 158, 188, 0.25);
    transition: none !important;
  }

  .btn-view:hover {
    background-color: #197B9B;
    box-shadow: 0 3px 10px rgba(33, 158, 188, 0.25);
  }

  /* === LINK === */
  .download-link {
    color: #219EBC;
    font-weight: 500;
    text-decoration: none;
    transition: 0.2s;
  }

  .download-link:hover {
    color: #176b86;
    text-decoration: underline;
  }

  /* === EMPTY STATE === */
  .text-muted {
    color: #6b7a8b !important;
  }
</style>

<div class="container py-4 fade-in">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-0">Materi Ekskul</h2>
      <p class="text-muted mb-0">Kumpulan materi pembelajaran dan kegiatan PMR 💡</p>
    </div>
  </div>

  <!-- Daftar Materi -->
  @forelse($materi as $m)
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center gap-2">
        <i class="ti ti-notebook"></i> {{ $m->judul }}
      </div>
      <div class="card-body">
        <p class="mb-2 text-muted">
          <i class="ti ti-calendar"></i>
          {{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('l, d F Y') }}
        </p>
        <p>{{ Str::limit($m->isi, 200, '...') }}</p>

        @if($m->file)
          <div class="mb-3">
            <a href="{{ asset('uploads/materi/' . $m->file) }}" target="_blank" class="download-link">
              <i class="ti ti-download"></i> Download File
            </a>
          </div>
        @else
          <p class="text-danger mb-3">
            <i class="ti ti-alert-circle"></i> Tidak ada file terlampir
          </p>
        @endif

        <a href="{{ route('siswa.materi.show', $m->id) }}" class="btn-view">
          <i class="ti ti-eye"></i> Lihat Detail
        </a>
      </div>
    </div>
  @empty
    <div class="text-center text-muted my-5">
      <i class="ti ti-inbox fs-3"></i>
      <p class="mt-2">Belum ada materi.</p>
    </div>
  @endforelse
</div>
@endsection
