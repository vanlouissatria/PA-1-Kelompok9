<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya tampilkan galeri yang BUKAN untuk Tele (kategori 'tele')
        // dan galeri dengan status aktif
        $galeri = Galeri::where('kategori', '!=', 'tele')
                        ->where('status', 1)
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
        
        return view('pages.galeri', compact('galeri'));
    }

    /**
     * Display the specified image.
     */
    public function showImage($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Increment views
        $galeri->increment('views');
        
        // Redirect ke halaman detail atau langsung ke gambar
        if ($galeri->gambar) {
            if (file_exists(public_path($galeri->gambar))) {
                return response()->file(public_path($galeri->gambar));
            } elseif (file_exists(public_path('storage/' . $galeri->gambar))) {
                return response()->file(public_path('storage/' . $galeri->gambar));
            }
        }
        
        abort(404);
    }

    /**
     * Show galeri detail by slug
     */
    public function show($slug)
    {
        $galeri = Galeri::where('slug', $slug)->firstOrFail();
        $galeri->increment('views');
        return view('pages.galeri-detail', compact('galeri'));
    }
}