@extends('layouts.app')

@section('title', 'Materi')
@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">MATERI</h2>
    <div class="mb-4">
        <a href="{{ route('sekertaris.materi.create') }}" class="btn btn-primary">
            Tambah Materi
        </a>
    </div>

    @forelse($materi as $m)
        <div class="border rounded-lg shadow p-4 mb-4 bg-white">
            <p class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('l, d-m-Y') }}
            </p>
            <h3 class="font-semibold text-lg">{{ $m->judul }}</h3>
            <p class="text-gray-700 mt-2">{{ Str::limit($m->isi, 200, '...') }}</p>

            @if($m->file)
                <div class="flex justify-between items-center mt-3 w-full" >
                    <!-- Tombol Download di kiri -->
                    <a href="{{ asset('uploads/materi/' . $m->file) }}"
                       target="_blank"
                       class="inline-block px-3 py-1 bg-green-500 text-black rounded hover:bg-green-600">
                        📂 Download
                    </a>

                    <!-- Tombol Edit & Hapus di kanan -->
                    <div class="flex gap-2" >
                        <a href="{{ route('sekertaris.materi.edit', $m->id) }}" class="btn btn-sm btn-primary">
                            <span class="ti ti-pencil"></span>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-danger"
                           onclick="actionDelete('{{ route('sekertaris.materi.destroy', $m->id) }}')">
                            <span class="ti ti-trash"></span>
                        </a>
                    </div>
                </div>
            @else
                <span class="text-red-500 mt-3 inline-block">Tidak ada file</span>
            @endif
        </div>
    @empty
        <p class="text-gray-500">Belum ada materi.</p>
    @endforelse
</div>
@endsection
