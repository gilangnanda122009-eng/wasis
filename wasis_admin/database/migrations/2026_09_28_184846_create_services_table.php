<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Hubungan ke Aplikasi Kami
            |--------------------------------------------------------------------------
            | Hanya digunakan untuk tombol "LIHAT SELENGKAPNYA".
            | Data OUR SERVICES lainnya tetap berdiri sendiri.
            |
            */
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Data Utama OUR SERVICES
            |--------------------------------------------------------------------------
            */
            $table->unsignedInteger('nomor')->default(1);
            $table->string('nama');

            /*
            |--------------------------------------------------------------------------
            | Gambar OUR SERVICES
            |--------------------------------------------------------------------------
            */
            $table->string('gambar')->nullable();

            /*
            |--------------------------------------------------------------------------
            | DESKRIPSI
            |--------------------------------------------------------------------------
            */
            $table->string('deskripsi_judul')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->boolean('deskripsi_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | FUNGSI
            |--------------------------------------------------------------------------
            */
            $table->string('fungsi_judul')->nullable();
            $table->longText('fungsi')->nullable();
            $table->boolean('fungsi_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | MANFAAT
            |--------------------------------------------------------------------------
            */
            $table->string('manfaat_judul')->nullable();
            $table->longText('manfaat')->nullable();
            $table->boolean('manfaat_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | DAMPAK
            |--------------------------------------------------------------------------
            */
            $table->string('dampak_judul')->nullable();
            $table->longText('dampak')->nullable();
            $table->boolean('dampak_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | Status OUR SERVICES
            |--------------------------------------------------------------------------
            */
            $table->boolean('is_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | Urutan & waktu
            |--------------------------------------------------------------------------
            */
            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Index
            |--------------------------------------------------------------------------
            */
            $table->index('nomor');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};