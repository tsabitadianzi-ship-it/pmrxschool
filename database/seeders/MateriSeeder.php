<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Materi::create([
            'tanggal' => '2023-01-01',
            'judul'   => 'Materi 1',
            'isi'     => 'Isi materi 1',
            'file'    => 'file1.pdf',
        ]);

        Materi::create([
            'tanggal' => '2023-01-02',
            'judul'   => 'Materi 2',
            'isi'     => 'Isi materi 2',
            'file'    => 'file2.pdf',
        ]);
    }
}
