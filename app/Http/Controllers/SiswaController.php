<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('pages.siswa.dashboard');
    }
    public function materi()
    {
        return view('pages.siswa.materi');
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
