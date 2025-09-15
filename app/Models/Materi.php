<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; //
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    // Tentukan nama tabel kalau tidak pakai default (plural dari nama model)
    protected $table = 'materi';

    // Field yang boleh diisi mass-assignment
    protected $fillable = [
        'tanggal',
        'judul',
        'isi',
    ];
}
