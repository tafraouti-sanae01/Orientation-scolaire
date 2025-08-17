<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignSchool extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'is_free',
        'description',
        'website',
        'email',
        'phone',
        'address',
        'type',
        'admission_requirements',
        'language_requirements',
        'image'
    ];

    protected $casts = [
        'is_free' => 'boolean',
    ];
}