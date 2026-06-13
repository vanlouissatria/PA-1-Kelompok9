<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menghapus tabel 'umkms' (plural) — hasil dari migration
     * create_umkm_table.php yang salah nama tabel (seharusnya 'umkm').
     * Tabel ini kosong (0 rows), tidak terpakai oleh Model/Controller
     * aktif manapun. Fitur UMKM berjalan lewat tabel 'umkm' (singular).
     */
    public function up(): void
    {
        Schema::dropIfExists('umkms');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak di-recreate, tabel ini tidak terpakai.
    }
};