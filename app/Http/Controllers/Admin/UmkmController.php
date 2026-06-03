<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkm = UMKM::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.umkm.index', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'kategori' => 'required|string',
            'geosite' => 'required|string|in:tele,efrata,sihotang',
            'foto_utama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string'
        ]);

        // Upload foto ke public/image/umkm (bukan storage)
        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            $file->move(public_path('image/umkm'), $filename);
            $fotoPath = 'image/umkm/' . $filename;
        } else {
            $fotoPath = null;
        }

        // Simpan ke database
        UMKM::create([
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'no_telepon' => $request->no_telepon,
            'kategori' => $request->kategori,
            'geosite' => $request->geosite,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto_utama' => $fotoPath,
            'status' => true
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(UMKM $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UMKM $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UMKM $umkm)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'kategori' => 'required|string',
            'geosite' => 'required|string|in:tele,efrata,sihotang',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string'
        ]);

        $data = [
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'no_telepon' => $request->no_telepon,
            'kategori' => $request->kategori,
            'geosite' => $request->geosite,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ];

        // Jika ada upload foto baru
        if ($request->hasFile('foto_utama')) {
            // Hapus foto lama
            if ($umkm->foto_utama && file_exists(public_path($umkm->foto_utama))) {
                unlink(public_path($umkm->foto_utama));
            }
            
            // Upload foto baru
            $file = $request->file('foto_utama');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('image/umkm'), $filename);
            $data['foto_utama'] = 'image/umkm/' . $filename;
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UMKM $umkm)
    {
        // Hapus file foto
        if ($umkm->foto_utama && file_exists(public_path($umkm->foto_utama))) {
            unlink(public_path($umkm->foto_utama));
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus');
    }
}