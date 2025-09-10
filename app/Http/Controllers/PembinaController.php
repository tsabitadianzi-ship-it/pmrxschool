<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    // Pastikan hanya user login yang bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Halaman dashboard pembina
    public function index()
    {
        return view('pembina.dashboard'); 
    }
}
