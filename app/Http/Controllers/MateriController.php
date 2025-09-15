<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = DB::table('materi')->orderBy('tanggal', 'desc')->get();

        return view('pages.sekertaris.materi', compact('materi'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sekertaris.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'judul'   => 'required|string|max:255',
        'isi'     => 'required|string',
        'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,png|max:5120',

    ]);

    if ($request->hasFile('file')) {
        // bikin nama file aman
        $fileName = time().'_'.preg_replace('/\s+/', '_', $request->file('file')->getClientOriginalName());
        $request->file('file')->move(public_path('uploads/materi'), $fileName);
    }

    // Simpan ke database
    \DB::table('materi')->insert([
        'tanggal' => $validated['tanggal'],
        'judul'   => $validated['judul'],
        'isi'     => $validated['isi'],
        'file'    => $fileName,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('sekertaris.materi.index')
                     ->with('success', 'Materi berhasil ditambahkan!');
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
         $materi = DB::table('materi')->orderBy('tanggal', 'desc')->get();

        return view('pages.sekertaris.materi', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'tanggal' => 'required|date',
        'judul'   => 'required|string|max:255',
        'isi'     => 'required|string',
        'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,png|max:5120',

    ]);
         return redirect()->route('sekertaris.materi.index')
                     ->with('success', 'Materi berhasil ditambahkan!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
