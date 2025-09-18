@extends('layouts.app')
@section('title', 'Manajemen Anggota')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Konfirmasi Anggota -->
        <h2>Konfirmasi Anggota</h2>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggotaKonfirmasi as $i => $anggota)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $anggota->nama_lengkap }}</td>
                        <td>{{ $anggota->nis_k }}</td>
                        <td>{{ $anggota->kelas }}</td>
                        <td>{{ $anggota->status }}</td>
                        <td>
                            <a href="{{ route('pembina.anggota_detail', $anggota->id) }}" class="btn btn-sm btn-primary">
                                <span class="ti ti-eye me-1"></span> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Anggota Aktif -->
        <h2>Anggota Aktif</h2>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jabatan</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggotaAktif as $i => $item)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->nis_k }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('pembina.anggota_edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <span class="ti ti-pencil me-1"></span> 
                            </a>
                            <button type="button" class="btn btn-sm btn-danger"
                              onclick="actionDelete('{{ route('pembina.anggota.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span> 
                            </button>
                            </form>
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
