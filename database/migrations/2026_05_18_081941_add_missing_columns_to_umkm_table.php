<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            // Cek apakah kolom 'nama' ada, jika tidak tambahkan
            if (!Schema::hasColumn('umkm', 'nama')) {
                $table->string('nama')->nullable();
            }
            
            // Cek apakah kolom 'status' ada
            if (!Schema::hasColumn('umkm', 'status')) {
                $table->boolean('status')->default(1);
            }
            
            // Cek apakah kolom 'urutan' ada
            if (!Schema::hasColumn('umkm', 'urutan')) {
                $table->integer('urutan')->default(0);
            }
            
            // Cek apakah kolom 'geosite' ada
            if (!Schema::hasColumn('umkm', 'geosite')) {
                $table->enum('geosite', ['tele', 'efrata', 'sihotang'])->default('tele');
            }
        });
    }

    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn(['nama', 'status', 'urutan', 'geosite']);
        });
    }
};