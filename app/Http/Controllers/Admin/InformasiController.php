<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// GANTI NAMA KELAS DI SINI
class AdminInformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'urutan'  => 'required|integer|unique:informasi,urutan',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('informasi', 'public');
        }

        Informasi::create([
            'judul'  => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
            'urutan' => $request->urutan,
            // PASTIKAN CHECKBOX STATUS DICENTANG SAAT INPUT
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.informasi.index')->with('success', 'Berhasil!');
    }

    // ... sisa fungsi update dan destroy tetap sama, pastikan nama kelas di atas sudah berubah
}