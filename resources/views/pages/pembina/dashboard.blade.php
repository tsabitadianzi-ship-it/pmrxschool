@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <div>
            <a href="{{ route('pembina.pembina.create') }}" class="btn btn-primary me-2">
                <span class="ti ti-plus me-1"></span> Tambah Pembina
            </a>
            <a href="{{ route('pembina.informasi.create') }}" class="btn btn-success">
                <span class="ti ti-plus me-1"></span> Tambah Informasi
            </a>
        </div>
    </div>

    <!-- Informasi -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">INFORMASI KEGIATAN</div>
        <div class="card-body">
            @forelse($informasi as $info)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <h6 class="mb-1">{{ $info->kegiatan }}</h6>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
                        </small>
                    </div>
                    <div class="d-inline-flex gap-1">
                        <a href="{{ route('pembina.informasi.edit', $info->id) }}" class="btn btn-sm btn-warning">
                            <i class="ti ti-pencil"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-danger"
                           onclick="actionDelete('{{ route('pembina.informasi.destroy', $info->id) }}')">
                            <i class="ti ti-trash"></i>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada informasi</p>
            @endforelse
        </div>
    </div>

    <div class="row">
        <!-- Pelaksanaan Ekskul -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">PELAKSANAAN EKSKUL</div>
                <div class="card-body">
                    @foreach($pelaksanaan as $item)
                        <div class="d-flex justify-content-between  border-bottom py-3">
                            <div class="d-flex align-items-center gap-3">
                                <span><i class="ti ti-calendar"></i> {{ $item->hari }}</span>
                                <span><i class="ti ti-clock"></i> {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam)->format('H:i') }}
                                </span>
                            </div>
                            <a href="{{ route('pembina.pelaksanaan_edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="ti ti-pencil"></i> Edit
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Statistik Anggota -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">STATISTIK ANGGOTA</div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="fw-bold">{{ $jumlahAnggota }}</h4>
                            <small class="text-muted">Jumlah</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-success">{{ $anggotaAktif }}</h4>
                            <small class="text-muted">Aktif</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-danger">{{ $anggotaPending }}</h4>
                            <small class="text-muted">Pending</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Pembina -->
     <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header fw-bold">DAFTAR PEMBINA</div>
                    <div class="card-body">
                        @forelse($pembina as $p)
                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                <div>
                                    <h6 class="mb-1">{{ $p->nama_lengkap }}</h6>
                                    <small class="text-muted">{{ $p->no_telp ?? '-' }}</small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">Belum ada pembina</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
