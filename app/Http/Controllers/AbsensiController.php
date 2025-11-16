<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->query('jenis');

        $query = Absensi::with('user')->orderBy('tanggal', 'desc');

        if ($jenis) {
            $query->where('jenis', $jenis);
        }

        $absensiPerTanggal = $query->whereHas('user', function($q){
            $q->where('role', '!=', 'pembina'); 
        })->get()->groupBy('tanggal');

        return view('pages.sekertaris.absensi', compact('absensiPerTanggal'));
    }

    public function create()
    {
        $users = User::whereIn('role', ['siswa','sekertaris','bendahara'])->get(); // exclude pembina
        return view('pages.sekertaris.absensi.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:Mingguan,Khusus',
            'kegiatan' => 'nullable|string|max:255',
            'status' => 'required|in:Hadir,Izin,Tidak Hadir',
        ]);

        Absensi::create($request->all());

        return redirect()->route('sekertaris.absensi')->with('success', 'Absensi berhasil disimpan!');


    }

    public function edit($id)
    {
        $absensi = Absensi::with('user')->findOrFail($id);
        return view('pages.sekertaris.absensi.edit', compact('absensi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Izin,Tidak Hadir',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->status = $request->status;
        $absensi->save();

    return redirect()->route('sekertaris.absensi.show', $absensi->tanggal)->with('success', 'Status absensi berhasil diperbarui.');
    }

    public function destroyByTanggal($tanggal)
    {
        Absensi::where('tanggal', $tanggal)->delete();

        return redirect()->route('sekertaris.absensi')->with('success', 'Semua absensi pada tanggal tersebut berhasil dihapus.');
    }

    public function show($tanggal)
    {
        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->get();

        return view('pages.sekertaris.absensi.show', compact('absensis', 'tanggal'));
    }


    public function storeMass(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'status'   => 'required|array',
        ]);

        foreach ($request->status as $user_id => $status) {
            Absensi::create([
                'user_id' => $user_id,
                'tanggal' => $request->tanggal,
                'kegiatan' => $request->kegiatan,
                'status' => $status,
            ]);
        }

        return redirect()->route('sekertaris.absensi')
                        ->with('success', 'Absensi berhasil disimpan!');
    }


    // Tampil semua absensi untuk pembina
    public function indexPembina(Request $request)
    {
        $jenis = $request->query('jenis');

        $query = Absensi::with('user')->orderBy('tanggal', 'desc');

        if ($jenis) {
            $query->where('jenis', $jenis);
        }

        // Ambil semua absensi siswa, sekertaris, bendahara (exclude pembina)
        $absensiPerTanggal = $query->whereHas('user', function($q){
            $q->where('role', '!=', 'pembina'); 
        })->get()->groupBy('tanggal');

        return view('pages.pembina.absensi', compact('absensiPerTanggal'));
    }

    // Show detail absensi per tanggal
    public function showPembina($tanggal)
    {
        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->get();

        return view('pages.pembina.absensi.show', compact('absensis', 'tanggal'));
    }

    // Form edit absensi
    public function editPembina($id)
    {
        $absensi = Absensi::with('user')->findOrFail($id);
        return view('pages.pembina.absensi.edit', compact('absensi'));
    }

    // Update data absensi
    public function updatePembina(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Izin,Tidak Hadir',
            'kegiatan' => 'nullable|string|max:255',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->only('status', 'kegiatan'));

        return redirect()->route('pembina.absensi.show', $absensi->tanggal)->with('success', 'Absensi berhasil diperbarui.');
    }

    public function indexSiswa(Request $request)
    {
        $jenis = $request->query('jenis');

        $query = Absensi::with('user')->orderBy('tanggal', 'desc');

        if ($jenis) {
            $query->where('jenis', $jenis);
        }

        // Ambil semua absensi siswa, sekertaris, bendahara (exclude pembina)
        $absensiPerTanggal = $query->whereHas('user', function($q){
            $q->where('role', '!=', 'pembina'); 
        })->get()->groupBy('tanggal');

        return view('pages.siswa.absensi', compact('absensiPerTanggal'));
    }


    public function showSiswa($tanggal)
    {
        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->whereHas('user', function($q){
                $q->where('role', '!=', 'pembina'); 
            })->get();

        return view('pages.siswa.absensi.show', compact('absensis', 'tanggal'));
    }

    public function indexBendahara(Request $request)
    {
        $jenis = $request->query('jenis');

        $query = Absensi::with('user')->orderBy('tanggal', 'desc');

        if ($jenis) {
            $query->where('jenis', $jenis);
        }

        // Ambil semua absensi siswa, sekertaris, bendahara (exclude pembina)
        $absensiPerTanggal = $query->whereHas('user', function($q){
            $q->where('role', '!=', 'pembina'); 
        })->get()->groupBy('tanggal');

        return view('pages.bendahara.absensi', compact('absensiPerTanggal'));
    }

    public function showBendahara($tanggal)
    {
        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->whereHas('user', function($q){
                $q->where('role', '!=', 'pembina'); 
            })->get();

        return view('pages.bendahara.absensi.show', compact('absensis', 'tanggal'));
    }


}
