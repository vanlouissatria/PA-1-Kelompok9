<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cek dulu supaya tidak dobel kalau dijalankan ulang
        User::updateOrCreate(
            ['email' => 'superadmin@geotoba.id'],
            [
                'name'     => 'Super Admin GeoToba',
                'password' => Hash::make('superadmin123#'),
                'role'     => 'superadmin',
            ]
        );
    }
}