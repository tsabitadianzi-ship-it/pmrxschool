<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();

        $saldo = Keuangan::select(DB::raw("
            SUM(CASE WHEN tipe = 'Pemasukan' THEN jumlah ELSE -jumlah END) as saldo
        "))->value('saldo') ?? 0;

        return view('pages.bendahara.keuangan', compact('keuangan', 'saldo'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bendahara.keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'tanggal' => 'required|date',
        'tipe' => 'required|in:Pemasukan,Pengeluaran',
        'keterangan' => 'required|string|max:50',
        'jumlah' => 'required|numeric|min:1'
    ]);

    $lastSaldo = Keuangan::orderBy('id', 'desc')->value('total') ?? 0;

    $total = $request->tipe == 'Pemasukan'
        ? $lastSaldo + $request->jumlah
        : $lastSaldo - $request->jumlah;

    Keuangan::create([
        'tanggal' => $request->tanggal,
        'tipe' => $request->tipe,
        'keterangan' => $request->keterangan,
        'jumlah' => $request->jumlah,
        'total' => $total,
    ]);

    return redirect()->route('bendahara.keuangan.index')->with('success', 'Data berhasil ditambahkan!');
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
    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('pages.bendahara.keuangan.edit', compact('keuangan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'tanggal'     => 'required|date',
        'tipe'        => 'required|in:Pemasukan,Pengeluaran',
        'keterangan'  => 'required|string|max:20',
        'jumlah'      => 'required|numeric|min:0',
    ]);

    $keuangan = Keuangan::findOrFail($id);

    $keuangan->tanggal    = $request->tanggal;
    $keuangan->tipe       = $request->tipe;
    $keuangan->keterangan = $request->keterangan;
    $keuangan->jumlah     = $request->jumlah;
    $keuangan->save();

    $transaksi = Keuangan::orderBy('id')->get();

    $saldo = 0;
    foreach ($transaksi as $t) {
        $saldo += $t->tipe === 'Pemasukan' ? $t->jumlah : -$t->jumlah;
        $t->total = $saldo;
        $t->save();
    }

    return redirect()->route('bendahara.keuangan.index')
                     ->with('success', 'Data keuangan berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        $transaksi = Keuangan::orderBy('id')->get();

        $saldo = 0;
        foreach ($transaksi as $t) {
            $saldo += $t->tipe === 'Pemasukan' ? $t->jumlah : -$t->jumlah;
            $t->total = $saldo;
            $t->save();
        }

        return redirect()->route('bendahara.keuangan.index')
                        ->with('success', 'Data berhasil dihapus!');
    }

}
