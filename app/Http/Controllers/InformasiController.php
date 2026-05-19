<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('pages.informasi', compact('informasi'));
    }
}