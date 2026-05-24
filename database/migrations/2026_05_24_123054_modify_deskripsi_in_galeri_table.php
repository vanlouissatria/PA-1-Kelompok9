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
        Schema::table('galeri', function (Blueprint $table) {
            // Mengubah kolom deskripsi agar boleh kosong (nullable)
            // Serta memastikan kolom lain yang kamu pakai di Controller juga aman
            $table->text('deskripsi')->nullable()->change();
            $table->string('lokasi')->nullable()->change();
            $table->date('tanggal_foto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(false)->change();
            $table->string('lokasi')->nullable(false)->change();
            $table->date('tanggal_foto')->nullable(false)->change();
        });
    }
};