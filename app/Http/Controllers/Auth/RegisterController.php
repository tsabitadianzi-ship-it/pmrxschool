<?php

namespace App\Http\Controllers\Auth;
// INI UNTUK SUPAYA PAS ABIS REGISTER LANGSUNGLOG OUT 
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register/success'; // ✅ default redirect ke halaman success
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         
        return Validator::make($data, [
            'nama_lengkap' => ['required', 'string', 'max:32'],
            'nis_k' => ['required', 'string', 'max:18', 'unique:users'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'max:18'],
            'kelas' => ['required', 'string', 'max:10'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alasan' => ['required', 'string'],
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Buat username otomatis dari nama_lengkap
    $username = strtolower(str_replace(' ', '', $data['nama_lengkap']));

    // Buat password otomatis dari nis_k
    $password = Hash::make($data['nis_k']);

    
        return User::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'nis_k' => $data['nis_k'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alasan' => $data['alasan'],
            'username' => $username,
            'password' => $password,
        ]);
    }

    public function register(Request $request)
{
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    // ✅ langsung logout biar user tidak auto login
    Auth::logout();

    return redirect('/register/success');
}

}
