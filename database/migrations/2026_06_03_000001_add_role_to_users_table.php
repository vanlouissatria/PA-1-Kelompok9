<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // role hanya 2 nilai: 'superadmin' atau 'admin'
            // default 'admin' supaya user lama otomatis jadi admin biasa
            $table->enum('role', ['superadmin', 'admin'])
                  ->default('admin')
                  ->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};