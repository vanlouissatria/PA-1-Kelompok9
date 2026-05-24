<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UMKM;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use App\Models\Galeri;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeleController extends Controller
{
    public function index()
    {
        $umkmCount = UMKM::where('geosite', 'tele')->count();
        $fasilitasCount = Fasilitas::where('geosite', 'tele')->count();
        $penginapanCount = Penginapan::where('geosite', 'tele')->count();
        $galeriCount = Galeri::where('kategori', 'tele')->count();
        $informasiCount = Informasi::where('kategori', 'tele')->count();
        
        return view('admin.tele.index', compact('umkmCount', 'fasilitasCount', 'penginapanCount', 'galeriCount', 'informasiCount'));
    }

    // ==================== UMKM ====================
    public function umkm()
    {
        $umkm = UMKM::where('geosite', 'tele')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.umkm.index', compact('umkm'));
    }

    public function umkmCreate()
    {
        return view('admin.tele.umkm.create');
    }

    public function umkmStore(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required|string',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            $file->move(public_path('image/umkm'), $filename);
            $fotoPath = 'image/umkm/' . $filename;
        }

        UMKM::create([
            'nama_usaha' => $request->nama_usaha, // Disesuaikan, duplikasi kolom 'nama' dihapus
            'pemilik' => $request->pemilik,
            'no_telepon' => $request->no_telepon,
            'kategori' => $request->kategori,
            'geosite' => 'tele',
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto_utama' => $fotoPath,
            'status' => 1,
        ]);

        return redirect()->to('/admin/tele/umkm')->with('success', 'Data UMKM berhasil ditambahkan');
    }

    public function umkmEdit($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('admin.tele.umkm.edit', compact('umkm'));
    }

    public function umkmUpdate(Request $request, $id)
    {
        $umkm = UMKM::findOrFail($id);
        
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'kategori' => 'required|string',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string'
        ]);

        $data = [
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'no_telepon' => $request->no_telepon,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'geosite' => 'tele'
        ];

        if ($request->hasFile('foto_utama')) {
            if ($umkm->foto_utama && is_file(public_path($umkm->foto_utama))) {
                unlink(public_path($umkm->foto_utama));
            }
            
            $file = $request->file('foto_utama');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            $file->move(public_path('image/umkm'), $filename);
            $data['foto_utama'] = 'image/umkm/' . $filename;
        }

        $umkm->update($data);
        return redirect()->to('/admin/tele/umkm')->with('success', 'UMKM berhasil diperbarui');
    }

    public function umkmDestroy($id)
    {
        $umkm = UMKM::findOrFail($id);
        if ($umkm->foto_utama && is_file(public_path($umkm->foto_utama))) {
            unlink(public_path($umkm->foto_utama));
        }
        $umkm->delete();
        return redirect()->to('/admin/tele/umkm')->with('success', 'UMKM berhasil dihapus');
    }

    // ==================== FASILITAS ====================
    public function fasilitas()
    {
        $fasilitas = Fasilitas::where('geosite', 'tele')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.fasilitas.index', compact('fasilitas'));
    }

    public function fasilitasCreate()
    {
        return view('admin.tele.fasilitas.create');
    }

    public function fasilitasStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'nullable|numeric'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'geosite' => 'tele',
            'harga' => $request->harga,
            'status' => 1
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/fasilitas'))) {
                mkdir(public_path('image/fasilitas'), 0777, true);
            }
            
            $file->move(public_path('image/fasilitas'), $filename);
            $data['gambar'] = 'image/fasilitas/' . $filename;
        }

        Fasilitas::create($data);
        return redirect()->to('/admin/tele/fasilitas')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function fasilitasEdit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.tele.fasilitas.edit', compact('fasilitas'));
    }

    public function fasilitasUpdate(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'nullable|numeric'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'geosite' => 'tele'
        ];

        if ($request->hasFile('gambar')) {
            if ($fasilitas->gambar && is_file(public_path($fasilitas->gambar))) {
                unlink(public_path($fasilitas->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/fasilitas'))) {
                mkdir(public_path('image/fasilitas'), 0777, true);
            }
            
            $file->move(public_path('image/fasilitas'), $filename);
            $data['gambar'] = 'image/fasilitas/' . $filename;
        }

        $fasilitas->update($data);
        return redirect()->to('/admin/tele/fasilitas')->with('success', 'Fasilitas berhasil diperbarui');
    }

    public function fasilitasDestroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        if ($fasilitas->gambar && is_file(public_path($fasilitas->gambar))) {
            unlink(public_path($fasilitas->gambar));
        }
        $fasilitas->delete();
        return redirect()->to('/admin/tele/fasilitas')->with('success', 'Fasilitas berhasil dihapus');
    }

    // ==================== PENGINAPAN ====================
    public function penginapan()
    {
        $penginapan = Penginapan::where('geosite', 'tele')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.penginapan.index', compact('penginapan'));
    }

    public function penginapanCreate()
    {
        return view('admin.tele.penginapan.create');
    }

    public function penginapanStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'harga' => $request->harga,
            'geosite' => 'tele'
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/penginapan'))) {
                mkdir(public_path('image/penginapan'), 0777, true);
            }
            
            $file->move(public_path('image/penginapan'), $filename);
            $data['gambar'] = 'image/penginapan/' . $filename;
        }

        Penginapan::create($data);
        return redirect()->to('/admin/tele/penginapan')->with('success', 'Penginapan berhasil ditambahkan');
    }

    public function penginapanEdit($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        return view('admin.tele.penginapan.edit', compact('penginapan'));
    }

    public function penginapanUpdate(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'harga' => $request->harga,
            'geosite' => 'tele'
        ];

        if ($request->hasFile('gambar')) {
            if ($penginapan->gambar && is_file(public_path($penginapan->gambar))) {
                unlink(public_path($penginapan->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/penginapan'))) {
                mkdir(public_path('image/penginapan'), 0777, true);
            }
            
            $file->move(public_path('image/penginapan'), $filename);
            $data['gambar'] = 'image/penginapan/' . $filename;
        }

        $penginapan->update($data);
        return redirect()->to('/admin/tele/penginapan')->with('success', 'Penginapan berhasil diperbarui');
    }

    public function penginapanDestroy($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        if ($penginapan->gambar && is_file(public_path($penginapan->gambar))) {
            unlink(public_path($penginapan->gambar));
        }
        $penginapan->delete();
        return redirect()->to('/admin/tele/penginapan')->with('success', 'Penginapan berhasil dihapus');
    }

    // ==================== GALERI ====================
    public function galeri()
    {
        $galeri = Galeri::where('kategori', 'tele')->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.tele.galeri.index', compact('galeri'));
    }

    public function galeriCreate()
    {
        return view('admin.tele.galeri.create');
    }

    public function galeriStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slug = Str::slug($request->judul) . '-' . time() . '-' . rand(100, 999);
        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . rand(100, 999) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/galeri'))) {
                mkdir(public_path('image/galeri'), 0777, true);
            }
            
            $file->move(public_path('image/galeri'), $filename);
            $gambarPath = 'image/galeri/' . $filename;
        }

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'slug' => $slug,
            'kategori' => 'tele', // Kunci kategori agar tidak masuk ke halaman utama
            'status' => 1
        ]);

        return redirect()->to('/admin/tele/galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function galeriEdit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.tele.galeri.edit', compact('galeri'));
    }

    public function galeriUpdate(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => 'tele'
        ];

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && is_file(public_path($galeri->gambar))) {
                unlink(public_path($galeri->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . rand(100, 999) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/galeri'))) {
                mkdir(public_path('image/galeri'), 0777, true);
            }
            
            $file->move(public_path('image/galeri'), $filename);
            $data['gambar'] = 'image/galeri/' . $filename;
        }

        $galeri->update($data);
        return redirect()->to('/admin/tele/galeri')->with('success', 'Galeri berhasil diperbarui');
    }

    public function galeriDestroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar && is_file(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }
        $galeri->delete();
        return redirect()->to('/admin/tele/galeri')->with('success', 'Galeri berhasil dihapus');
    }

    // ==================== INFORMASI ====================
    public function informasi()
    {
        $informasi = Informasi::where('kategori', 'tele')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.informasi.index', compact('informasi'));
    }

    public function informasiCreate()  
    {
        return view('admin.tele.informasi.create');
    }

    public function informasiStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slug = Str::slug($request->judul) . '-' . round(microtime(true) * 1000) . '-' . rand(10, 99);
        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi,
            'kategori' => 'tele',
            'status' => 1,
            'slug' => $slug
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = round(microtime(true) * 1000) . '_' . rand(10, 99) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/informasi'))) {
                mkdir(public_path('image/informasi'), 0777, true);
            }
            
            $file->move(public_path('image/informasi'), $filename);
            $data['gambar'] = 'image/informasi/' . $filename;
        }

        Informasi::create($data);
        return redirect()->to('/admin/tele/informasi')->with('success', 'Informasi Tele berhasil ditambahkan');
    }

    public function informasiUpdate(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi,
            'kategori' => 'tele'
        ];

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar && is_file(public_path($informasi->gambar))) {
                unlink(public_path($informasi->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . rand(100, 999) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            if (!file_exists(public_path('image/informasi'))) {
                mkdir(public_path('image/informasi'), 0777, true);
            }
            
            $file->move(public_path('image/informasi'), $filename);
            $data['gambar'] = 'image/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->to('/admin/tele/informasi')->with('success', 'Informasi berhasil diperbarui');
    }

    public function informasiDestroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        if ($informasi->gambar && is_file(public_path($informasi->gambar))) {
            unlink(public_path($informasi->gambar));
        }
        $informasi->delete();
        return redirect()->to('/admin/tele/informasi')->with('success', 'Informasi berhasil dihapus');
    }
}