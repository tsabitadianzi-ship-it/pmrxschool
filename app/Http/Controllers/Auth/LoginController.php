<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

     public function username()
    {
        return 'username';
    }

     protected function credentials(Request $request)
    {
        return [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'status'   => 'active',
        ];
    }

    protected function authenticated(Request $request, $user)
    {
        return match ($user->role) {
            'pembina'    => redirect()->route('pembina.dashboard'),
            'sekertaris' => redirect()->route('sekertaris.dashboard'),
            'bendahara'  => redirect()->route('bendahara.dashboard'),
            default      => redirect()->route('siswa.dashboard'),
    
    };

    }
}
