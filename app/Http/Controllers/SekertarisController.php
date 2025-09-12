<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.sekertaris.keuangan');
    }
}
