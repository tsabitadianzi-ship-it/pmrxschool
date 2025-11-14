<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutorial;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tutorial::create([
            'judul' => 'Tutorial',
            'tutor_pertama' => 'Klik tombol Daftar di kanan atas halaman.',
            'tutor_kedua' => 'Isi formulir pendaftaran dengan data diri yang lengkap.',
            'tutor_ketiga' => 'Periksa kembali data kamu, lalu klik Kirim.',
            'tutor_keempat' => 'Tunggu konfirmasi dari pembina PMR yang akan dikirim via Whatsapp.',
            'tutor_kelima' => 'Setelah mendapat konfirmasi, klik tombol Login untuk masuk ke akun kamu.',
        ]);
    }
}
