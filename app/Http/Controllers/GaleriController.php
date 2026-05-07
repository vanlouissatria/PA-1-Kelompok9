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
     * Menampilkan gambar dari database (binary) via route
     * Ini adalah METHOD PALING PENTING untuk menampilkan foto yang tersimpan di database
     */
    public function showImage($id)
    {
        // Cari data galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Ambil data biner dari kolom 'gambar'
        $imageData = $galeri->gambar;

        // Jika data kosong, tampilkan error 404
        if (empty($imageData)) {
            abort(404, 'Gambar tidak ditemukan');
        }

        // Deteksi tipe MIME secara otomatis (jpg, png, gif, dll)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_buffer($finfo, $imageData);
        finfo_close($finfo);

        // Fallback jika deteksi gagal
        if (!$mimeType) {
            $mimeType = 'image/jpeg';
        }

        // Kembalikan response gambar dengan header yang benar
        return response($imageData)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=86400');
    }
}