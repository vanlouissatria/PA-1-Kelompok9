<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin GeoToba',
            'email' => 'teleefratasihotanggeosite@gmail.com',
            'password' => Hash::make('tele123'), // Ganti dengan password yang Anda inginkan
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}