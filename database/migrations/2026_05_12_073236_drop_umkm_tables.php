<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('umkm_galeries');
        Schema::dropIfExists('umkms');
    }

    public function down()
    {
        // Tabel akan dibuat ulang di migration asli
    }
};