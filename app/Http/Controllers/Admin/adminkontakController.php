<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    /**
     * Tampilkan semua data kontak menggunakan pagination
     */
    public function index()
    {
        // Diubah dari get() ke paginate(10) agar links() di Blade terbaca
        $kontak = Kontak::latest()->paginate(10);
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
     * Simpan data kontak baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string',
            'subjudul'   => 'nullable|string',
            'alamat'     => 'nullable|string',
            'kode_pos'   => 'nullable|string',
            'instagram'  => 'nullable|string',
            'facebook'   => 'nullable|string',
            'tiktok'     => 'nullable|string',
            'twitter'    => 'nullable|string',
            'youtube'    => 'nullable|string',
            'maps'       => 'nullable|string',
            'telepon1'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'telepon2'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'telepon3'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'email1'     => 'nullable|email',
            'email2'     => 'nullable|email',
            'email3'     => 'nullable|email',
        ]);

        Kontak::create([
            'judul'      => $request->judul,
            'subjudul'   => $request->subjudul,
            'alamat'     => $request->alamat,
            'kode_pos'   => $request->kode_pos,
            'instagram'  => $request->instagram,
            'facebook'   => $request->facebook,
            'tiktok'     => $request->tiktok,
            'twitter'    => $request->twitter,
            'youtube'    => $request->youtube,
            'maps'       => $request->maps,
            'telepon1'   => $request->telepon1,
            'telepon2'   => $request->telepon2,
            'telepon3'   => $request->telepon3,
            'email1'     => $request->email1,
            'email2'     => $request->email2,
            'email3'     => $request->email3,
            'status'     => true,
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
            'judul'      => 'required|string',
            'subjudul'   => 'nullable|string',
            'alamat'     => 'nullable|string',
            'kode_pos'   => 'nullable|string',
            'instagram'  => 'nullable|string',
            'facebook'   => 'nullable|string',
            'tiktok'     => 'nullable|string',
            'twitter'    => 'nullable|string',
            'youtube'    => 'nullable|string',
            'maps'       => 'nullable|string',
            'telepon1'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'telepon2'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'telepon3'   => ['nullable', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'email1'     => 'nullable|email',
            'email2'     => 'nullable|email',
            'email3'     => 'nullable|email',
            'status'     => 'nullable|boolean',
        ]);

        $kontak->update([
            'judul'      => $request->judul,
            'subjudul'   => $request->subjudul,
            'alamat'     => $request->alamat,
            'kode_pos'   => $request->kode_pos,
            'instagram'  => $request->instagram,
            'facebook'   => $request->facebook,
            'tiktok'     => $request->tiktok,
            'twitter'    => $request->twitter,
            'youtube'    => $request->youtube,
            'maps'       => $request->maps,
            'telepon1'   => $request->telepon1,
            'telepon2'   => $request->telepon2,
            'telepon3'   => $request->telepon3,
            'email1'     => $request->email1,
            'email2'     => $request->email2,
            'email3'     => $request->email3,
            'status'     => $request->boolean('status'),
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