<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | DATA UTAMA
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('nomor')
                ->default(1)
                ->after('id');

            $table->string('nama')
                ->after('nomor');

            $table->string('gambar')
                ->nullable()
                ->after('nama');


            /*
            |--------------------------------------------------------------------------
            | DESKRIPSI
            |--------------------------------------------------------------------------
            */

            $table->string('deskripsi_judul')
                ->nullable()
                ->after('gambar');

            $table->longText('deskripsi')
                ->nullable()
                ->after('deskripsi_judul');

            $table->boolean('deskripsi_active')
                ->default(true)
                ->after('deskripsi');


            /*
            |--------------------------------------------------------------------------
            | FUNGSI
            |--------------------------------------------------------------------------
            */

            $table->string('fungsi_judul')
                ->nullable()
                ->after('deskripsi_active');

            $table->longText('fungsi')
                ->nullable()
                ->after('fungsi_judul');

            $table->boolean('fungsi_active')
                ->default(true)
                ->after('fungsi');


            /*
            |--------------------------------------------------------------------------
            | MANFAAT
            |--------------------------------------------------------------------------
            */

            $table->string('manfaat_judul')
                ->nullable()
                ->after('fungsi_active');

            $table->longText('manfaat')
                ->nullable()
                ->after('manfaat_judul');

            $table->boolean('manfaat_active')
                ->default(true)
                ->after('manfaat');


            /*
            |--------------------------------------------------------------------------
            | DAMPAK
            |--------------------------------------------------------------------------
            */

            $table->string('dampak_judul')
                ->nullable()
                ->after('manfaat_active');

            $table->longText('dampak')
                ->nullable()
                ->after('dampak_judul');

            $table->boolean('dampak_active')
                ->default(true)
                ->after('dampak');


            /*
            |--------------------------------------------------------------------------
            | STATUS OUR SERVICES
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_active')
                ->default(true)
                ->after('dampak_active');


            /*
            |--------------------------------------------------------------------------
            | INDEX
            |--------------------------------------------------------------------------
            */

            $table->index('nomor');
            $table->index('is_active');
        });
    }


    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {

            $table->dropIndex([
                'services_nomor_index'
            ]);

            $table->dropIndex([
                'services_is_active_index'
            ]);

            $table->dropColumn([
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
                'dampak',
                'dampak_active',

                'is_active',
            ]);
        });
    }
};