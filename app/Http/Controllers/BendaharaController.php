<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Materi;

class BendaharaController extends Controller
{
    public function index()
    {
        return view('pages.bendahara.dashboard');
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
