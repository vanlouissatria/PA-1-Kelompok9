<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);

        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $gambar = null;

        // upload gambar
        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('informasi', 'public');
        }

        Informasi::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $gambar = $informasi->gambar;

        // upload gambar baru
        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($informasi->gambar &&
                Storage::disk('public')->exists($informasi->gambar)) {

                Storage::disk('public')->delete($informasi->gambar);
            }

            $gambar = $request->file('gambar')
                ->store('informasi', 'public');
        }

        $informasi->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        // hapus gambar
        if ($informasi->gambar &&
            Storage::disk('public')->exists($informasi->gambar)) {

            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }
}