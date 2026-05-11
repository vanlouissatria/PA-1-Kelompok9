<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Tampilkan daftar informasi
     */
    public function index()
    {
        $informasi = Informasi::orderBy('urutan', 'asc')
            ->paginate(10);

        return view('admin.informasi.index', compact('informasi'));
    }

    /**
     * Form tambah informasi
     */
    public function create()
    {
        return view('admin.informasi.create');
    }

    /**
     * Simpan informasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'urutan'  => 'required|integer|unique:informasi,urutan',
        ]);

        $gambar = null;

        // upload gambar
        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('informasi', 'public');
        }

        // simpan data
        Informasi::create([
            'judul'  => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    /**
     * Form edit informasi
     */
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view('admin.informasi.edit', compact('informasi'));
    }

    /**
     * Update informasi
     */
    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'urutan'  => 'required|integer|unique:informasi,urutan,' . $id,
        ]);

        $gambar = $informasi->gambar;

        // jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if (
                $informasi->gambar &&
                Storage::disk('public')->exists($informasi->gambar)
            ) {

                Storage::disk('public')
                    ->delete($informasi->gambar);
            }

            // simpan gambar baru
            $gambar = $request->file('gambar')
                ->store('informasi', 'public');
        }

        // update data
        $informasi->update([
            'judul'  => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil diupdate');
    }

    /**
     * Hapus informasi
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        // hapus gambar
        if (
            $informasi->gambar &&
            Storage::disk('public')->exists($informasi->gambar)
        ) {

            Storage::disk('public')
                ->delete($informasi->gambar);
        }

        // hapus data
        $informasi->delete();

        return redirect()
            ->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }
}