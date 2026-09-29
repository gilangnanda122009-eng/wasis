<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $fillable = [
        'poster',
        'link',
        'is_active',
    ];

    protected $casts = [
        'is_active'=> 'boolean',
    ];
}
