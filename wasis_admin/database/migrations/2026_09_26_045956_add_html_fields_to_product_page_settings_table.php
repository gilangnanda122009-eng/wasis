<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_page_settings', function (Blueprint $table) {
            $table->text('label_html')->nullable()->after('label');
            $table->text('judul_html')->nullable()->after('judul');
            $table->longText('deskripsi_html')->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('product_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'label_html',
                'judul_html',
                'deskripsi_html',
            ]);
        });
    }
};