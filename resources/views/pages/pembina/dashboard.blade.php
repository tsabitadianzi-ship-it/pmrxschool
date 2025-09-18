@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard Pembina PMR</h1>
        
        <!-- Tombol Tambah Pembina -->
        <a href="{{ route('pembina.pembina_tambah') }}" 
           class="btn btn-primary">
            <span class="ti ti-plus me-1"></span> Tambah Pembina
        </a>
    </div>

    <!-- Kegiatan -->
    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Kegiatan Terdekat</h2>
        <ul class="list-disc list-inside text-gray-600">
            <li>Donor Darah - 20 September 2025</li>
            <li>Latihan Pertolongan Pertama - 25 September 2025</li>
            <li>Simulasi Bencana - 5 Oktober 2025</li>
        </ul>
    </div>

    <!-- Informasi Ekskul -->
    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Informasi Ekskul</h2>
        <table class="table table-striped w-full">
            <tbody>
                <tr>
                    <th width="25%">Hari</th>
                    <th width="10px">:</th>
                    <td>Senin</td>
                </tr>
                <tr>
                    <th width="25%">Jam</th>
                    <th width="10px">:</th>
                    <td>15:45</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Daftar Pembina -->
    <div class="bg-white rounded-xl shadow-md p-5 mb-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Daftar Pembina</h2>
        <table class="table table-striped w-full">
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

    <!-- Statistik Anggota -->
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

@endsection
