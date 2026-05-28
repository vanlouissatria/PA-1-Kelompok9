<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class adminInformasiController extends Controller
{
    public function index()
    {
        // Menambahkan properti urutan sesuai kebutuhan kolom tabel index
        $informasi = Informasi::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }
    
    public function create()
    {
        return view('admin.informasi.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'nullable|boolean'
        ]);
        
        try {
            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $namaFile = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/informasi'), $namaFile);
                $gambarPath = 'uploads/informasi/' . $namaFile;
            }
            
            Informasi::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'konten' => $request->konten,
                'urutan' => $request->urutan ?? 0, // Mengakomodasi field urutan
                'gambar' => $gambarPath,
                'status' => $request->has('status') ? 1 : 0
            ]);
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
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
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'nullable|boolean'
        ]);
        
        try {
            $data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'konten' => $request->konten,
                'urutan' => $request->urutan ?? 0, // Mengakomodasi field urutan
                'status' => $request->has('status') ? 1 : 0
            ];
            
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
                    unlink(public_path($informasi->gambar));
                }
                
                $file = $request->file('gambar');
                $namaFile = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/informasi'), $namaFile);
                $data['gambar'] = 'uploads/informasi/' . $namaFile;
            }
            
            $informasi->update($data);
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi "' . $request->judul . '" berhasil diupdate!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function destroy($id)
    {
        try {
            $informasi = Informasi::findOrFail($id);
            
            // Hapus file gambar jika ada
            if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
                unlink(public_path($informasi->gambar));
            }
            
            $informasi->delete();
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    /**
     * PERBAIKAN UTAMA: Mengubah fungsi toggleStatus agar merespon AJAX JSON secara real-time
     */
    public function toggleStatus($id)
    {
        try {
            $informasi = Informasi::findOrFail($id);
            
            // Balik nilai status (0 jadi 1, 1 jadi 0)
            $informasi->status = $informasi->status ? 0 : 1;
            $informasi->save();
            
            // Mengembalikan response berupa JSON, bukan redirect back
            return response()->json([
                'success' => true,
                'status' => $informasi->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status.'
            ], 500);
        }
    }
}