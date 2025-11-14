<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\Pembina_userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('pages.guest.guest');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/success', function () {
    return view('pages.guest.register_success');
})->name('register.success');

Route::get('/wa-test', function () {
    $response = Http::withHeaders([
        'Authorization' => env('FONNTE_API_KEY'),
    ])->post('https://api.fonnte.com/send', [
        'target' => '6285869579250', 
        'message' => 'Halo! Ini pesan percobaan dari Laravel ',
    ]);

    return $response->json();
});

Auth::routes([
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

// ROUTE SETELAH LOGIN
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ROUTE PEMBINA
    Route::prefix('pembina')->name('pembina.')->group(function () {
        Route::get('/dashboard', [PembinaController::class, 'index'])->name('dashboard');
        Route::get('/materi', [PembinaController::class, 'materi'])->name('materi');
        Route::get('/jurnal', [PembinaController::class, 'jurnal'])->name('jurnal');
        Route::get('/keuangan', [PembinaController::class, 'keuangan'])->name('keuangan');
        Route::get('/anggota', [PembinaController::class, 'anggota'])->name('anggota');

        // ROUTE PEMBINA (TABEL ANGGOTA)
        Route::resource('/pembina', Pembina_userController::class)->except(['show']);
        // ROUTE MATERI
        Route::get('/materi', [PembinaController::class, 'materi'])->name('materi');
        Route::get('/materi/{id}', [PembinaController::class, 'materiShow'])->name('materi.show');

        // ROUTE INFORMASI
        Route::resource('informasi', InformasiController::class);

        // ROUTE ANGGOTA
        Route::get('/anggota/{id}/detail', [PembinaController::class, 'showAnggota'])->name('anggota_detail');
        Route::post('/anggota/{id}/terima', [PembinaController::class, 'terimaAnggota'])->name('anggota.terima');
        Route::post('/anggota/{id}/tolak', [PembinaController::class, 'tolakAnggota'])->name('anggota.tolak');
        Route::delete('/anggota/{id}', [PembinaController::class, 'destroy'])->name('anggota.destroy');
        Route::get('/anggota/{id}/edit', [PembinaController::class, 'editAnggota'])->name('anggota_edit');
        Route::put('/anggota/{id}/update', [PembinaController::class, 'updateAnggota'])->name('anggota_update');

        //ROUTE NAIK KELAS
        Route::get('/pembina/update-kelas', [PembinaController::class, 'updateKelas'])->name('pangkat_kelas');

        // ROUTE PELAKSANAAN
        Route::get('/pelaksanaan-edit/{id}', [PembinaController::class, 'editPelaksanaan'])->name('pelaksanaan_edit');
        Route::put('/pelaksanaan-update/{id}', [PembinaController::class, 'updatePelaksanaan'])->name('pelaksanaan_update');

        // ROUTE TUTORIAL
        Route::get('/tutorial-edit/{id}', [PembinaController::class, 'EditTutorial'])->name('tutorial_edit');
        Route::put('/tutorial-update/{id}', [PembinaController::class, 'UpdateTutorial'])->name('tutorial_update');

    });

    // ROUTE SEKRETARIS
    Route::prefix('sekertaris')->name('sekertaris.')->group(function () {
        Route::get('/dashboard', [SekertarisController::class, 'index'])->name('dashboard');
        Route::resource('materi', MateriController::class);
        Route::resource('jurnal', JurnalController::class);
        Route::get('/keuangan', [SekertarisController::class, 'keuangan'])->name('keuangan');
    });

    // ROUTE BENDAHARA
    Route::prefix('bendahara')->name('bendahara.')->group(function () {
        Route::get('/dashboard', [BendaharaController::class, 'index'])->name('dashboard');
        Route::get('/materi', [BendaharaController::class, 'materi'])->name('materi');
        Route::get('/jurnal', [BendaharaController::class, 'jurnal'])->name('jurnal');
        Route::resource('keuangan', KeuanganController::class);

        // ROUTE MATERI
        Route::get('/materi', [BendaharaController::class, 'materi'])->name('materi');
        Route::get('/materi/{id}', [BendaharaController::class, 'materiShow'])->name('materi.show');
    });

    // ROUTE SISWA
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
        Route::get('/jurnal', [SiswaController::class, 'jurnal'])->name('jurnal');
        Route::get('/materi', [SiswaController::class, 'materi'])->name('materi');
        Route::get('/keuangan', [SiswaController::class, 'keuangan'])->name('keuangan');

        // ROUTE MATERI
        Route::get('/materi', [SiswaController::class, 'materi'])->name('materi');
        Route::get('/materi/{id}', [SiswaController::class, 'materiShow'])->name('materi.show');
    });

    // ROUTE PROFIL YANG BISA DI AKSES OLEH PEMBINA, SEKERTARIS DAN BENDAHARA
    Route::middleware(['auth'])->group(function () {
        Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('edit_profil');
        Route::post('/edit-profil', [ProfilController::class, 'update'])->name('update_profil');
    });
});
