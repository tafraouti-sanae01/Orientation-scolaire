<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'inscription',
        'epreuve',
        'description',
        'filieres',
        'places',
        'conditions',
        'site',
        'status',
        'color',
    ];
}

