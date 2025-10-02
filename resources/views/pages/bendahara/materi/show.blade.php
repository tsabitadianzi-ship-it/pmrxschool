@extends('layouts.app')

@section('title', 'Detail Materi')

@section('content')
<div class="p-4">
    <h2 class="fw-bold">Detail Materi</h2>

    <div class="border rounded-lg shadow p-6 bg-white">
        <!-- Tanggal -->
        <p class="text-sm text-gray-500 mb-2">
            {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
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
                    <span class="ti ti-download"></span> Download File
                </a>
            </div>
        @else
            <p class="mt-4 text-danger text-500">
                <span class="ti ti-alert-circle"></span> Tidak ada file terlampir</p>
        @endif

        <!-- Tombol kembali -->
    <div class="mt-6">
        <a href="{{ route('bendahara.materi') }}" 
           class="btn btn-sm" style="background-color: #6b7770ff; color: white;">
           <span class="ti ti-arrow-left"></span> Kembali
        </a>
    </div>

    </div>
</div>
@endsection
