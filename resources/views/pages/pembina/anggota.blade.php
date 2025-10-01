@extends('layouts.app')
@section('title', 'Manajemen Anggota')
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <!-- Konfirmasi Anggota -->
        <h3 class="fw-bold">Konfirmasi Anggota</h3>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
                            <a href="{{ route('pembina.anggota_detail', $anggota->id) }}" class="btn btn-sm" style="background-color: #209698ff; color: white">
                                <span class="ti ti-eye me-1"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Anggota Aktif -->
        <h3 class="fw-bold mt-4">Anggota Aktif</h3>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
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
                            <a href="{{ route('pembina.anggota_edit', $item->id) }}" class="btn btn-sm" style="background-color: #d18c4fff; color:white;">
                                <span class="ti ti-pencil me-1"></span> 
                            </a>
                            <button type="button" class="btn btn-sm" style="background-color: #d14f4fff; color: white;"
                              onclick="actionDelete('{{ route('pembina.anggota.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span> 
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pembina -->
        <h2 class="mt-4">Pembina</h2>
        <div class="row">
            @foreach($pembina as $i => $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=209698ff&color=fff&size=100"
                                alt="{{ $item->nama_lengkap }}" 
                                class="rounded-circle shadow">
                        </div>
                        <h5>{{ $item->nama_lengkap }}</h5>
                        <p class="small">NIP: {{ $item->nis_k }}</p>
                        <p><span class="ti ti-phone"></span> {{ $item->no_telp }}</p>
                        <p><span class="ti ti-user"></span> {{ $item->jenis_kelamin }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('pembina.pembina.edit', $item->id) }}" class="btn btn-sm" style="background-color: #d18c4fff; color:white;">
                                <span class="ti ti-pencil"></span> Edit
                            </a>
                            <button type="button" class="btn btn-sm" style="background-color: #d14f4fff; color: white;"
                                onclick="actionDelete('{{ route('pembina.pembina.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
