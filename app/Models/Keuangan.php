<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    // Tentukan nama tabel kalau tidak pakai default (plural dari nama model)
    protected $table = 'keuangan';

    // Field yang boleh diisi mass-assignment
    protected $fillable = [
        'tanggal',
        'tipe',
        'keterangan',
        'jumlah',
        'total'
    ];
}
