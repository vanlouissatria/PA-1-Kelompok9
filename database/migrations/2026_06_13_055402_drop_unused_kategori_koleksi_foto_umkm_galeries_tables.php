<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menghapus 3 tabel yang tidak terpakai sama sekali di kode
     * (tidak ada Controller, View, atau Route yang merujuk ke Model-nya):
     * - kategori        : master data kategori, tidak pernah diimplementasikan
     *                      (tabel berita tidak memiliki kolom kategori_id)
     * - koleksi_fotos   : rancangan penyimpanan foto sebagai BLOB,
     *                      tidak pernah diimplementasikan (project memakai path file)
     * - umkm_galeries   : tidak memiliki migration pembuat, tidak terpakai
     */
    public function up(): void
    {
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('koleksi_fotos');
        Schema::dropIfExists('umkm_galeries');
    }

    /**
     * Reverse the migrations.
     *
     * Catatan: tabel-tabel ini TIDAK di-recreate di rollback karena
     * strukturnya sudah usang dan tidak digunakan oleh Model manapun.
     */
    public function down(): void
    {
        // Tidak ada aksi rollback untuk tabel yang sudah tidak terpakai.
    }
};