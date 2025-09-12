@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="font-bold text-lg mb-4">Detail Anggota</h2>
    <p><strong>Nama:</strong> {{ $anggota->nama_lengkap }}</p>
    <p><strong>NIS:</strong> {{ $anggota->nis_k }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $anggota->tanggal_lahir }}</p>
    <p><strong>Alamat:</strong> {{ $anggota->alamat }}</p>
    <p><strong>No Telepon:</strong> {{ $anggota->no_telp }}</p>
    <p><strong>Kelas:</strong> {{ $anggota->kelas }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $anggota->jenis_kelamin }}</p>
    <p><strong>Alasan Masuk Ekstrakurikuler PMR :</strong> {{ $anggota->alasan }}</p>
    {{-- Tambahkan info lain yang kamu butuhkan --}}
    
    <div class="mt-4 space-x-2">
        <form action="{{ route('pembina.anggota.terima', $anggota->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Terima</button>
        </form>

        <form action="{{ route('pembina.anggota.tolak', $anggota->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Tolak</button>
        </form>

        <a href="{{ route('pembina.anggota') }}" class="bg-gray-500 text-white px-3 py-1 rounded">Kembali</a>
    </div>
</div>
@endsection
