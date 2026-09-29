<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('deskripsi_judul')
                ->default('DESKRIPSI');

            $table->boolean('deskripsi_active')
                ->default(true);

            $table->string('fungsi_judul')
                ->default('FUNGSI');

            $table->boolean('fungsi_active')
                ->default(true);

            $table->string('manfaat_judul')
                ->default('MANFAAT');

            $table->boolean('manfaat_active')
                ->default(true);

            $table->string('dampak_judul')
                ->default('DAMPAK');

            $table->boolean('dampak_active')
                ->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'deskripsi_judul',
                'deskripsi_active',
                'fungsi_judul',
                'fungsi_active',
                'manfaat_judul',
                'manfaat_active',
                'dampak_judul',
                'dampak_active',
            ]);

        });
    }
};