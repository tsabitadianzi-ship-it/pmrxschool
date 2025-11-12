<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateKelasAnggota extends Command
{
    /**
     * Nama perintah yang bisa dipanggil.
     */
    protected $signature = 'anggota:update-kelas';

    /**
     * Deskripsi perintah.
     */
    protected $description = 'Perbarui kelas semua anggota aktif (10→11, 11→12, 12→alumni)';

    /**
     * Logika perintah.
     */
    public function handle()
    {
        // Ambil semua anggota aktif (bukan pembina)
        $users = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])
            ->where('status', 'active')
            ->get();

        $naik = 0;
        $lulus = 0;

        foreach ($users as $user) {
        $kelas = strtoupper(trim($user->kelas)); // pastikan huruf besar & hapus spasi

        if ($kelas == 'X') {
            $user->kelas = 'XI';
            $user->save();
            $naik++;
        } elseif ($kelas == 'XI') {
            $user->kelas = 'XII';
            $user->save();
            $naik++;
        } elseif ($kelas == 'XII') {
            $user->status = 'alumni';
            $user->save();
            $lulus++;
        }
    }


        $this->info("Kelas berhasil diperbarui! ($naik naik kelas, $lulus jadi alumni)");
    }
}
