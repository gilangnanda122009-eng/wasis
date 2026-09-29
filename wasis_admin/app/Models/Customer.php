<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'is_active',
    ];

    protected $casts = [

        'is_active'=>'boolean',
    ];
}