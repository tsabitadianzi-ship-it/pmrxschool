<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Keuangan;
use App\Models\Materi;
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

    public function materi()
    {
        $materi = Materi::orderBy('tanggal', 'desc')->get();

        return view('pages.pembina.materi', compact('materi'));
    }

    public function materiShow($id)
    {
        $materi = Materi::findOrFail($id);

        return view('pages.pembina.materi.show', compact('materi'));
    }

    public function jurnal()
    {
        $jurnal = Jurnal::orderBy('created_at', 'desc')->get();

        return view('pages.pembina.jurnal', compact('jurnal'));
    }

    public function keuangan()
    {
        $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();

        return view('pages.pembina.keuangan', compact('keuangan'));
    }

    public function anggota()
    {
        // hanya siswa yang statusnya aktif
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])
            ->where('status', 'active')
            ->get();

        // hanya siswa yang statusnya pending
        $anggotaKonfirmasi = User::where('role', 'siswa')
            ->where('status', 'pending')
            ->get();

        // ambil semua pembina
        $pembina = User::where('role', 'pembina')->get();

        return view('pages.pembina.anggota', compact('anggotaAktif', 'anggotaKonfirmasi', 'pembina'));
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

    // Form edit jabatan anggota
    public function editAnggota($id)
    {
        $anggota = User::findOrFail($id);

        return view('pages.pembina.anggota_edit', compact('anggota'));
    }

    // Proses update jabatan anggota
    public function updateAnggota(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $anggota = User::findOrFail($id);
        $anggota->role = $request->role; // update jabatan/role
        $anggota->save();

        return redirect()->route('pembina.anggota')->with('success', 'Jabatan anggota berhasil diperbarui!');
    }

    // Form tambah pembina
    public function createPembina()
    {
        return view('pages.pembina.pembina_tambah');
    }

    // Proses simpan pembina baru
    public function storePembina(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis_k' => 'required|string|max:50|unique:users,nis_k',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
        ]);

        $pembina = new User;
        $pembina->nama_lengkap = $request->nama_lengkap;
        $pembina->nis_k = $request->nis_k;
        $pembina->tanggal_lahir = $request->tanggal_lahir;
        $pembina->alamat = $request->alamat;
        $pembina->no_telp = $request->no_telp;
        $pembina->jenis_kelamin = $request->jenis_kelamin;
        $pembina->role = 'pembina';
        $pembina->status = 'active';
        $pembina->alasan = '-';

        // Username = nama_lengkap (spasi diubah jadi underscore biar aman)
        $pembina->username = str_replace(' ', '_', strtolower($request->nama_lengkap));

        // Password = nis_k (hash pakai bcrypt)
        $pembina->password = bcrypt($request->nis_k);

        // Pembina tidak punya kelas
        $pembina->kelas = '-';

        $pembina->save();

        return redirect()->route('pembina.anggota')
            ->with('success', 'Pembina baru berhasil ditambahkan!');
    }

    public function destroyPembina($id)
    {
        $pembina = User::where('role', 'pembina')->findOrFail($id);

        $pembina->delete();

        return redirect()->route('pembina.anggota')
            ->with('success', 'Pembina berhasil dihapus!');
    }

    // Form edit pembina
    public function editPembina($id)
    {
        $pembina = User::where('role', 'pembina')->findOrFail($id);

        return view('pages.pembina.pembina_edit', compact('pembina'));
    }

    // Proses update pembina
    public function updatePembina(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis_k' => 'required|string|max:50|unique:users,nis_k,'.$id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
        ]);

        $pembina = User::where('role', 'pembina')->findOrFail($id);
        $pembina->nama_lengkap = $request->nama_lengkap;
        $pembina->nis_k = $request->nis_k;
        $pembina->tanggal_lahir = $request->tanggal_lahir;
        $pembina->alamat = $request->alamat;
        $pembina->no_telp = $request->no_telp;
        $pembina->jenis_kelamin = $request->jenis_kelamin;

        // kalau mau update username juga:
        $pembina->username = str_replace(' ', '_', strtolower($request->nama_lengkap));

        $pembina->save();

        return redirect()->route('pembina.anggota')
            ->with('success', 'Data pembina berhasil diperbarui!');
    }
}
