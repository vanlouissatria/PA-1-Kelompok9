<?php





use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\GeositeController;
use App\Http\Controllers\WarisanController;  

// Public Controllers
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\InformasiController as PublicInformasiController;
use App\Http\Controllers\UmkmController as PublicUmkmController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminInformasiController;
use App\Http\Controllers\Admin\AdminDestinasiController;
use App\Http\Controllers\Admin\TeleController;
use App\Http\Controllers\Admin\WarisanController as AdminWarisanController;
/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (PUBLIK)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// DESTINASI
Route::prefix('destinasi')->name('destinasi.')->group(function () {
    Route::get('/', [DestinasiController::class, 'index'])->name('index');
    Route::get('/alam', [DestinasiController::class, 'alam'])->name('alam');
    Route::get('/buatan', [DestinasiController::class, 'buatan'])->name('buatan');
    Route::get('/budaya', [DestinasiController::class, 'budaya'])->name('budaya');
});

// INFORMASI
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');
// WARISAN ALAM DAN BUDAYA
Route::get('/warisan-alam-budaya', [WarisanController::class, 'index'])->name('warisan.index');

// GALERI
Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/', [PublicGaleriController::class, 'index'])->name('index');
    Route::get('/gambar/{id}', [PublicGaleriController::class, 'showImage'])->name('gambar');
    Route::get('/{slug}', function ($slug) {
        $galeri = \App\Models\Galeri::where('slug', $slug)->firstOrFail();
        $galeri->increment('views');
        return view('pages.galeri-detail', compact('galeri'));
    })->name('detail');
});

// BERITA
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', function () {
        $berita = \App\Models\Berita::where('status', true)->latest()->paginate(9);
        return view('pages.berita', compact('berita'));
    })->name('index');
    
    Route::get('/{slug}', function ($slug) {
        $berita = \App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
        $berita->increment('views');
        return view('pages.berita-detail', compact('berita'));
    })->name('detail');
});

// UMKM (Public)
Route::prefix('umkm')->name('umkm.')->controller(PublicUmkmController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/filter', 'filter')->name('filter');
    Route::get('/{id}', 'show')->name('show');
});

// GEOSITE
Route::prefix('geosite')->name('geosite.')->group(function () {
    Route::get('/tele', [GeositeController::class, 'tele'])->name('tele');
    Route::get('/efrata', [GeositeController::class, 'efrata'])->name('efrata');
    Route::get('/sihotang', [GeositeController::class, 'sihotang'])->name('sihotang');
    // Rute utama (menggunakan tanda hubung)
    Route::get('/sibea-bea', [GeositeController::class, 'sibeaBea'])->name('sibea-bea');
    
    // TAMBAHKAN BARIS INI: Rute alternatif tanpa tanda hubung agar tidak 404
    Route::get('/sibeabea', [GeositeController::class, 'sibeaBea']); 
    
    Route::get('/bea', [GeositeController::class, 'bea'])->name('bea');
    Route::get('/holbung', [GeositeController::class, 'holbung'])->name('holbung');
});

// OTHER PAGES
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');
Route::view('/kontak', 'pages.kontak')->name('kontak');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'showForgotForm')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {

// WARISAN ALAM DAN BUDAYA
Route::resource('warisan', AdminWarisanController::class)->names('admin.warisan'); 

    // Dashboard
    Route::get('/', function () {
        $totalGaleri = DB::table('galeri')->count();
        $totalBerita = DB::table('berita')->count();
        $totalInformasi = DB::table('informasi')->count();
        $totalUmkm = DB::table('umkms')->count();
        $totalFasilitas = DB::table('fasilitas')->count();
        $totalPenginapan = DB::table('penginapan')->count();
        
        return view('admin.dashboard', compact(
            'totalGaleri', 'totalBerita', 'totalInformasi',
            'totalUmkm', 'totalFasilitas', 'totalPenginapan'
        ));
    })->name('admin.dashboard');
    
    // GALERI
    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');
    
    // BERITA
    Route::resource('berita', AdminBeritaController::class)->names('admin.berita');
    
    // INFORMASI
    Route::resource('informasi', AdminInformasiController::class)->names('admin.informasi');
    
    // DESTINASI
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    
    // Toggle Status Routes
    Route::post('galeri/toggle-status/{id}', [AdminGaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    Route::post('berita/toggle-status/{id}', [AdminBeritaController::class, 'toggleStatus'])->name('admin.berita.toggle-status');
    Route::post('informasi/toggle-status/{id}', [AdminInformasiController::class, 'toggleStatus'])->name('admin.informasi.toggle-status');
    
    // ==================== TELE ROUTES (LENGKAP) ====================
    Route::prefix('tele')->name('admin.tele.')->group(function () {
        // Dashboard
        Route::get('/', [TeleController::class, 'index'])->name('index');
        
        // UMKM
        Route::get('/umkm', [TeleController::class, 'umkm'])->name('umkm');
        Route::get('/umkm/create', [TeleController::class, 'umkmCreate'])->name('umkm.create');
        Route::post('/umkm', [TeleController::class, 'umkmStore'])->name('umkm.store');
        Route::get('/umkm/{id}/edit', [TeleController::class, 'umkmEdit'])->name('umkm.edit');
        Route::put('/umkm/{id}', [TeleController::class, 'umkmUpdate'])->name('umkm.update');
        Route::delete('/umkm/{id}', [TeleController::class, 'umkmDestroy'])->name('umkm.destroy');
        
        // Fasilitas
        Route::get('/fasilitas', [TeleController::class, 'fasilitas'])->name('fasilitas');
        Route::get('/fasilitas/create', [TeleController::class, 'fasilitasCreate'])->name('fasilitas.create');
        Route::post('/fasilitas', [TeleController::class, 'fasilitasStore'])->name('fasilitas.store');
        Route::get('/fasilitas/{id}/edit', [TeleController::class, 'fasilitasEdit'])->name('fasilitas.edit');
        Route::put('/fasilitas/{id}', [TeleController::class, 'fasilitasUpdate'])->name('fasilitas.update');
        Route::delete('/fasilitas/{id}', [TeleController::class, 'fasilitasDestroy'])->name('fasilitas.destroy');
        
        // Penginapan
        Route::get('/penginapan', [TeleController::class, 'penginapan'])->name('penginapan');
        Route::get('/penginapan/create', [TeleController::class, 'penginapanCreate'])->name('penginapan.create');
        Route::post('/penginapan', [TeleController::class, 'penginapanStore'])->name('penginapan.store');
        Route::get('/penginapan/{id}/edit', [TeleController::class, 'penginapanEdit'])->name('penginapan.edit');
        Route::put('/penginapan/{id}', [TeleController::class, 'penginapanUpdate'])->name('penginapan.update');
        Route::delete('/penginapan/{id}', [TeleController::class, 'penginapanDestroy'])->name('penginapan.destroy');
        
        // Galeri
        Route::get('/galeri', [TeleController::class, 'galeri'])->name('galeri');
        Route::get('/galeri/create', [TeleController::class, 'galeriCreate'])->name('galeri.create');
        Route::post('/galeri', [TeleController::class, 'galeriStore'])->name('galeri.store');
        Route::get('/galeri/{id}/edit', [TeleController::class, 'galeriEdit'])->name('galeri.edit');
        Route::put('/galeri/{id}', [TeleController::class, 'galeriUpdate'])->name('galeri.update');
        Route::delete('/galeri/{id}', [TeleController::class, 'galeriDestroy'])->name('galeri.destroy');
        
        // Informasi
        Route::get('/informasi', [TeleController::class, 'informasi'])->name('informasi');
        Route::get('/informasi/create', [TeleController::class, 'informasiCreate'])->name('informasi.create');
        Route::post('/informasi', [TeleController::class, 'informasiStore'])->name('informasi.store');
        Route::get('/informasi/{id}/edit', [TeleController::class, 'informasiEdit'])->name('informasi.edit');
        Route::put('/informasi/{id}', [TeleController::class, 'informasiUpdate'])->name('informasi.update');
        Route::delete('/informasi/{id}', [TeleController::class, 'informasiDestroy'])->name('informasi.destroy');
    });
});