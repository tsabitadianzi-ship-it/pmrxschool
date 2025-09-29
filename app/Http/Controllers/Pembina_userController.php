<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Pembina_userController extends Controller
{
    public function create()
    {
        return view('pages.pembina.pembina.create');
    }

    public function store(Request $request)
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
        $pembina->username = str_replace(' ', '_', strtolower($request->nama_lengkap));
        $pembina->password = bcrypt($request->nis_k);
        $pembina->kelas = '-';
        $pembina->save();

        return redirect()->route('pembina.anggota')
            ->with('success', 'Pembina baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembina = User::where('role', 'pembina')->findOrFail($id);

        return view('pages.pembina.pembina.edit', compact('pembina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis_k' => 'required|string|max:50|unique:users,nis_k,' . $id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
        ]);

        $pembina = User::where('role', 'pembina')->findOrFail($id);
        $pembina->update($request->only([
            'nama_lengkap', 'nis_k', 'tanggal_lahir', 'alamat', 'no_telp', 'jenis_kelamin'
        ]));

        return redirect()->route('pembina.anggota')
            ->with('success', 'Data pembina berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pembina = User::where('role', 'pembina')->findOrFail($id);
        $pembina->delete();

        return redirect()->route('pembina.anggota')
            ->with('success', 'Pembina berhasil dihapus!');
    }
}
