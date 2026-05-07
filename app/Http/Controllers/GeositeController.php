<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;

class GeositeController extends Controller
{
    // Method yang sudah ada sebelumnya
    public function meat()
    {
        $umkm = Umkm::where('status', 1)->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->orderBy('urutan')->get();
        $penginapan = Penginapan::where('status', 1)->orderBy('urutan')->get();
        
        return view('geosite.meat', compact('umkm', 'fasilitas', 'penginapan'));
    }
    
    public function batuBahisan()
    {
        return view('geosite.batu-bahisan');
    }
    
    public function liangSipege()
    {
        return view('geosite.liang-sipege');
    }

    // ========== METHOD YANG DITAMBAHKAN UNTUK ROUTE GEOSITE ==========
    
    /**
     * Menampilkan halaman Geosite Tele
     */
    public function tele()
    {
        // Sesuaikan lokasi file blade, misal: resources/views/pages/tele.blade.php
        // atau resources/views/geosite/tele.blade.php
        return view('pages.tele'); // atau 'geosite.tele' sesuai struktur folder Anda
    }

    /**
     * Menampilkan halaman Geosite Efrata
     */
    public function efrata()
    {
        return view('pages.efrata');
    }

    /**
     * Menampilkan halaman Geosite Sihotang
     */
    public function sihotang()
    {
        return view('pages.sihotang');
    }
}