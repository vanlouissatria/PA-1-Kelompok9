<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        // Hero Slider
        $slide1 = 'assets/img/slide1.jpg';
        $slide2 = 'assets/img/slide2.jpg';
        $slide3 = 'assets/img/slide3.jpg';
        $slide4 = 'assets/img/slide4.jpg';
        $slide5 = 'assets/img/slide5.jpg';

        // About Image
        $aboutImage = 'assets/img/berita.jpg';

        // Destinasi Images Path
        $destinasiTele = 'assets/img/tele.jpg';
        $destinasiEfrata = 'assets/img/efrata.jpg';
        $destinasiSihotang = 'assets/img/sihotang.jpg';
        $destinasiSibeabea = 'assets/img/sibeabea.jpg';
        $destinasiHolbung = 'assets/img/holbung.jpg';

        // Data destinasi
        $destinasi = [

            (object)[
                'slug' => 'tele',
                'nama' => 'Tele',
                'foto' => $destinasiTele,
                'lokasi' => 'Kecamatan Harian, Kabupaten Samosir',
                'deskripsi' => 'Menawarkan panorama Danau Toba dari ketinggian dengan pemandangan yang indah.',
                'tags' => ['View Danau Toba', 'Spot Foto', 'Wisata Alam'],
                'number' => '01'
            ],

            (object)[
                'slug' => 'air-terjun-efrata',
                'nama' => 'Air Terjun Efrata',
                'foto' => $destinasiEfrata,
                'lokasi' => 'Desa Sosor Dolok, Kabupaten Samosir',
                'deskripsi' => 'Air terjun terkenal di Samosir dengan suasana alam yang sejuk dan asri.',
                'tags' => ['Air Terjun', 'Wisata Alam', 'Fotografi'],
                'number' => '02'
            ],

            (object)[
                'slug' => 'sihotang',
                'nama' => 'Sihotang',
                'foto' => $destinasiSihotang,
                'lokasi' => 'Samosir, Sumatera Utara',
                'deskripsi' => 'Daerah wisata dengan keindahan alam dan budaya Batak yang masih terjaga.',
                'tags' => ['Budaya Batak', 'Danau Toba', 'Wisata Desa'],
                'number' => '03'
            ],

            (object)[
                'slug' => 'sibeabea',
                'nama' => 'Sibeabea',
                'foto' => $destinasiSibeabea,
                'lokasi' => 'Kabupaten Samosir',
                'deskripsi' => 'Destinasi wisata dengan pemandangan bukit dan jalan ikonik di kawasan Danau Toba.',
                'tags' => ['Bukit', 'Spot Foto', 'Pemandangan Alam'],
                'number' => '04'
            ],

            (object)[
                'slug' => 'holbung',
                'nama' => 'Bukit Holbung',
                'foto' => $destinasiHolbung,
                'lokasi' => 'Desa Janji Martahan, Kabupaten Samosir',
                'deskripsi' => 'Bukit hijau yang dikenal sebagai bukit teletubbies-nya Danau Toba.',
                'tags' => ['Bukit Hijau', 'Camping', 'Sunset'],
                'number' => '05'
            ],
        ];

        // Jumlah destinasi otomatis
        $jumlahDestinasi = count($destinasi);

        // Galeri (6 foto terbaru)
        $galeri = Galeri::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('pages.home', compact(
            'slide1',
            'slide2',
            'slide3',
            'slide4',
            'slide5',
            'aboutImage',
            'destinasi',
            'jumlahDestinasi',
            'galeri'
        ));
    }
}