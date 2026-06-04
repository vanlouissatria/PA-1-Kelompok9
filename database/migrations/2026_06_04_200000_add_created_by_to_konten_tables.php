<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Tabel konten yang perlu kolom created_by
    private array $tables = [
        'galeri',
        'umkm',
        'fasilitas',
        'penginapan',
        'destinasis',
        'warisans',
        'informasi',
    ];

    public function up(): void
    {
        foreach ($this->tables as $tabel) {
            Schema::table($tabel, function (Blueprint $table) use ($tabel) {
                if (!Schema::hasColumn($tabel, 'created_by')) {
                    $table->unsignedBigInteger('created_by')
                          ->nullable()
                          ->after('id')
                          ->comment('ID admin yang membuat data ini');

                    $table->foreign('created_by')
                          ->references('id')
                          ->on('users')
                          ->nullOnDelete(); // kalau admin dihapus, data konten tidak ikut terhapus
                }
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $tabel) {
            Schema::table($tabel, function (Blueprint $table) use ($tabel) {
                if (Schema::hasColumn($tabel, 'created_by')) {
                    $table->dropForeign([$tabel . '_created_by_foreign']);
                    $table->dropColumn('created_by');
                }
            });
        }
    }
};