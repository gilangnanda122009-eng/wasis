<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_page_settings', function (Blueprint $table) {
            $table->id();

            $table->string('label')
                ->default('WASIS TECHNOLOGY');

            $table->string('judul')
                ->default('Aplikasi yang Kami Buat');

            $table->text('deskripsi')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_page_settings');
    }
};