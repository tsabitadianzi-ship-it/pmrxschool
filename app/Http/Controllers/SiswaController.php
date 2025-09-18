<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Keuangan;
use App\Models\Materi;

class SiswaController extends Controller
{
    public function index()
    {
        return view('pages.siswa.dashboard');
    }

    public function materi()
    {
        $materi = Materi::orderBy('tanggal', 'desc')->get();

        return view('pages.siswa.materi', compact('materi'));
    }

    public function materiShow($id)
    {
        $materi = Materi::findOrFail($id);

        return view('pages.siswa.materi.show', compact('materi'));
    }

    public function jurnal()
    {
        $jurnal = Jurnal::orderBy('created_at', 'desc')->get();

        return view('pages.siswa.jurnal', compact('jurnal'));
    }

    public function keuangan()
    {
        $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();

        return view('pages.siswa.keuangan', compact('keuangan'));
    }
}
