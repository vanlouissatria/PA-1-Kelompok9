<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi', function (Blueprint $table) {
            // Cek apakah kolom kategori ada
            if (!Schema::hasColumn('informasi', 'kategori')) {
                $table->string('kategori')->default('tele')->after('id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('informasi', function (Blueprint $table) {
            if (Schema::hasColumn('informasi', 'kategori')) {
                $table->dropColumn('kategori');
            }
        });
    }
};