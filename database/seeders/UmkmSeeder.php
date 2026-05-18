<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    public function run()
    {
        // Data UMKM 1
        DB::table('umkms')->insert([
            'nama_usaha' => 'Keripik Salak Toba',
            'pemilik' => 'Ibu Rosita',
            'kategori' => 'Makanan',
            'deskripsi' => 'Keripik salak renyah khas Danau Toba, rasa manis dan gurih. Terbuat dari salak lokal pilihan.',
            'alamat' => 'Desa Turpuk Limbong, Kec. Harian, Kab. Samosir',
            'no_telepon' => '081234567890',
            'email' => 'keripiksalak@gmail.com',
            'website' => null,
            'logo' => 'image/umkm/logo-keripik.jpg',
            'foto_utama' => 'image/umkm/keripik-salak.jpg',
            'latitude' => null,
            'longitude' => null,
            'status' => 1,
            'urutan' => 1,
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data UMKM 2
        DB::table('umkms')->insert([
            'nama_usaha' => 'Ulos Tenun Batak',
            'pemilik' => 'Bapak Mangatas',
            'kategori' => 'Kerajinan',
            'deskripsi' => 'Kain ulos asli tenunan tangan masyarakat Batak. Tersedia berbagai motif dan ukuran.',
            'alamat' => 'Kawasan Tele, Kec. Harian, Kab. Samosir',
            'no_telepon' => '081234567891',
            'email' => 'ulostenun@gmail.com',
            'website' => null,
            'logo' => 'image/umkm/logo-ulos.jpg',
            'foto_utama' => 'image/umkm/ulos.jpg',
            'latitude' => null,
            'longitude' => null,
            'status' => 1,
            'urutan' => 2,
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data UMKM 3
        DB::table('umkms')->insert([
            'nama_usaha' => 'Kopi Arabika Sidikalang',
            'pemilik' => 'Bapak Tiopan',
            'kategori' => 'Minuman',
            'deskripsi' => 'Kopi arabika asli dataran tinggi Sidikalang dengan cita rasa khas dan aroma yang kuat.',
            'alamat' => 'Sekitar Menara Pandang Tele',
            'no_telepon' => '081234567892',
            'email' => 'kopisidikalang@gmail.com',
            'website' => null,
            'logo' => 'image/umkm/logo-kopi.jpg',
            'foto_utama' => 'image/umkm/kopi.jpg',
            'latitude' => null,
            'longitude' => null,
            'status' => 1,
            'urutan' => 3,
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data UMKM 4
        DB::table('umkms')->insert([
            'nama_usaha' => 'Gantungan Kunci Khas Toba',
            'pemilik' => 'Ibu Lastri',
            'kategori' => 'Kerajinan',
            'deskripsi' => 'Souvenir gantungan kunci miniatur rumah Batak, ulos mini, dan ikon Danau Toba.',
            'alamat' => 'Desa Turpuk Limbong',
            'no_telepon' => '081234567893',
            'email' => 'souvenir@gmail.com',
            'website' => null,
            'logo' => null,
            'foto_utama' => 'image/umkm/gantungan.jpg',
            'latitude' => null,
            'longitude' => null,
            'status' => 1,
            'urutan' => 4,
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}