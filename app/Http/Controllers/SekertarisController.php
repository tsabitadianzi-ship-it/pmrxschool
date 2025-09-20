<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Keuangan;
use App\Models\User;

class SekertarisController extends Controller
{
    public function index()
    {
        // ambil data pembina
        $pembina = User::where('role', 'pembina')->get();

        // ambil data informasi
        $informasi = Informasi::orderBy('tanggal', 'asc')
            ->whereDate('tanggal', '>=', now())
            ->take(5)
            ->get();

        // statistik anggota
        $jumlahAnggota = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->count();
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->where('status', 'active')->count();
        $anggotaPending = User::where('role', 'siswa')->where('status', 'pending')->count();

        return view('pages.sekertaris.dashboard', compact(
            'pembina',
            'jumlahAnggota',
            'anggotaAktif',
            'anggotaPending',
            'informasi',
        ));

    }

    public function materi()
    {
        return view('pages.sekertaris.materi');
    }

    public function jurnal()
    {
        return view('pages.sekertaris.jurnal');
    }

    public function keuangan()
    {
        $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();

        return view('pages.sekertaris.keuangan', compact('keuangan'));
    }
}
