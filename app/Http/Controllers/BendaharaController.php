<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class BendaharaController extends Controller
{
    public function index()
    {
        return view('pages.bendahara.dashboard');
    }
     public function materi() {
        $materi = Materi::orderBy('tanggal', 'desc')->get();
    return view('pages.bendahara.materi', compact('materi'));
    }

    public function materiShow($id)
    {
        $materi = Materi::findOrFail($id);
        return view('pages.bendahara.materi.show', compact('materi'));
    }

    public function jurnal() {
        return view('pages.bendahara.jurnal');
    }

    public function keuangan() {
        return view('pages.bendahara.keuangan');
    }

}
