<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPageSetting extends Model
{
    protected $table = 'product_page_settings';

    protected $fillable = [
        'label',
        'label_html',

        'judul',
        'judul_html',

        'deskripsi',
        'deskripsi_html',

        'label_active',
        'judul_active',
        'deskripsi_active',
    ];

    protected $casts = [
        'label_active' => 'boolean',
        'judul_active' => 'boolean',
        'deskripsi_active' => 'boolean',
    ];
}