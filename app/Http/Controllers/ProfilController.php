<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        if (!in_array($user->role, ['pembina', 'sekertaris', 'bendahara'])) {
            abort(403, 'Anda tidak punya akses ke halaman ini.');
        }

        return view('edit_profil', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
    'current_password' => 'required',
    'new_password' => 'required|min:6|confirmed',
], [
    'current_password.required' => 'Password lama wajib diisi.',
    'new_password.required' => 'Password baru wajib diisi.',
    'new_password.min' => 'Password baru minimal 6 karakter.',
    'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        switch ($user->role) {
            case 'pembina':
                return redirect()->route('pembina.dashboard')->with('success', 'Password berhasil diperbarui');
            case 'sekertaris':
                return redirect()->route('sekertaris.dashboard')->with('success', 'Password berhasil diperbarui');
            case 'bendahara':
                return redirect()->route('bendahara.dashboard')->with('success', 'Password berhasil diperbarui');
            default:
                return redirect()->route('siswa.dashboard')->with('success', 'Password berhasil diperbarui');
        }
    }
}