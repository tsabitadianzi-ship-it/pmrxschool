@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Dashboard Pembina PMR</h1>

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
                <tr>
                    <th width="25%">Pembimbing</th>
                    <th width="10px">:</th>
                    <td>Pak Budi Santoso</td>
                </tr>
                <tr>
                    <th width="25%">Kontak</th>
                    <th width="10px">:</th>
                    <td>0876-7876-7877</td>
                </tr>
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
                    <td>42</td>
                </tr>
                <tr>
                    <th width="25%">Aktif</th>
                    <th width="10px">:</th>
                    <td>38</td>
                </tr>
                <tr>
                    <th width="25%">Pending</th>
                    <th width="10px">:</th>
                    <td>4</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Kegiatan -->
    <div class="bg-white rounded-xl shadow-md p-5">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Kegiatan Terdekat</h2>
        <ul class="list-disc list-inside text-gray-600">
            <li>Donor Darah - 20 September 2025</li>
            <li>Latihan Pertolongan Pertama - 25 September 2025</li>
            <li>Simulasi Bencana - 5 Oktober 2025</li>
        </ul>
    </div>
</div>

@endsection
