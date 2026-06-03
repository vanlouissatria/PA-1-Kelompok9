<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kontaks', function (Blueprint $table) {
            if (!Schema::hasColumn('kontaks', 'instagram')) {
                $table->string('instagram')->nullable()->after('email3');
            }
            if (!Schema::hasColumn('kontaks', 'kode_pos')) {
                $table->string('kode_pos')->nullable()->after('instagram');
            }
            if (!Schema::hasColumn('kontaks', 'maps')) {
                $table->text('maps')->nullable()->after('kode_pos');
            }
        });
    }

    public function down()
    {
        Schema::table('kontaks', function (Blueprint $table) {
            if (Schema::hasColumn('kontaks', 'maps')) {
                $table->dropColumn('maps');
            }
            if (Schema::hasColumn('kontaks', 'kode_pos')) {
                $table->dropColumn('kode_pos');
            }
            if (Schema::hasColumn('kontaks', 'instagram')) {
                $table->dropColumn('instagram');
            }
        });
    }
};
