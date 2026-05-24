<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk mengubah kolom menjadi nullable.
     */
    public function up(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            // Mengubah kolom deskripsi agar boleh kosong (nullable)
            $table->text('deskripsi')->nullable()->change();
        });
    }

    /**
     * Kembalikan perubahan jika migrasi di-rollback.
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            // Mengembalikan kolom deskripsi menjadi wajib diisi
            $table->text('deskripsi')->nullable(false)->change();
        });
    }
};