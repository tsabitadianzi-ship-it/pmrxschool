<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;

class SekertarisController extends Controller
{
    public function index()
    {
        return view('pages.sekertaris.dashboard');
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
