<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
{
    // HANYA data dengan kategori 'umum' (jika ada)
    // Atau kosongkan jika tidak ingin menampilkan apa-apa
    $informasi = Informasi::where('kategori', 'umum')
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);
    
    return view('pages.informasi', compact('informasi'));
}
}