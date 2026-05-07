<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik (stacking cards)
     */
    public function index()
    {
        // Ambil semua data galeri yang status aktif
        $allGaleri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kelompokkan berdasarkan kolom 'kategori' di database
        $galeriByKategori = $allGaleri->groupBy('kategori');

        return view('pages.galeri', compact('galeriByKategori'));
    }

    /**
     * Menampilkan gambar dari database (mendukung format base64 maupun binary)
     */
    public function showImage($id)
    {
        // Cari data galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Ambil data gambar dari kolom 'gambar'
        $imageData = $galeri->gambar;

        if (empty($imageData)) {
            abort(404, 'Gambar tidak ditemukan');
        }

        // Cek apakah data disimpan dalam format base64 (diawali dengan "data:image")
        if (is_string($imageData) && strpos($imageData, 'data:image') === 0) {
            // Format: data:image/jpeg;base64,xxxxx...
            list($header, $encoded) = explode(',', $imageData, 2);
            // Ekstrak MIME type dari header (misal: image/jpeg)
            preg_match('/data:([^;]+)/', $header, $matches);
            $mimeType = $matches[1] ?? 'image/jpeg';
            // Decode base64 menjadi binary
            $binaryData = base64_decode($encoded);
        } else {
            // Data sudah dalam bentuk binary
            $binaryData = $imageData;
            // Deteksi MIME type menggunakan fileinfo
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_buffer($finfo, $binaryData);
            finfo_close($finfo);
            if (!$mimeType) {
                $mimeType = 'image/jpeg';
            }
        }

        // Kembalikan response gambar dengan header yang benar
        return response($binaryData)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=86400');
    }
}