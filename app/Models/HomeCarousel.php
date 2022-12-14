<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCarousel extends Model
{
    use HasFactory;
    protected $fillable = ([
        'carousel_image',
        'carousel_image_title'
    ]);
}
