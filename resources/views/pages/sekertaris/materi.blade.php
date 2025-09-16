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
                <div class="flex mb-3">
                    <a href="{{ asset('uploads/materi/' . $m->file) }}" target="_blank">
                        📂 Download
                    </a>
                </div>
            @else
                <p class="mt-4 text-danger text-500">⚠ Tidak ada file terlampir</p>
            @endif

            <!-- Tombol Edit & Hapus -->
            <div class="flex gap-2">
                <a href="{{ route('sekertaris.materi.show', $m->id) }}" class="btn btn-sm btn-info">
                    <span class="ti ti-eye"></span> Lihat Detail
                </a>
                <a href="{{ route('sekertaris.materi.edit', $m->id) }}" class="btn btn-sm btn-primary">
                    <span class="ti ti-pencil"></span> Edit
                </a>
                <button type="button" class="btn btn-sm btn-danger"
                        onclick="actionDelete('{{ route('sekertaris.materi.destroy', $m->id) }}')">
                    <span class="ti ti-trash"></span> Hapus
                </button>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada materi.</p>
    @endforelse
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
    $(function () {
        $('.dataTable').DataTable();
    });

    function actionDelete(url){
        console.log("Delete URL:", url); // Debug
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete').attr('action', url);
                $('#form-delete').submit();
            }
        });
    }
    </script>
@endpush
