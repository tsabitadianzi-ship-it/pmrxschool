@extends('layouts.app')
@section('title', 'Jurnal Sekertaris')
@section('content')

<div class="row">
    <h2 class="fw-bold"> Data Jurnal</h2>
    <div class="mb-4">
        <a href="{{ route('sekertaris.jurnal.create') }}" class="btn" style="background-color: #d19b4fff; color: white;">
            <span class="ti ti-plus me-1"></span> Tambah</a>
    </div>
    <div class="col-md-12">
        <div class="card card-body">
         <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurnal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                        <td>
                         <a href="{{ route('sekertaris.jurnal.edit', $item->id) }}" class="btn btn-sm" style="background-color: #d18c4fff; color: white;">
                             <span class="ti ti-pencil me-1"></span>
                        </a>
                         <a href="javascript:;" 
                            class="btn btn-sm" style="background-color: #d14f4fff; color: white;"
                            onclick="actionDelete('{{ route('sekertaris.jurnal.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span>
                        </a>
                         </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    <script>
    $(function () {
        $('.dataTable').DataTable();
    });

    function actionDelete(url){
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
            showConfirmButten: false,        
            timer: 3000
        });
        </script>
    @endif
@endpush
