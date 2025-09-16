@extends('layouts.app')

@section('title', 'Materi')
@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">MATERI</h2>

    @forelse($materi as $m)
        <div class="border rounded-lg shadow p-4 mb-4 bg-white">
            <p class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('l, d-m-Y') }}
            </p>
            <h3 class="font-semibold text-lg">{{ $m->judul }}</h3>
            <p class="text-gray-700 mt-2">{{ Str::limit($m->isi, 200, '...') }}</p>

            @if($m->file)
                <div class="flex mb-3">
                    <a href="{{ asset('uploads/materi/' . $m->file) }}" target="_blank">
                        📂 Download
                    </a>
                </div>
            @else
                <p class="mt-4 text-danger text-500">⚠ Tidak ada file terlampir</p>
            @endif

            <!-- Khusus pembina: hanya bisa lihat detail -->
            <div class="flex gap-2">
                <a href="{{ route('siswa.materi.show', $m->id) }}" class="btn btn-sm btn-info">
                    <span class="ti ti-eye"></span> Lihat Detail
                </a>
                
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada materi.</p>
    @endforelse
</div>
@endsection
