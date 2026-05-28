<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();  // kembali ke first(), bukan latest()
        return view('pages.kontak', compact('kontak'));
    }
}