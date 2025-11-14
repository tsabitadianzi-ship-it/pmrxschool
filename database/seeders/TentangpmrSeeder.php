<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tentangpmr;
class TentangpmrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tentangpmr::create([
            'judul' => 'Pengertian',
            'isi' => 'PMR adalah unit kegiatan yang berfokus pada pelayanan kesehatan di lingkungan sekolah. 
            Kami menyediakan pertolongan pertama, edukasi kesehatan, dan kegiatan sosial kemanusiaan 
            untuk menumbuhkan rasa empati serta tanggung jawab sosial siswa.'
        ]);
        Tentangpmr::create([
            'judul' => 'Kegiatan Rutin dan Pelatihan',
            'isi' => 'Kami rutin mengadakan pelatihan pertolongan pertama (P3K), donor darah, simulasi evakuasi 
            bencana, dan penyuluhan kesehatan. Anggota juga aktif dalam kegiatan sosial seperti bakti lingkungan 
            dan pendidikan kesehatan dan kunjungan kemanusiaan.'
        ]);
        Tentangpmr::create([
            'judul' => 'Manfaat Bergabung',
            'isi' => 'Bergabung dengan PMR tidak hanya mengajarkan keterampilan hidup, tetapi juga melatih empati,
             kepemimpinan, dan rasa tanggung jawab sosial. Setiap anggota diajarkan untuk menjadi pribadi yang 
             peduli, disiplin, dan tangguh.'
        ]);
    }
}
