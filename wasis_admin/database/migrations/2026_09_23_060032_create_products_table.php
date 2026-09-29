<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('nomor');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('fungsi')->nullable();
            $table->text('manfaat')->nullable();
            $table->text('dampak')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};