<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            // Tambahkan slug setelah judul
            $table->string('slug')->after('judul')->nullable();
            // Penting: Pastikan kolom gambar adalah longText untuk Base64
            $table->longText('gambar')->change(); 
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};