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
        Schema::table('umkm', function (Blueprint $table) {
            // Cek dan tambah kolom satu per satu
            if (!Schema::hasColumn('umkm', 'nama_usaha')) {
                $table->string('nama_usaha')->after('id');
            }
            
            if (!Schema::hasColumn('umkm', 'pemilik')) {
                $table->string('pemilik')->after('nama_usaha');
            }
            
            if (!Schema::hasColumn('umkm', 'no_telepon')) {
                $table->string('no_telepon')->after('pemilik');
            }
            
            if (!Schema::hasColumn('umkm', 'kategori')) {
                $table->string('kategori')->after('no_telepon');
            }
            
            if (!Schema::hasColumn('umkm', 'geosite')) {
                $table->string('geosite')->nullable()->after('kategori');
            }
            
            if (!Schema::hasColumn('umkm', 'alamat')) {
                $table->text('alamat')->after('geosite');
            }
            
            if (!Schema::hasColumn('umkm', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('alamat');
            }
            
            if (!Schema::hasColumn('umkm', 'foto_utama')) {
                $table->string('foto_utama')->nullable()->after('deskripsi');
            }
            
            if (!Schema::hasColumn('umkm', 'status')) {
                $table->boolean('status')->default(1)->after('foto_utama');
            }
            
            if (!Schema::hasColumn('umkm', 'urutan')) {
                $table->integer('urutan')->default(0)->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $columns = ['nama_usaha', 'pemilik', 'no_telepon', 'kategori', 'geosite', 
                       'alamat', 'deskripsi', 'foto_utama', 'status', 'urutan'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('umkm', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};