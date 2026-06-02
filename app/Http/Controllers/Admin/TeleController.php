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
    protected function ensureGeosite(string $geosite)
    {
        $valid = ['tele', 'efrata', 'sihotang', 'sibea-bea', 'holbung'];
        if (!in_array($geosite, $valid)) {
            abort(404);
        }

        return $geosite;
    }

    protected function geositeTitle(string $geosite): string
    {
        return ucwords(str_replace('-', ' ', $geosite));
    }

    protected function geositeOptions(): array
    {
        return [
            'tele' => 'Tele',
            'efrata' => 'Efrata',
            'sihotang' => 'Sihotang',
            'sibea-bea' => 'Sibea Bea',
            'holbung' => 'Holbung',
        ];
    }

    public function index($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);

        $umkmCount = UMKM::where('geosite', $geosite)->count();
        $fasilitasCount = Fasilitas::where('geosite', $geosite)->count();
        $penginapanCount = Penginapan::where('geosite', $geosite)->count();
        $galeriCount = Galeri::where('kategori', $geosite)->count();
        $informasiCount = Informasi::where('kategori', $geosite)->count();
        
        return view('admin.tele.index', compact('umkmCount', 'fasilitasCount', 'penginapanCount', 'galeriCount', 'informasiCount', 'geosite', 'geositeTitle'));
    }

    // ==================== UMKM ====================
    public function umkm($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $umkm = UMKM::where('geosite', $geosite)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.umkm.index', compact('umkm', 'geosite', 'geositeTitle'));
    }

    public function umkmCreate($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $geositeOptions = $this->geositeOptions();
        return view('admin.tele.umkm.create', compact('geosite', 'geositeTitle', 'geositeOptions'));
    }

    public function umkmStore(Request $request, $geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $selectedGeosite = $this->ensureGeosite($request->input('geosite', $geosite));
        $request->validate([
            'geosite' => 'required|string|in:tele,efrata,sihotang,sibea-bea,holbung',
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
            'geosite' => $selectedGeosite,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto_utama' => $fotoPath,
            'status' => 1,
        ]);

        return redirect()->to('/admin/geosite/' . $selectedGeosite . '/umkm')->with('success', 'Data UMKM berhasil ditambahkan');
    }

    public function umkmEdit($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $umkm = UMKM::findOrFail($id);
        return view('admin.tele.umkm.edit', compact('umkm', 'geosite', 'geositeTitle'));
    }

    public function umkmUpdate(Request $request, $geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'kategori' => 'required|string',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string'
        ]);

        $umkm = UMKM::findOrFail($id);
        $data = [
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'no_telepon' => $request->no_telepon,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'geosite' => $geosite
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
        return redirect()->to('/admin/geosite/' . $geosite . '/umkm')->with('success', 'UMKM berhasil diperbarui');
    }

    public function umkmDestroy($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $umkm = UMKM::findOrFail($id);
        if ($umkm->foto_utama && is_file(public_path($umkm->foto_utama))) {
            unlink(public_path($umkm->foto_utama));
        }
        $umkm->delete();
        return redirect()->to('/admin/geosite/' . $geosite . '/umkm')->with('success', 'UMKM berhasil dihapus');
    }

    // ==================== FASILITAS ====================
    public function fasilitas($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $fasilitas = Fasilitas::where('geosite', $geosite)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.fasilitas.index', compact('fasilitas', 'geosite', 'geositeTitle'));
    }

    public function fasilitasCreate($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $geositeOptions = $this->geositeOptions();
        return view('admin.tele.fasilitas.create', compact('geosite', 'geositeTitle', 'geositeOptions'));
    }

    public function fasilitasStore(Request $request, $geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $selectedGeosite = $this->ensureGeosite($request->input('geosite', $geosite));
        $request->validate([
            'geosite' => 'required|string|in:tele,efrata,sihotang,sibea-bea,holbung',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'nullable|numeric'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'geosite' => $selectedGeosite,
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
        return redirect()->to('/admin/geosite/' . $selectedGeosite . '/fasilitas')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function fasilitasEdit($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.tele.fasilitas.edit', compact('fasilitas', 'geosite', 'geositeTitle'));
    }

    public function fasilitasUpdate(Request $request, $geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
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
            'geosite' => $geosite
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
        return redirect()->to('/admin/geosite/' . $geosite . '/fasilitas')->with('success', 'Fasilitas berhasil diperbarui');
    }

    public function fasilitasDestroy($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $fasilitas = Fasilitas::findOrFail($id);
        if ($fasilitas->gambar && is_file(public_path($fasilitas->gambar))) {
            unlink(public_path($fasilitas->gambar));
        }
        $fasilitas->delete();
        return redirect()->to('/admin/geosite/' . $geosite . '/fasilitas')->with('success', 'Fasilitas berhasil dihapus');
    }

    // ==================== PENGINAPAN ====================
    public function penginapan($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $penginapan = Penginapan::where('geosite', $geosite)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.penginapan.index', compact('penginapan', 'geosite', 'geositeTitle'));
    }

    public function penginapanCreate($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $geositeOptions = $this->geositeOptions();
        return view('admin.tele.penginapan.create', compact('geosite', 'geositeTitle', 'geositeOptions'));
    }

    public function penginapanStore(Request $request, $geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $selectedGeosite = $this->ensureGeosite($request->input('geosite', $geosite));
        $request->validate([
            'geosite' => 'required|string|in:tele,efrata,sihotang,sibea-bea,holbung',
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
            'geosite' => $selectedGeosite
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
        return redirect()->to('/admin/geosite/' . $selectedGeosite . '/penginapan')->with('success', 'Penginapan berhasil ditambahkan');
    }

    public function penginapanEdit($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $penginapan = Penginapan::findOrFail($id);
        return view('admin.tele.penginapan.edit', compact('penginapan', 'geosite', 'geositeTitle'));
    }

    public function penginapanUpdate(Request $request, $geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
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
            'geosite' => $geosite
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
        return redirect()->to('/admin/geosite/' . $geosite . '/penginapan')->with('success', 'Penginapan berhasil diperbarui');
    }

    public function penginapanDestroy($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $penginapan = Penginapan::findOrFail($id);
        if ($penginapan->gambar && is_file(public_path($penginapan->gambar))) {
            unlink(public_path($penginapan->gambar));
        }
        $penginapan->delete();
        return redirect()->to('/admin/geosite/' . $geosite . '/penginapan')->with('success', 'Penginapan berhasil dihapus');
    }

    // ==================== GALERI ====================
    public function galeri($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $galeri = Galeri::where('kategori', $geosite)->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.tele.galeri.index', compact('galeri', 'geosite', 'geositeTitle'));
    }

    public function galeriCreate($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $geositeOptions = $this->geositeOptions();
        return view('admin.tele.galeri.create', compact('geosite', 'geositeTitle', 'geositeOptions'));
    }

    public function galeriStore(Request $request, $geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $selectedGeosite = $this->ensureGeosite($request->input('geosite', $geosite));
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
            'kategori' => $selectedGeosite,
            'status' => 1
        ]);

        return redirect()->to('/admin/geosite/' . $selectedGeosite . '/galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function galeriEdit($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $galeri = Galeri::findOrFail($id);
        return view('admin.tele.galeri.edit', compact('galeri', 'geosite', 'geositeTitle'));
    }

    public function galeriUpdate(Request $request, $geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $galeri = Galeri::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $geosite
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
        return redirect()->to('/admin/geosite/' . $geosite . '/galeri')->with('success', 'Galeri berhasil diperbarui');
    }

    public function galeriDestroy($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar && is_file(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }
        $galeri->delete();
        return redirect()->to('/admin/geosite/' . $geosite . '/galeri')->with('success', 'Galeri berhasil dihapus');
    }

    // ==================== INFORMASI ====================
    public function informasi($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $informasi = Informasi::where('kategori', $geosite)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tele.informasi.index', compact('informasi', 'geosite', 'geositeTitle'));
    }

    public function informasiCreate($geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $geositeOptions = $this->geositeOptions();
        return view('admin.tele.informasi.create', compact('geosite', 'geositeTitle', 'geositeOptions'));
    }

    public function informasiStore(Request $request, $geosite)
    {
        $geosite = $this->ensureGeosite($geosite);
        $selectedGeosite = $this->ensureGeosite($request->input('geosite', $geosite));
        $request->validate([
            'geosite' => 'required|string|in:tele,efrata,sihotang,sibea-bea,holbung',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slug = Str::slug($request->judul) . '-' . round(microtime(true) * 1000) . '-' . rand(10, 99);
        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi,
            'kategori' => $selectedGeosite,
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
        return redirect()->to('/admin/geosite/' . $selectedGeosite . '/informasi')->with('success', 'Informasi berhasil ditambahkan');
    }

    public function informasiShow($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $informasi = Informasi::findOrFail($id);
        return view('admin.tele.informasi.show', compact('informasi', 'geosite'));
    }

    public function informasiEdit($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $geositeTitle = $this->geositeTitle($geosite);
        $informasi = Informasi::findOrFail($id);
        return view('admin.tele.informasi.edit', compact('informasi', 'geosite', 'geositeTitle'));
    }

    public function informasiUpdate(Request $request, $geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $informasi = Informasi::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi,
            'kategori' => $geosite
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
        return redirect()->to('/admin/geosite/' . $geosite . '/informasi')->with('success', 'Informasi berhasil diperbarui');
    }

    public function informasiDestroy($geosite, $id)
    {
        $geosite = $this->ensureGeosite($geosite);
        $informasi = Informasi::findOrFail($id);
        if ($informasi->gambar && is_file(public_path($informasi->gambar))) {
            unlink(public_path($informasi->gambar));
        }
        $informasi->delete();
        return redirect()->to('/admin/geosite/' . $geosite . '/informasi')->with('success', 'Informasi berhasil dihapus');
    }
}