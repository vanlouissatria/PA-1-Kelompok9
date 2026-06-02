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

        // Secara default, kontak baru diberi status aktif (true / 1)
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
            'status'   => true, 
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
     * Ubah status aktif/nonaktif via AJAX Fetch
     */
    public function toggleStatus($id)
    {
        try {
            $kontak = Kontak::findOrFail($id);
            
            // Membalikkan nilai boolean status (1 menjadi 0, atau 0 menjadi 1)
            $kontak->status = !$kontak->status;
            $kontak->save();

            return response()->json([
                'success' => true,
                'status' => $kontak->status
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status kontak.'
            ], 500);
        }
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