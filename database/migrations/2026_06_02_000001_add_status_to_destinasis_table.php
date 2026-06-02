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
        Schema::table('destinasis', function (Blueprint $table) {
            if (!Schema::hasColumn('destinasis', 'status')) {
                $table->boolean('status')->default(false)->after('gambar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinasis', function (Blueprint $table) {
            if (Schema::hasColumn('destinasis', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
