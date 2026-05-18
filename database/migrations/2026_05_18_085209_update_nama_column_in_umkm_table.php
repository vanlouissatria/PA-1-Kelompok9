<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            // Ubah kolom 'nama' menjadi nullable jika belum
            if (Schema::hasColumn('umkm', 'nama')) {
                $table->string('nama')->nullable()->change();
            } else {
                $table->string('nama')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->string('nama')->nullable(false)->change();
        });
    }
};