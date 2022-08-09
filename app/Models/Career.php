<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = ([
        'field_am',
        'field_ru',
        'field_en',
        'field_image'
    ]);
}
