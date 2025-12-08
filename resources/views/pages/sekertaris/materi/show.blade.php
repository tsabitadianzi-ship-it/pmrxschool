@extends('layouts.app-no-sidebar')

@section('title', 'Detail Materi')

@section('content')
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
}
.main-area {
    display: flex;
    justify-content: center;
}
.card-detail {
    width: 100%;
    max-width: 960px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 18px;
    padding: 2.5rem;
}

h3 { color: #219EBC; font-weight: 700; }
p { color: #3b5358; line-height: 1.7; }
.download-link {
    color: #219EBC;
    font-weight: 500;}
.download-link:hover {
    color: #176b86;
}
.btn-back {
    background-color: #219EBC;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 500;
}
.btn-back:hover {
    background-color: #197b9b;
}
</style>
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
                <a href="{{ asset('uploads/materi/' . $materi->file) }}" 
                   target="_blank" class="download-link">
                    <i class="ti ti-download"></i> Download File
                </a>
            </div>
        @else
            <p class="mt-4 text-center text-danger">
                <i class="ti ti-alert-circle"></i> Tidak ada file terlampir
            </p>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-sm btn-back">
                <i class="ti ti-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection


@push('styles')
@endpush
