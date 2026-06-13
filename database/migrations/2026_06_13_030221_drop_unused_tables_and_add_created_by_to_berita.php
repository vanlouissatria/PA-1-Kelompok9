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
        // 1. Hapus tabel-tabel sampah/duplikat yang tidak terpakai di Model/Controller
        Schema::dropIfExists('categories');
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('beritas');
        Schema::dropIfExists('informasis');
        Schema::dropIfExists('penginapans');

        // 2. Tambahkan kolom created_by ke tabel berita (relasi ke users)
        Schema::table('berita', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->after('id');

            $table->foreign('created_by')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback: hapus kolom created_by dari berita
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });

        // Catatan: tabel categories, galeris, beritas, informasis, penginapans
        // TIDAK di-recreate di sini karena strukturnya sudah usang/duplikat
        // dan tidak ada Model yang menggunakannya. Jika rollback diperlukan
        // untuk mengembalikan tabel-tabel ini, jalankan migration aslinya
        // secara manual.
    }
};