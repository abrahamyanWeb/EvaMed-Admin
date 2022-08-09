<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCurrent extends Model
{
    use HasFactory;
    protected $fillable = ([
        'news_current_title_am',
        'news_current_title_ru',
        'news_current_title_en',
        'news_current_desc_am',
        'news_current_desc_ru',
        'news_current_desc_en',
        'news_current_unique',
        'news_current_image',
    ]);
}
