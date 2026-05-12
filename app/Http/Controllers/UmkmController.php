<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        $kategori = Umkm::where('status', true)
            ->select('kategori')
            ->distinct()
            ->get();
            
        return view('umkm.index', compact('umkms', 'kategori'));
    }

    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->increment('views');
        
        $umkmTerbaru = Umkm::where('status', true)
            ->where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();
            
        return view('umkm.show', compact('umkm', 'umkmTerbaru'));
    }

    public function filter(Request $request)
    {
        $query = Umkm::where('status', true);
        
        if($request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        
        if($request->search) {
            $query->where('nama_usaha', 'like', '%' . $request->search . '%');
        }
        
        $umkms = $query->paginate(12);
        $kategori = Umkm::where('status', true)->select('kategori')->distinct()->get();
        
        return view('umkm.index', compact('umkms', 'kategori'));
    }
}