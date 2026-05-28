<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::where('status', 1)
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('pages.informasi', compact('informasi'));
    }

    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('pages.informasi-detail', compact('informasi'));
    }
}