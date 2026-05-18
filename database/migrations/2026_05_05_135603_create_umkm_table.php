<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm');
            $table->string('no_umkm')->unique();
            $table->enum('kategori', ['Kuliner', 'Fashion', 'Kerajinan', 'Pertanian', 'Jasa', 'Lainnya']);
            $table->enum('halaman', ['tele', 'efrata', 'sihotang']);
            $table->string('foto_umkm')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};