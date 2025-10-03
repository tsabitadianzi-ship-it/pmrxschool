@extends('layouts.app')

@section('title', 'Materi')
@section('content')
<div class="p-4">
    <h2 class="fw-bold">Data Materi</h2>
    <div class="mb-4">
        <a href="{{ route('sekertaris.materi.create') }}" class="btn" style="background-color: #d19b4fff; color: white;">
            <span class="ti ti-plus me-1"></span> Tambah
        </a>
    </div>

    @forelse($materi as $m)
        <div class="border rounded-lg shadow p-4 mb-4 bg-white">
            <p>
                {{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('l, d-m-Y') }}
            </p>
            <h3>{{ $m->judul }}</h3>
            <p>{{ Str::limit($m->isi, 200, '...') }}</p>

            @if($m->file)
                <div class="flex mb-3">
                    <a href="{{ asset('uploads/materi/' . $m->file) }}" target="_blank">
                        <span class="ti ti-download"></span> Download
                    </a>
                </div>
            @else
                <p class="mt-4 text-danger text-500">
                    <span class="ti ti-alert-circle"></span> Tidak ada file terlampir</p>
            @endif

            <!-- Tombol Edit & Hapus -->
            <div class="flex gap-2">
                <a href="{{ route('sekertaris.materi.show', $m->id) }}" class="btn btn-sm" style="background-color: #209698ff; color: white;">
                    <span class="ti ti-eye"></span> 
                </a>
                <a href="{{ route('sekertaris.materi.edit', $m->id) }}" class="btn btn-sm" style="background-color: #d18c4fff; color: white;">
                    <span class="ti ti-pencil"></span> 
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #d14f4fff; color: white;"
                        onclick="actionDelete('{{ route('sekertaris.materi.destroy', $m->id) }}')">
                    <span class="ti ti-trash"></span> 
                </button>
            </div>
        </div>
    @empty
        <p>Belum ada materi.</p>
    @endforelse
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    >

    <script>

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
@if (Session::has('success'))
    <script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ Session::get('success') }}',
        background: '#fff7ef', 
        confirmButtonColor: '#4b9669ff' 
    });
    </script>
@endif
@endpush