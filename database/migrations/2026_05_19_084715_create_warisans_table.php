<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warisans', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->enum('jenis', [
                'geodiversity',
                'biodiversity',
                'cultural_diversity'
            ]);
            $table->text('deskripsi');
            $table->longText('gambar')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warisans');
    }
};