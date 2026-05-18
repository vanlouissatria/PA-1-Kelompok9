<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek apakah tabel umkm ada
        if (Schema::hasTable('umkm')) {
            // Tambah kolom jika belum ada
            Schema::table('umkm', function (Blueprint $table) {
                if (!Schema::hasColumn('umkm', 'nama_usaha')) {
                    $table->string('nama_usaha')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'pemilik')) {
                    $table->string('pemilik')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'no_telepon')) {
                    $table->string('no_telepon')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'kategori')) {
                    $table->string('kategori')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'geosite')) {
                    $table->string('geosite')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'alamat')) {
                    $table->text('alamat')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'deskripsi')) {
                    $table->text('deskripsi')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'foto_utama')) {
                    $table->string('foto_utama')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'status')) {
                    $table->boolean('status')->default(1);
                }
                if (!Schema::hasColumn('umkm', 'nama')) {
                    $table->string('nama')->nullable(); // Tambah kolom nama
                }
            });
        } else {
            // Buat tabel umkm jika belum ada
            Schema::create('umkm', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('nama_usaha');
                $table->string('pemilik');
                $table->string('no_telepon');
                $table->string('kategori');
                $table->string('geosite');
                $table->text('alamat');
                $table->text('deskripsi');
                $table->string('foto_utama')->nullable();
                $table->boolean('status')->default(1);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Jangan hapus tabel di sini jika migrasi lain yang buat
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn([
                'nama_usaha', 'pemilik', 'no_telepon', 
                'kategori', 'geosite', 'alamat', 'deskripsi', 
                'foto_utama', 'status', 'nama'
            ]);
        });
    }
};