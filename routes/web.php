<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\SiswaController;

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('pages.guest.guest');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/success', function () {
    return view('pages.guest.register_success');
})->name('register.success');


Auth::routes([
    'reset' => false,
    'verify' => false,
    'confirm'=> false
]);

Route::group([
    'middleware' => ['auth']
    //Auth middleware : untuk mengecek apakah user sudah login
], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/pembina', [App\Http\Controllers\PembinaController::class, 'index'])->name('pages.pembina.dashboard');
    Route::get('/sekertaris', [App\Http\Controllers\SekertarisController::class, 'index'])->name('pages.sekertaris.dashboard');
    Route::get('/bendahara', [App\Http\Controllers\BendaharaController::class, 'index'])->name('pages.bendahara.dashboard');
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('pages.siswa.dashboard');
});



