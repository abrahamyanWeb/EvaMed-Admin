<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $fillable = ([
        'service_category_am',
        'service_category_ru',
        'service_category_en',
        'service_current_category'
    ]);
}
