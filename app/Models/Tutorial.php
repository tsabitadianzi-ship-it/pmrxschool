<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $table = 'tutorial';

    protected $fillable = [
        'judul',
        'tutor_pertama',
        'tutor_kedua',
        'tutor_ketiga',
        'tutor_keempat',
        'tutor_kelima',
        'tutor_keenam',
        'tutor_ketujuh',
        'tutor_kedelapan',
        'tutor_kesembilan',
        'tutor_kesepuluh'
    ];
}
