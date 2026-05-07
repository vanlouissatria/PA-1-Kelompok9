<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;

class GeositeController extends Controller
{
    /**
     * Halaman Geosite Tele
     */
    public function tele()
    {
        $umkm = Umkm::where('status', 1)->orderBy('urutan')->get();

        $fasilitas = Fasilitas::where('status', 1)
            ->orderBy('urutan')
            ->get();

        $penginapan = Penginapan::where('status', 1)
            ->orderBy('urutan')
            ->get();

        return view('geosite.tele', compact(
            'umkm',
            'fasilitas',
            'penginapan'
        ));
    }

    /**
     * Halaman Geosite Efrata
     */
    public function efrata()
    {
        $umkm = Umkm::where('status', 1)->orderBy('urutan')->get();

        $fasilitas = Fasilitas::where('status', 1)
            ->orderBy('urutan')
            ->get();

        $penginapan = Penginapan::where('status', 1)
            ->orderBy('urutan')
            ->get();

        return view('geosite.efrata', compact(
            'umkm',
            'fasilitas',
            'penginapan'
        ));
    }

    /**
     * Halaman Geosite Sihotang
     */
    public function sihotang()
    {
        $umkm = Umkm::where('status', 1)->orderBy('urutan')->get();

        $fasilitas = Fasilitas::where('status', 1)
            ->orderBy('urutan')
            ->get();

        $penginapan = Penginapan::where('status', 1)
            ->orderBy('urutan')
            ->get();

        return view('geosite.sihotang', compact(
            'umkm',
            'fasilitas',
            'penginapan'
        ));
    }
}