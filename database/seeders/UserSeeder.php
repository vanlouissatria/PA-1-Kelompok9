<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function 
    run()
    {
        // Cek apakah sudah ada, jika belum buat
        User::firstOrCreate(
            ['email' => 'teleefratasihotanggeosite@gmail.com'],
            [
                'name' => 'Admin GeoToba',
                'password' => Hash::make('calderatoba19#'),
            ]
        );
    }
}