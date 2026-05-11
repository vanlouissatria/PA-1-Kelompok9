<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // --- KODE YANG BARU KAMU MASUKKAN MULAI DI SINI ---

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar) {
                Storage::delete('public/' . $informasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        if ($informasi->gambar) {
            Storage::delete('public/' . $informasi->gambar);
        }
        $informasi->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Data berhasil dihapus!');
    }
}