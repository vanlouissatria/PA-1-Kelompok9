<?php

namespace App\Http\Controllers;

use App\Models\Warisan;

class WarisanController extends Controller
{
    public function index()
    {
        $geodiversity = Warisan::where('jenis', 'geodiversity')
                               ->where('status', 1)
                               ->orderBy('urutan')->get();

        $biodiversity = Warisan::where('jenis', 'biodiversity')
                               ->where('status', 1)
                               ->orderBy('urutan')->get();

        $cultural_diversity = Warisan::where('jenis', 'cultural_diversity')
                                     ->where('status', 1)
                                     ->orderBy('urutan')->get();

        return view('pages.warisan', compact(
            'geodiversity',
            'biodiversity',
            'cultural_diversity'
        ));
    }
}