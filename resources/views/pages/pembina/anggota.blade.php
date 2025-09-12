@extends('layouts.app') {{-- ganti sesuai layout yang kamu pakai --}}

@section('content')
<div class="flex">

       <!-- Main Content -->
    <main class="flex-1 p-6">

        <!-- Konfirmasi Anggota -->
        <section class="bg-white rounded-xl shadow-md p-4 mb-6">
            <h2 class="font-bold text-lg mb-4">KONFIRMASI ANGGOTA</h2>
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">NIS</th>
                        <th class="border px-3 py-2">Kelas</th>
                        <th class="border px-3 py-2">Status</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggotaKonfirmasi as $i => $anggota)
                    <tr>
                        <td class="border px-3 py-2 text-center">{{ $i+1 }}</td>
                        <td class="border px-3 py-2">{{ $anggota->nama_lengkap }}</td>
                        <td class="border px-3 py-2">{{ $anggota->nis_k }}</td>
                        <td class="border px-3 py-2">{{ $anggota->kelas }}</td>
                        <td class="border px-3 py-2">{{ $anggota->status }}</td>
                        <td class="border px-3 py-2 flex gap-2">
                            <a href="{{ route('pembina.anggota_detail', $anggota->id) }}" class="btn btn-primary">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <!-- Anggota Aktif -->
        <section class="bg-white rounded-xl shadow-md p-4">
            <h2 class="font-bold text-lg mb-4">ANGGOTA AKTIF</h2>
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">NIS</th>
                        <th class="border px-3 py-2">Kelas</th>
                        <th class="border px-3 py-2">Jabatan</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggotaAktif as $i => $anggota)
                    <tr>
                        <td class="border px-3 py-2 text-center">{{ $i+1 }}</td>
                        <td class="border px-3 py-2">{{ $anggota->nama_lengkap }}</td>
                        <td class="border px-3 py-2">{{ $anggota->nis_k }}</td>
                        <td class="border px-3 py-2">{{ $anggota->kelas }}</td>
                        <td class="border px-3 py-2">{{ $anggota->role }}</td>
                        <td class="border px-3 py-2 space-x-2">
                            <a href="" class="bg-blue-500 text-white px-3 py-1 rounded">Edit Jabatan</a>
                            <form action="{{ route('pembina.anggota.destroy', $anggota->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
</div>
@endsection
