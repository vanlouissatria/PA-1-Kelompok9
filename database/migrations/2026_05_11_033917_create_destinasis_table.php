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
    Schema::create('destinasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_destinasi');
        $table->enum('kategori', ['alam', 'buatan', 'budaya']); // Kategori yang kamu minta
        $table->string('lokasi');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasis');
    }
};
