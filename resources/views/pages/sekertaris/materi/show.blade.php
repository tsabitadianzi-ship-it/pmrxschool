@extends('layouts.app')
@section('title', 'Detail Materi')
@section('content')
<div class="p-4">
    <h2>Detail Materi</h2>

    <div class="border rounded-lg shadow p-6 bg-white">
        <!-- Tanggal -->
        <p>
            {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
        </p>

        <!-- Judul -->
        <h3>{{ $materi->judul }}</h3>

        <!-- Isi Materi -->
        <div>
            {!! nl2br(e($materi->isi)) !!}
        </div>

        <!-- File -->
        @if($materi->file)
            <div class="mt-4">
                <a href="{{ asset('uploads/materi/' . $materi->file) }}" 
                   target="_blank">
                    📂 Download File
                </a>
            </div>
        @else
            <p class="mt-4 text-danger text-500">
                <span class="ti ti-alert-circle"></span> Tidak ada file terlampir</p>
        @endif

        <!-- Tombol kembali -->
    <div class="mt-6">
        <a href="{{ route('sekertaris.materi.index') }}" 
           class="btn btn-sm" style="background-color: #6b7770ff; color: white;">
            <span class="ti ti-arrow-left me-1"></span> Kembali
        </a>
    </div>
    </div>
</div>
@endsection
