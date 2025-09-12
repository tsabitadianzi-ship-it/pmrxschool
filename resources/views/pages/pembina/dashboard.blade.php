@extends('layouts.app')
@section('title', 'Dashboard Pembina')
@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4 text-gray-700">Dashboard Pembina PMR</h1>

    <!-- Info Ekskul & Pembina -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-purple-50 text-purple-800 rounded-xl p-4 shadow-sm hover:shadow-md transition">
            <h3 class="font-semibold mb-1">Hari Ekskul</h3>
            <p class="text-sm">Senin & Rabu</p>
            <p class="text-sm">15:30 - 17:00</p>
        </div>
        <div class="bg-green-50 text-green-800 rounded-xl p-4 shadow-sm hover:shadow-md transition">
            <h3 class="font-semibold mb-1">Pembimbing</h3>
            <p class="text-sm">Pak Budi Santoso</p>
            <p class="text-xs text-gray-600">budi.santoso@example.com</p>
        </div>
        <div class="bg-blue-50 text-blue-800 rounded-xl p-4 shadow-sm hover:shadow-md transition">
            <h3 class="font-semibold mb-1">Jumlah Siswa</h3>
            <p class="text-sm">42 Siswa Terdaftar</p>
        </div>
    </div>


@endsection
