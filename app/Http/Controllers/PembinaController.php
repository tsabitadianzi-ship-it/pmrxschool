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
        return view('pages.pembina.dashboard'); 
    }
    public function materi() {
        return view('pages.pembina.materi');
    }

    public function jurnal() {
        return view('pages.pembina.jurnal');
    }

    public function keuangan() {
        return view('pages.pembina.keuangan');
    }
    
    public function anggota()
{
    // hanya siswa yang statusnya aktif
    $anggotaAktif = User::where('role', 'siswa')
                        ->where('status', 'active')
                        ->get();

    // hanya siswa yang statusnya pending
    $anggotaKonfirmasi = User::where('role', 'siswa')
                             ->where('status', 'pending')
                             ->get();

    return view('pages.pembina.anggota', compact('anggotaAktif', 'anggotaKonfirmasi'));
}

public function show($id)
{
    $anggota = User::findOrFail($id);
    return view('pages.pembina.anggota_detail', compact('anggota'));
}


public function terimaAnggota($id)
{
    $user = User::findOrFail($id);
    $user->status = 'active';
    $user->save();

    return redirect()->route('pembina.anggota')->with('success', 'Anggota berhasil diterima!');
}

public function tolakAnggota($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // hapus langsung dari database

    return redirect()->route('pembina.anggota')->with('success', 'Anggota berhasil ditolak dan dihapus!');
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // hapus user
    return redirect()->route('pembina.anggota')->with('success', 'Anggota berhasil dihapus!');
}



    
}
