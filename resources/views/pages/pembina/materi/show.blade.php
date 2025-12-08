@extends('layouts.app-no-sidebar')

@section('title', 'Detail Materi')

@section('content')
<div class="main-area">
    <div class="card-detail">
        <h3 class="text-center mb-3">{{ $materi->judul }}</h3>

        <p class="text-center mb-4">
            <i class="ti ti-calendar"></i>
            {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
        </p>

        <div>{!! nl2br(e($materi->isi)) !!}</div>

        @if($materi->file)
            <div class="text-center mt-4">
                <a href="{{ asset('uploads/materi/' . $materi->file) }}" target="_blank" class="download-link">
                    <i class="ti ti-download"></i> Download File
                </a>
            </div>
        @else
            <p class="mt-4 text-center text-danger">
                <i class="ti ti-alert-circle"></i> Tidak ada file terlampir
            </p>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('pembina.materi') }}" class="btn btn-back">
                <i class="ti ti-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    min-height: 100vh;
    font-family: "Public Sans", sans-serif;
    overflow-x: hidden;
}

.main-area {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 50px 20px;
}

.card-detail {
    width: 100%;
    max-width: 960px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    border-radius: 18px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    padding: 2.5rem;
    animation: fadeIn 0.6s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

h3 { color: #219EBC; font-weight: 600; }
p { color: #3b5358; line-height: 1.7; }

.download-link {
    color: #219EBC;
    font-weight: 500;
    transition: 0.2s;
}
.download-link:hover {
    color: #176b86;
    text-decoration: underline;
}

.btn-back {
    background-color: #219EBC;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.25s ease;
}
.btn-back:hover {
    background-color: #197b9b;
    transform: translateY(-2px);
}
</style>
@endpush
