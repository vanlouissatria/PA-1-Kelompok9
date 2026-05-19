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

    public function sibeaBea()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'sibea-bea')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'sibea-bea')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'sibea-bea')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'sibea-bea')->get();
        $informasi = Informasi::where('status', 1)->where('kategori', 'sibea-bea')->orderBy('created_at', 'desc')->get();

        return view('geosite.sibea', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }

    public function bea()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'bea')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'bea')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'bea')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'bea')->get();
        $informasi = Informasi::where('status', 1)->where('kategori', 'bea')->orderBy('created_at', 'desc')->get();

        return view('geosite.bea', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }

    public function holbung()
    {
        $umkm = Umkm::where('status', 1)->where('geosite', 'holbung')->orderBy('urutan')->get();
        $fasilitas = Fasilitas::where('status', 1)->where('geosite', 'holbung')->get();
        $penginapan = Penginapan::where('status', 1)->where('geosite', 'holbung')->get();
        $galeri = Galeri::where('status', 1)->where('kategori', 'holbung')->get();
        $informasi = Informasi::where('status', 1)->where('kategori', 'holbung')->orderBy('created_at', 'desc')->get();

        return view('geosite.holbung', compact('umkm', 'fasilitas', 'penginapan', 'galeri', 'informasi'));
    }
}