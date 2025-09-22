@extends('layouts.app')

@section('title', 'Data Keuangan')

@section('content')
<div class="row">
    <div class="col-md-12">

        <h2> Data Keuangan </h2>
        <a href="{{ route('bendahara.keuangan.create') }}" class="btn btn-primary mb-3">
            <span class="ti ti-plus me-1"></span>
            Tambah 
        </a>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th class="text-end">Jumlah</th>
                        <th class="text-end">Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keuangan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                            <td>
                                @if($item->tipe == 'Pemasukan')
                                    <span class="text-success fw-bold">+ {{ $item->tipe }}</span>
                                @else
                                    <span class="text-danger fw-bold">- {{ $item->tipe }}</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-end">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('bendahara.keuangan.edit', $item->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        <span class="ti ti-pencil"></span>
                                    </a>
                                    <a href="javascript:;" 
                                    class="btn btn-sm btn-danger"
                                    onclick="actionDelete('{{ route('bendahara.keuangan.destroy', $item->id) }}')">
                                        <span class="ti ti-trash"></span>
                                    </a>
                                </div>
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
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
    $(function () {
        $('.dataTable').DataTable({
            language: {
                emptyTable: "Belum ada data keuangan"
            }
        });
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
