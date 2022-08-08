<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDoctors extends Model
{
    use HasFactory;
    protected $fillable = ([
        'doctor_name_am',
        'doctor_name_ru',
        'doctor_name_en',
        'doctor_type_am',
        'doctor_type_ru',
        'doctor_type_en',
        'doctor_unique',
        'doctor_image'
    ]);
}
