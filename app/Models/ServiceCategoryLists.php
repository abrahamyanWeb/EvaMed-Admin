<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryLists extends Model
{
    use HasFactory;
    protected $fillable = ([
        'service_category_list_am',
        'service_category_list_ru',
        'service_category_list_en',
        'service_category_list_unique',
    ]);
}
