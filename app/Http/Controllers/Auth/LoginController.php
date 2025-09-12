<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Gunakan username sebagai field login
    public function username()
    {
        return 'username';
    }

    // Override credentials untuk login
    protected function credentials(Request $request)
    {
        return [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];
    }

    // Override untuk user yang sudah berhasil login
    protected function authenticated(Request $request, $user)
    {
        // Cek status aktif
        if ($user->status !== 'active') {
            auth()->logout();
            return redirect()->route('login')
                ->with('error', 'Akun Anda masih menunggu konfirmasi pembina.');
        }

        // Redirect sesuai role
        return match ($user->role) {
            'pembina'    => redirect()->route('pembina.dashboard'),
            'sekertaris' => redirect()->route('sekertaris.dashboard'),
            'bendahara'  => redirect()->route('bendahara.dashboard'),
            default      => redirect()->route('siswa.dashboard'),
        };
    }

    // Override saat login gagal
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            // User tidak ditemukan
            return redirect()->back()
                ->withInput($request->only('username'))
                ->with('error', 'Akun tidak ditemukan. Silakan daftar terlebih dahulu.');
        }

        // User ditemukan tapi password salah
        return redirect()->back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }
}
