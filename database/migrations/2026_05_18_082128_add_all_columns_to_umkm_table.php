<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pastikan tabel umkm ada
        if (!Schema::hasTable('umkm')) {
            Schema::create('umkm', function (Blueprint $table) {
                $table->id();
                $table->string('nama_usaha');
                $table->string('pemilik');
                $table->string('no_telepon');
                $table->string('kategori');
                $table->string('geosite');
                $table->text('alamat');
                $table->text('deskripsi');
                $table->string('foto_utama')->nullable();
                $table->string('nama')->nullable();
                $table->boolean('status')->default(1);
                $table->integer('urutan')->default(0);
                $table->timestamps();
            });
        } else {
            // Tambahkan kolom yang belum ada
            Schema::table('umkm', function (Blueprint $table) {
                if (!Schema::hasColumn('umkm', 'nama')) {
                    $table->string('nama')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'status')) {
                    $table->boolean('status')->default(1);
                }
                if (!Schema::hasColumn('umkm', 'urutan')) {
                    $table->integer('urutan')->default(0);
                }
                if (!Schema::hasColumn('umkm', 'alamat')) {
                    $table->text('alamat')->nullable();
                }
                if (!Schema::hasColumn('umkm', 'deskripsi')) {
                    $table->text('deskripsi')->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn(['nama', 'status', 'urutan']);
        });
    }
};