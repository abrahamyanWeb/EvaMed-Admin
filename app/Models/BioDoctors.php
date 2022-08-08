<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioDoctors extends Model
{
    use HasFactory;
    protected $fillable = ([
        'doctor_unique',
        'doctor_bio_am',
        'doctor_bio_ru',
        'doctor_bio_en',
    ]);
}
