<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kontaks', function (Blueprint $table) {
            if (!Schema::hasColumn('kontaks', 'facebook')) {
                $table->string('facebook')->nullable()->after('instagram');
            }
            if (!Schema::hasColumn('kontaks', 'twitter')) {
                $table->string('twitter')->nullable()->after('facebook');
            }
            if (!Schema::hasColumn('kontaks', 'youtube')) {
                $table->string('youtube')->nullable()->after('twitter');
            }
            if (!Schema::hasColumn('kontaks', 'tiktok')) {
                $table->string('tiktok')->nullable()->after('youtube');
            }
        });
    }

    public function down(): void
    {
        Schema::table('kontaks', function (Blueprint $table) {
            if (Schema::hasColumn('kontaks', 'tiktok')) {
                $table->dropColumn('tiktok');
            }
            if (Schema::hasColumn('kontaks', 'youtube')) {
                $table->dropColumn('youtube');
            }
            if (Schema::hasColumn('kontaks', 'twitter')) {
                $table->dropColumn('twitter');
            }
            if (Schema::hasColumn('kontaks', 'facebook')) {
                $table->dropColumn('facebook');
            }
        });
    }
};
