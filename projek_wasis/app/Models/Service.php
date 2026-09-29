<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'nomor',
        'nama',
        'gambar',

        'deskripsi_judul',
        'deskripsi',
        'deskripsi_active',

        'fungsi_judul',
        'fungsi',
        'fungsi_active',

        'manfaat_judul',
        'manfaat',
        'manfaat_active',

        'dampak_judul',
        'dampak_active',
        'dampak',

        'is_active',
    ];

    protected $casts = [
        'deskripsi_active' => 'boolean',
        'fungsi_active' => 'boolean',
        'manfaat_active' => 'boolean',
        'dampak_active' => 'boolean',
        'is_active' => 'boolean',
    ];
}