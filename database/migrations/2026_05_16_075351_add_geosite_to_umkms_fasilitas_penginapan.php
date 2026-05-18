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
        // 1. Tambah kolom geosite ke tabel umkms
        if (Schema::hasTable('umkms')) {
            Schema::table('umkms', function (Blueprint $table) {
                if (!Schema::hasColumn('umkms', 'geosite')) {
                    $table->string('geosite')->nullable()->after('id');
                }
            });
        }

        // 2. Tambah kolom geosite ke tabel fasilitas
        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                if (!Schema::hasColumn('fasilitas', 'geosite')) {
                    $table->string('geosite')->nullable()->after('id');
                }
            });
        }

        // 3. Tambah kolom geosite ke tabel penginapan
        if (Schema::hasTable('penginapan')) {
            Schema::table('penginapan', function (Blueprint $table) {
                if (!Schema::hasColumn('penginapan', 'geosite')) {
                    $table->string('geosite')->nullable()->after('id');
                }
            });
        }

        // 4. Tambah kolom kategori ke tabel informasi (perbaikan)
        if (Schema::hasTable('informasi')) {
            Schema::table('informasi', function (Blueprint $table) {
                if (!Schema::hasColumn('informasi', 'kategori')) {
                    // Cek apakah kolom 'isi' ada, jika tidak gunakan 'after' dengan kolom yang ada
                    if (Schema::hasColumn('informasi', 'isi')) {
                        $table->string('kategori')->nullable()->after('isi');
                    } else if (Schema::hasColumn('informasi', 'konten')) {
                        $table->string('kategori')->nullable()->after('konten');
                    } else if (Schema::hasColumn('informasi', 'deskripsi')) {
                        $table->string('kategori')->nullable()->after('deskripsi');
                    } else {
                        $table->string('kategori')->nullable();
                    }
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom geosite
        if (Schema::hasTable('umkms')) {
            Schema::table('umkms', function (Blueprint $table) {
                if (Schema::hasColumn('umkms', 'geosite')) {
                    $table->dropColumn('geosite');
                }
            });
        }

        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                if (Schema::hasColumn('fasilitas', 'geosite')) {
                    $table->dropColumn('geosite');
                }
            });
        }

        if (Schema::hasTable('penginapan')) {
            Schema::table('penginapan', function (Blueprint $table) {
                if (Schema::hasColumn('penginapan', 'geosite')) {
                    $table->dropColumn('geosite');
                }
            });
        }

        // Hapus kolom kategori
        if (Schema::hasTable('informasi')) {
            Schema::table('informasi', function (Blueprint $table) {
                if (Schema::hasColumn('informasi', 'kategori')) {
                    $table->dropColumn('kategori');
                }
            });
        }
    }
};