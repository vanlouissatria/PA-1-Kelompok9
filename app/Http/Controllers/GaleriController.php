<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $allGaleri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();
        $galeriByKategori = $allGaleri->groupBy('kategori');
        return view('pages.galeri', compact('galeriByKategori'));
    }

    public function showImage($id)
    {
        $galeri = Galeri::findOrFail($id);
        $imageData = $galeri->gambar;

        if (empty($imageData)) {
            abort(404, 'Gambar tidak ditemukan');
        }

        // Jika data disimpan sebagai base64 (diawali "data:image")
        if (strpos($imageData, 'data:image') === 0) {
            // Pisahkan header dan data base64
            $parts = explode(',', $imageData, 2);
            $header = $parts[0];
            $encoded = $parts[1];
            // Ambil mime type
            preg_match('/data:([^;]+)/', $header, $matches);
            $mime = $matches[1] ?? 'image/jpeg';
            $binary = base64_decode($encoded);
            return response($binary)->header('Content-Type', $mime);
        }

        // Jika data sudah dalam bentuk binary
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_buffer($finfo, $imageData);
        finfo_close($finfo);
        if (!$mime) $mime = 'image/jpeg';
        return response($imageData)->header('Content-Type', $mime);
    }
}