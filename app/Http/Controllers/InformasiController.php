<?php

namespace App\Http\Controllers;

use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index()
    {
        // Hanya ambil data yang statusnya 1
        $informasiList = Informasi::where('status', 1)
            ->orderBy('urutan', 'asc')
            ->get();

        return view('pages.informasi', compact('informasiList'));
    }
}