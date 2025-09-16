<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class SiswaController extends Controller
{
    public function index()
    {
        return view('pages.siswa.dashboard');
    }
    public function materi() {
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
        return view('pages.siswa.jurnal');
    }
    public function keuangan()
    {
        return view('pages.siswa.keuangan');
    }

}
