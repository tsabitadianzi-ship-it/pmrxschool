@extends('layouts.app')

@section('title', 'Detail Materi')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">📖 Detail Materi</h2>

    <div class="border rounded-lg shadow p-6 bg-white">
        <!-- Tanggal -->
        <p class="text-sm text-gray-500 mb-2">
            📅 {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
        </p>

        <!-- Judul -->
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $materi->judul }}</h3>

        <!-- Isi Materi -->
        <div class="text-gray-700 mb-6">
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
            <p class="mt-4 text-danger text-500">⚠ Tidak ada file terlampir</p>
        @endif

        <!-- Tombol kembali -->
    <div class="mt-6">
        <a href="{{ route('sekertaris.materi.index') }}" 
           class="btn btn-danger">
           ⬅ Kembali
        </a>
    </div>

    </div>
</div>
@endsection
