<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Keuangan;
use App\Models\Pelaksanaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SekertarisController extends Controller
{
    public function index()
    {
        $pembina = User::where('role', 'pembina')->get();

       $informasi = Informasi::where('tanggal', '>=', now())->orderBy('tanggal', 'asc')->get();

        $jumlahAnggota = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->count();
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->where('status', 'active')->count();
        $anggotaPending = User::where('role', 'siswa')->where('status', 'pending')->count();
        $jumlahAnggota = User::whereIn('role', ['siswa','sekertaris','bendahara'])->where('status','active')->count();
        $pelaksanaan = Pelaksanaan::all();

        $notifications = Auth::user()->unreadNotifications;

        return view('pages.sekertaris.dashboard', compact(
            'pembina',
            'jumlahAnggota',
            'anggotaAktif',
            'anggotaPending',
            'informasi',
            'pelaksanaan',
            'notifications'
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
