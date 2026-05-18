<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenginapanSeeder extends Seeder
{
    public function run()
    {
        DB::table('penginapans')->insert([
            [
                'nama' => 'Homestay Tele Indah',
                'deskripsi' => 'Homestay dengan pemandangan langsung ke Danau Toba. Kamar nyaman dengan fasilitas lengkap.',
                'gambar' => 'image/penginapan/homestay-tele.jpg',
                'harga' => 200000,
                'alamat' => 'Desa Turpuk Limbong, Samosir',
                'no_telepon' => '081234567890',
                'status' => 1,
                'urutan' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toba View Cottage',
                'deskripsi' => 'Cottage dengan balkon pribadi menghadap danau. Fasilitas AC, TV, dan sarapan.',
                'gambar' => 'image/penginapan/toba-view.jpg',
                'harga' => 350000,
                'alamat' => 'Kawasan Tele, Samosir',
                'no_telepon' => '081234567891',
                'status' => 1,
                'urutan' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Samosir Hill Resort',
                'deskripsi' => 'Resort dengan kolam renang dan restoran. View terbaik ke Danau Toba.',
                'gambar' => 'image/penginapan/samosir-resort.jpg',
                'harga' => 500000,
                'alamat' => 'Pangururan, Samosir',
                'no_telepon' => '081234567892',
                'status' => 1,
                'urutan' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}