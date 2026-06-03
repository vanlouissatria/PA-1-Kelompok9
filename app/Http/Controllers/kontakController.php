<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::where('status', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('pages.kontak', compact('kontaks'));
    }
}