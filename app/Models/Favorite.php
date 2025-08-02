<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'item_id',
        'item_name',
        'item_category',
        'item_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 