<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    private function absensiQuery()
    {
        return Absensi::with('user')
            ->whereHas('user', function($q){
                $q->where('role', '!=', 'pembina')
                ->where('status', 'active');
            })
            ->orderBy('tanggal', 'desc');
    }

    public function index(Request $request)
    {
        $absensiPerTanggal = $this->absensiQuery()->get()->groupBy('tanggal');

        return view('pages.sekertaris.absensi', compact('absensiPerTanggal'));
    }

    public function create()
    {
        $users = User::whereIn('role', ['siswa','sekertaris','bendahara'])
            ->where('status', 'active')
            ->get();
        return view('pages.sekertaris.absensi.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'kegiatan' => 'nullable|string|max:255',
            'status' => 'required|in:Hadir,Izin,Tidak Hadir',
        ]);

        $user = User::find($request->user_id);
        if ($user->role === 'pembina') {
            return back()->with('error', 'Pembina tidak boleh diabsen!');
        }

        Absensi::create($request->all());
        return redirect()->route('sekertaris.absensi')->with('success', 'Absensi berhasil disimpan!');
    }

    public function show($tanggal)
    {
        $absensis = $this->absensiQuery()
            ->where('tanggal', $tanggal)
            ->get();

        return view('pages.sekertaris.absensi.show', compact('absensis', 'tanggal'));
    }

    public function edit($id)
    {
        $absensi = Absensi::with('user')->findOrFail($id);
        if ($absensi->user->role === 'pembina') {
            return back()->with('error', 'Tidak dapat mengedit absensi pembina!');
        }

        return view('pages.sekertaris.absensi.edit', compact('absensi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:Hadir,Izin,Tidak Hadir']);

        $absensi = Absensi::findOrFail($id);
        if ($absensi->user->role === 'pembina') {
            return back()->with('error', 'Tidak dapat mengubah absensi pembina!');
        }

        $absensi->update(['status' => $request->status]);

        return redirect()->route('sekertaris.absensi.show', $absensi->tanggal)
            ->with('success', 'Status absensi berhasil diperbarui.');
    }

    public function destroyByTanggal($tanggal)
    {
        Absensi::where('tanggal', $tanggal)
            ->whereHas('user', function($q){
                $q->where('role', '!=', 'pembina');
            })
            ->delete();

        return redirect()->route('sekertaris.absensi')
            ->with('success', 'Absensi pada tanggal tersebut berhasil dihapus.');
    }

    public function storeMass(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'status' => 'required|array',
        ]);

        foreach ($request->status as $user_id => $status) {
            $user = User::find($user_id);

            if ($user && $user->role !== 'pembina') {
                Absensi::create([
                    'user_id' => $user_id,
                    'tanggal' => $request->tanggal,
                    'kegiatan' => $request->kegiatan,
                    'status' => $status,
                ]);
            }
        }

        return redirect()->route('sekertaris.absensi')->with('success', 'Absensi berhasil disimpan!');
    }

    // ==== HALAMAN UNTUK ROLE LAIN ====

    public function indexPembina()
    {
        $absensiPerTanggal = $this->absensiQuery()->get()->groupBy('tanggal');
        return view('pages.pembina.absensi', compact('absensiPerTanggal'));
    }

    public function showPembina($tanggal)
    {
        $absensis = $this->absensiQuery()->where('tanggal', $tanggal)->get();
        return view('pages.pembina.absensi.show', compact('absensis', 'tanggal'));
    }

    public function indexSiswa()
    {
        $absensiPerTanggal = $this->absensiQuery()->get()->groupBy('tanggal');
        return view('pages.siswa.absensi', compact('absensiPerTanggal'));
    }

    public function showSiswa($tanggal)
    {
        $absensis = $this->absensiQuery()->where('tanggal', $tanggal)->get();
        return view('pages.siswa.absensi.show', compact('absensis', 'tanggal'));
    }

    public function indexBendahara()
    {
        $absensiPerTanggal = $this->absensiQuery()->get()->groupBy('tanggal');
        return view('pages.bendahara.absensi', compact('absensiPerTanggal'));
    }

    public function showBendahara($tanggal)
    {
        $absensis = $this->absensiQuery()->where('tanggal', $tanggal)->get();
        return view('pages.bendahara.absensi.show', compact('absensis', 'tanggal'));
    }
}
