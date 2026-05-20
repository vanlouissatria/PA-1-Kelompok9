<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class adminGaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        // Upload gambar
        $gambarPath = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/galeri'), $namaFile);

            $gambarPath = 'uploads/galeri/' . $namaFile;
        }

        Galeri::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->has('status') ? 1 : 0
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->has('status') ? 1 : 0
        ];

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
                unlink(public_path($galeri->gambar));
            }

            $file = $request->file('gambar');

            $namaFile = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/galeri'), $namaFile);

            $data['gambar'] = 'uploads/galeri/' . $namaFile;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diupdate!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar
        if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->status = !$galeri->status;

        $galeri->save();

        return response()->json([
            'success' => true,
            'status' => $galeri->status
        ]);
    }
}