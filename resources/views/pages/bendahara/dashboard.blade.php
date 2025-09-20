@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>

    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Informasi</h2>
        <table class="table table-striped dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Informasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $i => $info)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $info->kegiatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500">Belum ada kegiatan terdekat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold mb-4">Pelaksanaan Ekskul</h2>
        <div class="space-y-2 text-gray-600">
            <h5><span class="ti ti-calendar"></span> Hari : Senin</h5>
            <h5><span class="ti ti-clock"></span> Jam : 15:45</h5>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Daftar Pembina</h2>
        <table class="table table-striped dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembina as $i => $p)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $p->nama_lengkap }}</td>
                        <td>{{ $p->no_telp ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Statistik Anggota</h2>
        <table class="table table-striped w-full">
            <tbody>
                <tr>
                    <th width="25%">Jumlah Anggota</th>
                    <th width="10px">:</th>
                    <td>{{ $jumlahAnggota }}</td>
                </tr>
                <tr>
                    <th width="25%">Aktif</th>
                    <th width="10px">:</th>
                    <td>{{ $anggotaAktif }}</td>
                </tr>
                <tr>
                    <th width="25%">Pending</th>
                    <th width="10px">:</th>
                    <td>{{ $anggotaPending }}</td>
                </tr>
            </tbody>
        </table>
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

