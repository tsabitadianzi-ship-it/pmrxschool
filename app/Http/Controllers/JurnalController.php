<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal = Jurnal::orderBy('id', 'desc')->get();

        return view('pages.sekertaris.jurnal', compact('jurnal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sekertaris.jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'waktu_mulai'   => substr($request->waktu_mulai, 0, 5),
            'waktu_selesai' => substr($request->waktu_selesai, 0, 5),
        ]);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ]);

        Jurnal::create($validated);

        return redirect()->route('sekertaris.jurnal.index')
            ->with('success', 'Jurnal berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurnal = Jurnal::findOrFail($id);

        return view('pages.sekertaris.jurnal.edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'waktu_mulai'   => substr($request->waktu_mulai, 0, 5),
            'waktu_selesai' => substr($request->waktu_selesai, 0, 5),
        ]);
        
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ]);

        $jurnal = Jurnal::find($id);
        $jurnal->update($validated);

        return redirect()->route('sekertaris.jurnal.index')
            ->with('success', 'Jurnal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurnal = Jurnal::find($id);
        $jurnal->delete();

        return redirect()->route('sekertaris.jurnal.index');
    }
}
