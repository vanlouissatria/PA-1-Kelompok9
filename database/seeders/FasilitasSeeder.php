<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    public function run()
    {
        DB::table('fasilitas')->insert([
            [
                'nama' => 'Menara Pandang',
                'deskripsi' => 'Menara setinggi 25 meter dengan pemandangan 360° Danau Toba',
                'gambar' => 'image/fasilitas/menara.jpg',
                'harga' => 15000,
                'status' => 1,
                'urutan' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Restoran & Warung Makan',
                'deskripsi' => 'Menikmati makanan khas Batak dengan view danau',
                'gambar' => 'image/fasilitas/restoran.jpg',
                'harga' => null,
                'status' => 1,
                'urutan' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Area Parkir',
                'deskripsi' => 'Parkir luas untuk mobil dan motor',
                'gambar' => 'image/fasilitas/parkir.jpg',
                'harga' => 5000,
                'status' => 1,
                'urutan' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toilet Umum',
                'deskripsi' => 'Toilet bersih dan terawat',
                'gambar' => 'image/fasilitas/toilet.jpg',
                'harga' => 3000,
                'status' => 1,
                'urutan' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Skywalk',
                'deskripsi' => 'Jembatan kaca untuk spot foto instagramable',
                'gambar' => 'image/fasilitas/skywalk.jpg',
                'harga' => 10000,
                'status' => 1,
                'urutan' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}