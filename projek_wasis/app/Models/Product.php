<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nomor',
        'nama',
        'gambar',
        'deskripsi',
        'fungsi',
        'manfaat',
        'dampak',

        'deskripsi_judul',
        'fungsi_judul',
        'manfaat_judul',
        'dampak_judul',

        'deskripsi_active',
        'fungsi_active',
        'manfaat_active',
        'dampak_active',

        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',

        'deskripsi_active' => 'boolean',
        'fungsi_active' => 'boolean',
        'manfaat_active' => 'boolean',
        'dampak_active' => 'boolean',
    ];
}