<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function index()
    {
        $materi = DB::table('materi')->orderBy('tanggal', 'desc')->get();

        return view('pages.sekertaris.materi', compact('materi'));
    }

    public function create()
    {
        return view('pages.sekertaris.materi.create');
    }

    public function store(Request $request)
    {
        // Validasi input (file nullable)
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,png|max:5120',
        ]);

        // default null supaya tidak Undefined variable
        $fileName = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/materi'), $fileName);
        }

        DB::table('materi')->insert([
            'tanggal' => $validated['tanggal'],
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'file' => $fileName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('sekertaris.materi.index')
            ->with('success', 'Materi berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $materi = DB::table('materi')->where('id', $id)->first();

        if (! $materi) {
            return redirect()->route('sekertaris.materi.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('pages.sekertaris.materi.show', compact('materi'));
    }

    public function edit(string $id)
    {
        $materi = DB::table('materi')->where('id', $id)->first();

        return view('pages.sekertaris.materi.edit', compact('materi'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,png|max:5120',
        ]);

        $materi = DB::table('materi')->where('id', $id)->first();
        if (! $materi) {
            return redirect()->route('sekertaris.materi.index')->with('error', 'Data tidak ditemukan.');
        }

        // keep old filename by default
        $fileName = $materi->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $newName = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/materi'), $newName);

            // hapus file lama jika ada
            if ($materi->file && file_exists(public_path('uploads/materi/'.$materi->file))) {
                @unlink(public_path('uploads/materi/'.$materi->file));
            }

            $fileName = $newName;
        }

        DB::table('materi')->where('id', $id)->update([
            'tanggal' => $validated['tanggal'],
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'file' => $fileName,
            'updated_at' => now(),
        ]);

        return redirect()->route('sekertaris.materi.index')
            ->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $materi = DB::table('materi')->where('id', $id)->first();
        if ($materi) {
            if ($materi->file && file_exists(public_path('uploads/materi/'.$materi->file))) {
                @unlink(public_path('uploads/materi/'.$materi->file));
            }
            DB::table('materi')->where('id', $id)->delete();
        }

        return redirect()->route('sekertaris.materi.index');
    }
}
