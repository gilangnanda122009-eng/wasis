<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'product_page_settings',
            function (Blueprint $table) {

                $table->boolean('label_active')
                    ->default(true)
                    ->after('label');

                $table->boolean('judul_active')
                    ->default(true)
                    ->after('judul');

                $table->boolean('deskripsi_active')
                    ->default(true)
                    ->after('deskripsi');
            }
        );
    }


    public function down(): void
    {
        Schema::table(
            'product_page_settings',
            function (Blueprint $table) {

                $table->dropColumn([
                    'label_active',
                    'judul_active',
                    'deskripsi_active',
                ]);
            }
        );
    }
};