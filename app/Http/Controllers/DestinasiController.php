<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    // Halaman utama destinasi (semua kategori)
    public function index()
    {
        $destinasi = Destinasi::where('status', true)
            ->latest()
            ->get();

        return view('destinasi.index', compact('destinasi'));
    }
    
    // Destinasi Alam
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.';

        $items = \App\Models\Destinasi::where('kategori', 'alam')
                    ->where('status', true)
                    ->latest()
                    ->get();

        $destinasi = $items->map(function($d){
            $gambar = $d->gambar;
            if ($gambar && !str_starts_with($gambar, 'http') && !str_starts_with($gambar, 'data:')) {
                $gambar = asset('storage/'.$gambar);
            }

            return (object)[
                'id' => $d->id,
                'nama' => $d->nama_destinasi,
                'lokasi' => $d->lokasi,
                'deskripsi' => $d->deskripsi,
                'gambar' => $gambar ?? asset('image/default.jpg'),
                'tags' => property_exists($d, 'tags') && is_array($d->tags) ? $d->tags : [],
                'url' => url('/admin/destinasi/'.$d->id)
            ];
        });

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // Destinasi Buatan
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Destinasi wisata buatan manusia yang menjadi ikon dan daya tarik wisata di kawasan Danau Toba.';

        $items = \App\Models\Destinasi::where('kategori', 'buatan')
                    ->where('status', true)
                    ->latest()
                    ->get();

        $destinasi = $items->map(function($d){
            $gambar = $d->gambar;
            if ($gambar && !str_starts_with($gambar, 'http') && !str_starts_with($gambar, 'data:')) {
                $gambar = asset('storage/'.$gambar);
            }

            return (object)[
                'id' => $d->id,
                'nama' => $d->nama_destinasi,
                'lokasi' => $d->lokasi,
                'deskripsi' => $d->deskripsi,
                'gambar' => $gambar ?? asset('image/default.jpg'),
                'tags' => property_exists($d, 'tags') && is_array($d->tags) ? $d->tags : [],
                'url' => url('/admin/destinasi/'.$d->id)
            ];
        });

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // Destinasi Budaya
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Destinasi wisata budaya yang menampilkan kearifan lokal, adat istiadat, dan warisan leluhur Batak Toba.';

        $items = \App\Models\Destinasi::where('kategori', 'budaya')
                    ->where('status', true)
                    ->latest()
                    ->get();

        $destinasi = $items->map(function($d){
            $gambar = $d->gambar;
            if ($gambar && !str_starts_with($gambar, 'http') && !str_starts_with($gambar, 'data:')) {
                $gambar = asset('storage/'.$gambar);
            }

            return (object)[
                'id' => $d->id,
                'nama' => $d->nama_destinasi,
                'lokasi' => $d->lokasi,
                'deskripsi' => $d->deskripsi,
                'gambar' => $gambar ?? asset('image/default.jpg'),
                'tags' => property_exists($d, 'tags') && is_array($d->tags) ? $d->tags : [],
                'url' => url('/admin/destinasi/'.$d->id)
            ];
        });

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
}