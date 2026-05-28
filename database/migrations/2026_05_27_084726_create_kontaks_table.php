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
       Schema::create('kontaks', function (Blueprint $table) {
    $table->id();
    $table->string('judul')->nullable();
    $table->string('subjudul')->nullable();

    $table->text('alamat')->nullable();

    $table->string('telepon1')->nullable();
    $table->string('telepon2')->nullable();
    $table->string('telepon3')->nullable();

    $table->string('email1')->nullable();
    $table->string('email2')->nullable();
    $table->string('email3')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
