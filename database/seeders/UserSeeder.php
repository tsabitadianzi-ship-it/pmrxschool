<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_lengkap'   => 'Dianzi',
            'nis_k'          => '000001',
            'tanggal_lahir'  => '1990-01-01',
            'alamat'         => 'Jl. Merdeka No. 1',
            'no_telp'        => '081234567890',
            'kelas'          => '-',
            'jenis_kelamin'  => 'Laki-laki',
            'alasan'         => 'Akun awal untuk pembina',
            'username'       => 'pembina',
            'password'       => bcrypt('123456'),
            'role'           => 'pembina',
            'status'         => 'active'
        ]);

        User::create([
            'nama_lengkap'   => 'Nelisah',
            'nis_k'          => '1234567890',
            'tanggal_lahir'  => '2006-06-06',
            'alamat'         => 'Jl. Melati No. 12',
            'no_telp'        => '081234567891',
            'kelas'          => 'XI RPL 3',
            'jenis_kelamin'  => 'Laki-laki',
            'alasan'         => 'Ikut kegiatan PMR',
            'username'       => 'nelisah',
            'password'       => bcrypt('123456'),
            'role'           => 'siswa',
            'status'         => 'active',
        ]);

        User::create([
            'nama_lengkap'   => 'Ringgit',
            'nis_k'          => '000002',
            'tanggal_lahir'  => '2005-05-05',
            'alamat'         => 'Jl. Anggrek No. 3',
            'no_telp'        => '081234567892',
            'kelas'          => 'XI RPL 2',
            'jenis_kelamin'  => 'Perempuan',
            'alasan'         => 'Mau berorganisasi',
            'username'       => 'Ringgit',
            'password'       => bcrypt('123456'),
            'role'           => 'sekertaris',
            'status'         => 'active',
        ]);

        User::create([
            'nama_lengkap'   => 'Bendahara PMR',
            'nis_k'          => '000003',
            'tanggal_lahir'  => '2005-04-04',
            'alamat'         => 'Jl. Kenanga No. 7',
            'no_telp'        => '081234567893',
            'kelas'          => 'XI RPL 1',
            'jenis_kelamin'  => 'Perempuan',
            'alasan'         => 'Belajar tanggung jawab',
            'username'       => 'bendahara',
            'password'       => bcrypt('123456'),
            'role'           => 'bendahara',
            'status'         => 'active',
        ]);
    }
}
