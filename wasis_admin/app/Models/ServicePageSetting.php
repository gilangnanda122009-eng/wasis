<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePageSetting extends Model
{
    protected $table = 'service_page_settings';

    protected $fillable = [
        'judul',
    ];
}