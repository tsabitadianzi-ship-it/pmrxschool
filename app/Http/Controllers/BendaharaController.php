<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    public function index()
    {
        return view('pages.bendahara.dashboard');
    }
    public function materi() {
        return view('pages.bendahara.materi');
    }

    public function jurnal() {
        return view('pages.bendahara.jurnal');
    }

    public function keuangan() {
        return view('pages.bendahara.keuangan');
    }

}
