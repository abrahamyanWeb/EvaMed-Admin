<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeData extends Model
{
    use HasFactory;
    protected $fillable = ([
        'home_data_address_am',
        'home_data_address_ru',
        'home_data_address_en',
        'home_data_email',
        'home_data_tel',
        'home_data_face_link',
        'home_data_insta_link',
        'home_data_youtube_link'
    ]);
}
