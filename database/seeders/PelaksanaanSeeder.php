<?php

namespace Database\Seeders;

use App\Models\Pelaksanaan;
use Illuminate\Database\Seeder;

class PelaksanaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelaksanaan::create([
            'hari' => 'Senin',
            'jam' => '16:00:00',
        ]);
    }
}
