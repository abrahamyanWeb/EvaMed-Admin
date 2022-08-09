<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ([
        'about_directory',
        'about_desc_am',
        'about_desc_ru',
        'about_desc_en',
        'about_image'
    ]);
}
