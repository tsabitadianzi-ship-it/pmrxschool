<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use App\Notifications\InformasiBaruNotification;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pembina.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $informasi = Informasi::all();

        return view('pages.pembina.informasi.create', compact('informasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $informasi = new \App\Models\Informasi;
        $informasi->kegiatan = $request->kegiatan;
        $informasi->tanggal = $request->tanggal;
        $informasi->save();

        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->notify(new InformasiBaruNotification($informasi));
        }

        return redirect()->route('pembina.dashboard')
            ->with('success', 'Informasi baru berhasil ditambahkan dan notifikasi dikirim!');
    }



    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $informasi = Informasi::findOrFail($id);

        return view('pages.pembina.informasi.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $informasi = Informasi::findOrFail($id);
        $informasi->update($request->only(['kegiatan', 'tanggal']));

        return redirect()->route('pembina.dashboard')->with('success', 'Informasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('pembina.dashboard')->with('success', 'Informasi berhasil dihapus.');
    }
}
