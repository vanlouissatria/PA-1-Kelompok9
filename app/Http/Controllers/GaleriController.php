<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        // Mengambil data yang statusnya 1
        $galeris = Galeri::where('status', 1)->latest()->get();
        
        return view('pages.galeri', compact('galeris'));
    }

    public function showImage($id)
{
    $galeri = Galeri::findOrFail($id);
    $imageData = $galeri->gambar;

    if (empty($imageData)) {
        abort(404);
    }

    // Pastikan jika data sudah mengandung header 'data:image/...'
    if (strpos($imageData, 'data:image') === 0) {
        $parts = explode(',', $imageData, 2);
        $header = $parts[0];
        $encodedData = $parts[1];

        // Ambil Mime Type
        preg_match('/data:([^;]+)/', $header, $matches);
        $mime = $matches[1] ?? 'image/jpeg';

        return response(base64_decode($encodedData))->header('Content-Type', $mime);
    }
    
    // Jika data disimpan dalam bentuk binary murni
    return response($imageData)->header('Content-Type', 'image/jpeg');
}
}
