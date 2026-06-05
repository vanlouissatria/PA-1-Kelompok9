<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi; // Pastikan kamu sudah punya model Destinasi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDestinasiController extends Controller
{
    // Menampilkan daftar semua destinasi
    public function index()
    {
        $destinasi = Destinasi::latest()->paginate(10);
        return view('admin.destinasi.index', compact('destinasi'));
    }

    // Form tambah destinasi
    public function create()
    {
        return view('admin.destinasi.create');
    }

    // Simpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kategori' => 'required|in:alam,buatan,budaya',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Disimpan ke folder storage/app/public/destinasi
            $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        Destinasi::create($data);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    // Form edit data
    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('admin.destinasi.edit', compact('destinasi'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kategori' => 'required|in:alam,buatan,budaya',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($destinasi->gambar) {
                Storage::disk('public')->delete($destinasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        
        if ($destinasi->gambar) {
            Storage::disk('public')->delete($destinasi->gambar);
        }
        
        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}