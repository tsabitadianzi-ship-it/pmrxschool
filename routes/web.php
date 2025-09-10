<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pembina', [PembinaController::class, 'index'])->name('pembina.dashboard');
    Route::get('/sekertaris', [SekertarisController::class, 'index'])->name('sekertaris.dashboard');
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.dashboard');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
