<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class adminkontakController extends Controller
{
    /**
     * Tampilkan semua data kontak
     */
    public function index()
    {
        $kontak = Kontak::latest()->get();
        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Form tambah kontak
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Simpan data kontak
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string',
            'alamat'   => 'required|string',
            'telepon1' => 'required|string',
            'email1'   => 'required|email',
            'telepon2' => 'nullable|string',
            'email2'   => 'nullable|email',
            'telepon3' => 'nullable|string',
            'email3'   => 'nullable|email',
            // subjudul (opsional) jika ada di form
            'subjudul' => 'nullable|string',
        ]);

        Kontak::create([
            'judul'    => $request->judul,
            'subjudul' => $request->subjudul,
            'alamat'   => $request->alamat,
            'telepon1' => $request->telepon1,
            'telepon2' => $request->telepon2,
            'telepon3' => $request->telepon3,
            'email1'   => $request->email1,
            'email2'   => $request->email2,
            'email3'   => $request->email3,
        ]);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil ditambahkan');
    }

    /**
     * Form edit kontak
     */
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update data kontak
     */
    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string',
            'alamat'   => 'required|string',
            'telepon1' => 'required|string',
            'email1'   => 'required|email',
            'telepon2' => 'nullable|string',
            'email2'   => 'nullable|email',
            'telepon3' => 'nullable|string',
            'email3'   => 'nullable|email',
            'subjudul' => 'nullable|string',
        ]);

        $kontak->update([
            'judul'    => $request->judul,
            'subjudul' => $request->subjudul,
            'alamat'   => $request->alamat,
            'telepon1' => $request->telepon1,
            'telepon2' => $request->telepon2,
            'telepon3' => $request->telepon3,
            'email1'   => $request->email1,
            'email2'   => $request->email2,
            'email3'   => $request->email3,
        ]);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil diupdate');
    }

    /**
     * Hapus kontak
     */
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil dihapus');
    }
}