<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ([
        'news_title_am',
        'news_title_ru',
        'news_title_en',
        'news_desc_am',
        'news_desc_ru',
        'news_desc_en',
        'news_unique',
        'news_image',
    ]);
}
