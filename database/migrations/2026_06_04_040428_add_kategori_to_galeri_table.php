<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('galeri', function (Blueprint $table) {
            // Menambahkan kolom kategori setelah kolom judul
            $table->string('kategori')->after('judul')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
