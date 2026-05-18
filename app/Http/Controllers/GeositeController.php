<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use App\Models\Galeri;
use App\Models\Informasi;

class GeositeController extends Controller
{
    public function tele()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'tele')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'tele')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'tele')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'tele')->get();
     $informasi = Informasi::where('status', 1)->where('kategori', 'tele')->orderBy('created_at', 'desc')->get();
        return view('geosite.tele', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }

    public function efrata()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'efrata')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'efrata')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'efrata')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'efrata')->get();
        $informasi = Informasi::where('status', 1)->where('kategori', 'efrata')->orderBy('created_at', 'desc')->get();

        return view('geosite.efrata', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }

    public function sihotang()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'sihotang')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'sihotang')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'sihotang')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'sihotang')->get();
        $informasi = Informasi::where('status', 1)->where('kategori', 'sihotang')->orderBy('created_at', 'desc')->get();

        return view('geosite.sihotang', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }
}