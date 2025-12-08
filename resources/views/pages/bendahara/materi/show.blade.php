@extends('layouts.app-no-sidebar')

@section('tittle', 'Detail Materi')

@push('styles')
<style>
  body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      font-family: "Public Sans", sans-serif;
  }

  .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px);
      padding: 30px 10px;
  }

  .card-detail {
      width: 100%;
      max-width: 900px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 18px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.12);
      padding: 2rem;
      animation: fadeIn 0.6s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
@endpush

@section('content')
<div class="main-area">
  <div class="card-detail">

    <h3 class="text-center mb-3">{{ $materi->judul }}</h3>

    <p class="text-center mb-4 text-muted">
      🗓 {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
    </p>

    <div class="mb-4">{!! nl2br(e($materi->isi)) !!}</div>

    @if($materi->file)
      <div class="text-center mt-3">
        <a href="{{ asset('uploads/materi/' . $materi->file) }}" target="_blank" class="btn btn-outline-info">
          <i class="ti ti-download"></i> Download File
        </a>
      </div>
    @else
      <p class="text-center text-danger">
        <i class="ti ti-alert-circle"></i> Tidak ada file terlampir
      </p>
    @endif

    <div class="text-center mt-4">
      <a href="{{ route('bendahara.materi') }}" class="btn btn-danger">
        <i class="ti ti-arrow-left"></i> Kembali
      </a>
    </div>

  </div>
</div>
@endsection
