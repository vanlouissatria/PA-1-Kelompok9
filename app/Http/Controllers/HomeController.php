<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
// Model KoleksiFoto sudah dihapus dari sini

class HomeController extends Controller
{
    public function index()
    {
        // Hero Slider (Menggunakan path string statis langsung)
        $slide1 = 'assets/img/slide1.jpg';
        $slide2 = 'assets/img/slide2.jpg';
        $slide3 = 'assets/img/slide3.jpg';
        $slide4 = 'assets/img/slide4.jpg';
        $slide5 = 'assets/img/slide5.jpg';
        
        // About Image
        $aboutImage = 'assets/img/berita.jpg';
        
        // Destinasi Images Path
        $destinasiMeat = 'assets/img/meat-detail.jpg';
        $destinasiBatu = 'assets/img/batu-detail.jpg';
        $destinasiLiang = 'assets/img/liang-detail.jpg';
        
        // Data destinasi
        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'foto' => $destinasiMeat, // Sekarang berisi string path
                'lokasi' => 'Desa Tampahan, Kecamatan Tampahan, Kabupaten Toba',
                'deskripsi' => 'Desa Meat adalah desa wisata di tepi Danau Toba.',
                'tags' => ['Makam Raja Hunsa', 'Tari Tortor', 'Tenun Ulos'],
                'number' => '01'
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'foto' => $destinasiBatu, // Sekarang berisi string path
                'lokasi' => 'Desa Aek Bolon Jae, Balige',
                'deskripsi' => 'Situs batu bersejarah dengan nilai budaya Batak.',
                'tags' => ['Formasi Batuan Unik', 'Spot Fotografi'],
                'number' => '02'
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'foto' => $destinasiLiang, // Sekarang berisi string path
                'lokasi' => 'Hutagaol Peatalun, Balige',
                'deskripsi' => 'Gua alam dengan stalaktit dan stalakmit.',
                'tags' => ['Goa Alami', 'Caving'],
                'number' => '03'
            ],
        ];
        
        // Galeri tetap aktif menggunakan model Galeri (6 foto terbaru)
        $galeri = Galeri::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        return view('pages.home', compact('slide1', 'slide2', 'slide3', 'slide4', 'slide5', 'aboutImage', 'destinasi', 'galeri'));
    }
}