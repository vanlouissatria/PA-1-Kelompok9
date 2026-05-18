<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Tambah field yang kurang
            if (!Schema::hasColumn('umkms', 'nama_usaha')) {
                $table->string('nama_usaha')->after('id');
            }
            if (!Schema::hasColumn('umkms', 'pemilik')) {
                $table->string('pemilik')->after('nama_usaha');
            }
            if (!Schema::hasColumn('umkms', 'no_telepon')) {
                $table->string('no_telepon')->after('pemilik');
            }
            if (!Schema::hasColumn('umkms', 'geosite')) {
                $table->string('geosite')->after('kategori');
            }
            if (!Schema::hasColumn('umkms', 'alamat')) {
                $table->text('alamat')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('umkms', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('umkms', 'foto_utama')) {
                $table->string('foto_utama')->nullable()->after('deskripsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn(['nama_usaha', 'pemilik', 'no_telepon', 'geosite', 'alamat', 'deskripsi', 'foto_utama']);
        });
    }
};