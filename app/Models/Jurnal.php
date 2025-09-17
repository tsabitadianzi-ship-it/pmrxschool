<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $fillable = [
        'tanggal',
        'kegiatan',
        'waktu_mulai',
        'waktu_selesai',

    ];
}
