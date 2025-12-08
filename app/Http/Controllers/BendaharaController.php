<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Jurnal;
use App\Models\Materi;
use App\Models\Pelaksanaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BendaharaController extends Controller
{
    public function index()
    {
        $pembina = User::where('role', 'pembina')->get();

       $informasi = Informasi::where('tanggal', '>=', now())->orderBy('tanggal', 'asc')->get();

        $jumlahAnggota = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->count();
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->where('status', 'active')->count();
        $jumlahAnggota = User::whereIn('role', ['siswa','sekertaris','bendahara'])->where('status','active')->count();
        $anggotaPending = User::where('role', 'siswa')->where('status', 'pending')->count();
        $pelaksanaan = Pelaksanaan::all();

        $notifications = Auth::user()->unreadNotifications;
        return view('pages.bendahara.dashboard', compact(
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
        $materi = Materi::orderBy('tanggal', 'desc')->get();

        return view('pages.bendahara.materi', compact('materi'));
    }

    public function materiShow($id)
    {
        $materi = Materi::findOrFail($id);

        return view('pages.bendahara.materi.show', compact('materi'));
    }

    public function jurnal()
    {
        $jurnal = Jurnal::orderBy('created_at', 'desc')->get();

        return view('pages.bendahara.jurnal', compact('jurnal'));
    }

    public function keuangan()
    {
        return view('pages.bendahara.keuangan');
    }
}
