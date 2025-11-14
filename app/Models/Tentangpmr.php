<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentangpmr extends Model
{
    protected $table = 'tentangpmr';

    protected $fillable = [
        'judul',
        'isi',
    ];
}
