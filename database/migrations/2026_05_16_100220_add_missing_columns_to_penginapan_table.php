<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penginapan', function (Blueprint $table) {
            // Tambah kolom alamat jika belum ada
            if (!Schema::hasColumn('penginapan', 'alamat')) {
                $table->text('alamat')->nullable()->after('deskripsi');
            }
            
            // Tambah kolom no_telepon jika belum ada
            if (!Schema::hasColumn('penginapan', 'no_telepon')) {
                $table->string('no_telepon')->nullable()->after('alamat');
            }
            
            // Tambah kolom gambar jika belum ada
            if (!Schema::hasColumn('penginapan', 'gambar')) {
                $table->string('gambar')->nullable()->after('harga');
            }
            
            // Tambah kolom geosite jika belum ada
            if (!Schema::hasColumn('penginapan', 'geosite')) {
                $table->string('geosite')->nullable()->after('gambar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('penginapan', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'no_telepon', 'gambar', 'geosite']);
        });
    }
};