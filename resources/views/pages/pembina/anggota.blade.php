@extends('layouts.app')

@section('title', 'Manajemen Anggota')

@section('content')
<div class="row">
    <div class="col-md-12">

        <!-- Konfirmasi Anggota -->
        <h3 class="page-title mb-3">Konfirmasi Anggota</h3>
        <div class="card card-body p-0 mb-4">
            <table class="table table-striped mb-0">
                <thead class="table-light">
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
        <h3 class="page-title mb-3">Anggota Aktif</h3>
        <div class="card card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
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
                    @foreach($anggotaAktif as $i => $anggota)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $anggota->nama_lengkap }}</td>
                        <td>{{ $anggota->nis_k }}</td>
                        <td>{{ $anggota->kelas }}</td>
                        <td>{{ $anggota->role }}</td>
                        <td>
                            <a href="{{ route('pembina.anggota_edit', $anggota->id) }}" class="btn btn-sm btn-warning">
                                <span class="ti ti-pencil me-1"></span> Edit
                            </a>
                            <form action="{{ route('pembina.anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <span class="ti ti-trash me-1"></span> Hapus
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
@endsection
