<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminGaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create() {
        return view('admin.galeri.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required',
            'gambar' => 'required|image|max:4096',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->judul);
        
        // PERBAIKAN: Jika form tidak punya checkbox status, paksa jadi 1 (Aktif)
        $input['status'] = $request->has('status') ? 1 : 1; 

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $input['gambar'] = 'data:' . $image->getMimeType() . ';base64,' . base64_encode(file_get_contents($image->getRealPath()));
        }

        Galeri::create($input);
        return redirect()->route('admin.galeri.index')->with('success', 'Berhasil disimpan!');
    }

    public function edit($id) {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id) {
        $galeri = Galeri::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required',
            'gambar' => 'nullable|image|max:4096',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        
        // PERBAIKAN: Gunakan nilai status dari request jika ada, jika tidak tetap 1
        $data['status'] = $request->has('status') ? 1 : 1;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $data['gambar'] = 'data:' . $image->getMimeType() . ';base64,' . base64_encode(file_get_contents($image->getRealPath()));
        } else {
            unset($data['gambar']);
        }

        $galeri->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Berhasil diupdate!');
    }

    public function destroy($id) {
        Galeri::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}