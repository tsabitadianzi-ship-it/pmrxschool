<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\SiswaController;

Route::get('/', [GuestController::class, 'index'])->name('pages.guest.guest');
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

// Semua route di bawah ini hanya bisa diakses setelah login
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // === ROUTE UNTUK PEMBINA ===
    Route::prefix('pembina')->name('pembina.')->group(function() {
        Route::get('/dashboard', [PembinaController::class, 'index'])->name('dashboard');
        Route::get('/materi', [PembinaController::class, 'materi'])->name('materi');
        Route::get('/jurnal', [PembinaController::class, 'jurnal'])->name('jurnal');
        Route::get('/keuangan', [PembinaController::class, 'keuangan'])->name('keuangan');
        Route::get('/anggota', [PembinaController::class, 'anggota'])->name('anggota');

        Route::get('/anggota/{id}/detail', [PembinaController::class, 'show'])->name('anggota_detail');
        Route::post('/anggota/{id}/terima', [PembinaController::class, 'terimaAnggota'])->name('anggota.terima');
        Route::post('/anggota/{id}/tolak', [PembinaController::class, 'tolakAnggota'])->name('anggota.tolak');
        Route::delete('/anggota/{id}', [PembinaController::class, 'destroy'])->name('anggota.destroy');


    });

    // === ROUTE UNTUK SEKRETARIS ===
    Route::prefix('sekertaris')->name('sekertaris.')->group(function() {
        Route::get('/dashboard', [SekertarisController::class, 'index'])->name('dashboard');
        Route::get('/materi', [SekertarisController::class, 'materi'])->name('materi');
        Route::get('/jurnal', [SekertarisController::class, 'jurnal'])->name('jurnal');
        Route::get('/keuangan', [SekertarisController::class, 'keuangan'])->name('keuangan');
    });

    // === ROUTE UNTUK BENDAHARA ===
    Route::prefix('bendahara')->name('bendahara.')->group(function() {
        Route::get('/dashboard', [BendaharaController::class, 'index'])->name('dashboard');
        Route::get('/materi', [BendaharaController::class, 'materi'])->name('materi');
        Route::get('/jurnal', [BendaharaController::class, 'jurnal'])->name('jurnal');
        Route::get('/keuangan', [BendaharaController::class, 'keuangan'])->name('keuangan');
    });

    // === ROUTE UNTUK SISWA ===
    Route::prefix('siswa')->name('siswa.')->group(function() {
        Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
        Route::get('/jurnal', [SiswaController::class, 'jurnal'])->name('jurnal');
        Route::get('/materi', [SiswaController::class, 'materi'])->name('materi');
        Route::get('/keuangan', [SiswaController::class, 'keuangan'])->name('p.keuangan');
    });

});
