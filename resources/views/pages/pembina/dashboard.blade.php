@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container">
    <div class="mb-4">
        <h2>Dashboard</h2>
        
        <!-- Tombol Tambah Pembina -->
        <a href="{{ route('pembina.pembina_tambah') }}" 
           class="btn btn-primary">
            <span class="ti ti-plus me-1"></span> Tambah Pembina
        </a>
        <a href="{{ route('pembina.informasi_tambah') }}" 
           class="btn btn-success">
            <span class="ti ti-plus me-1"></span> Tambah Informasi
        </a>
    </div>

    <div class="card card-body mb-6">
        <h3>Informasi</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Informasi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $i => $info)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $info->kegiatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('pembina.informasi_edit', $info->id) }}" class="btn btn-sm btn-warning">
                                    <span class="ti ti-pencil me-1"></span>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="actionDelete('{{ route('pembina.informasi_destroy', $info->id) }}')">
                                    <span class="ti ti-trash"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada kegiatan terdekat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card card-body mb-6">
        <h3>Pelaksanaan Ekskul</h3>
        <div>
            <h5><span class="ti ti-calendar"></span> Hari : Senin</h5>
            <h5><span class="ti ti-clock"></span> Jam : 15:45</h5>
        </div>
    </div>
    
    <div class="card card-body mb-6">
        <h3>Daftar Pembina</h3>
        <table class="table table-striped">
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

    <div class="card card-body mb-6">
        <h3>Statistik Anggota</h3>
        <table class="table table-striped">
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

@push('scripts')
    <script>
    

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

