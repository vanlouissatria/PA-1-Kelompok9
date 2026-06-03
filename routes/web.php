<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\GeositeController;
use App\Http\Controllers\WarisanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KontakMessageController;

// FRONTEND CONTROLLER KONTAK
use App\Http\Controllers\KontakController as PublicKontakController;

// Public Controllers
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\InformasiController as PublicInformasiController;
use App\Http\Controllers\UmkmController as PublicUmkmController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminInformasiController;
use App\Http\Controllers\Admin\AdminDestinasiController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\Admin\AdminKontakController;
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
Route::get('/informasi/{slug}', [PublicInformasiController::class, 'show'])->name('informasi.detail');

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

// UMKM PUBLIC
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
    Route::get('/sibea-bea', [GeositeController::class, 'sibeaBea'])->name('sibea-bea');
    Route::get('/sibeabea', [GeositeController::class, 'sibeaBea']);
    Route::get('/bea', [GeositeController::class, 'bea'])->name('bea');
    Route::get('/holbung', [GeositeController::class, 'holbung'])->name('holbung');
});

// OTHER PAGES
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// KONTAK DINAMIS
Route::get('/kontak', [PublicKontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, LOGOUT, LUPA PASSWORD)
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// ROUTE UNTUK LUPA PASSWORD (Reset Password)
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');

// PERBAIKAN DI SINI: Menambahkan Request $request dan membaca query 'email' dari URL
Route::get('/reset-password/{token}', function (Request $request, $token) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->query('email')
    ]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (dengan middleware auth)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // DASHBOARD MAIN
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
    
    // KONTEN GLOBAL UTAMA
    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');
    Route::resource('berita', AdminBeritaController::class)->names('admin.berita');
    Route::resource('informasi', AdminInformasiController::class)->names('admin.informasi');
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    Route::resource('warisan', AdminWarisanController::class)->names('admin.warisan');
    Route::resource('kontak', AdminKontakController::class)->names('admin.kontak');
    
    // ==================== SUBMENU GEOSITE ADMIN GENERAL ====================
    Route::prefix('geosite')->name('admin.geosite.')->group(function () {
        // Halaman Utama Dashboard geosite
        Route::get('/{geosite}', [TeleController::class, 'index'])->name('index');

        // Modul UMKM
        Route::get('/{geosite}/umkm', [TeleController::class, 'umkm'])->name('umkm.index');
        Route::get('/{geosite}/umkm/create', [TeleController::class, 'umkmCreate'])->name('umkm.create');
        Route::post('/{geosite}/umkm', [TeleController::class, 'umkmStore'])->name('umkm.store');
        Route::get('/{geosite}/umkm/{id}/edit', [TeleController::class, 'umkmEdit'])->name('umkm.edit');
        Route::put('/{geosite}/umkm/{id}', [TeleController::class, 'umkmUpdate'])->name('umkm.update');
        Route::delete('/{geosite}/umkm/{id}', [TeleController::class, 'umkmDestroy'])->name('umkm.destroy');

        // Modul FASILITAS
        Route::get('/{geosite}/fasilitas', [TeleController::class, 'fasilitas'])->name('fasilitas.index');
        Route::get('/{geosite}/fasilitas/create', [TeleController::class, 'fasilitasCreate'])->name('fasilitas.create');
        Route::post('/{geosite}/fasilitas', [TeleController::class, 'fasilitasStore'])->name('fasilitas.store');
        Route::get('/{geosite}/fasilitas/{id}/edit', [TeleController::class, 'fasilitasEdit'])->name('fasilitas.edit');
        Route::put('/{geosite}/fasilitas/{id}', [TeleController::class, 'fasilitasUpdate'])->name('fasilitas.update');
        Route::delete('/{geosite}/fasilitas/{id}', [TeleController::class, 'fasilitasDestroy'])->name('fasilitas.destroy');

        // Modul PENGINAPAN
        Route::get('/{geosite}/penginapan', [TeleController::class, 'penginapan'])->name('penginapan.index');
        Route::get('/{geosite}/penginapan/create', [TeleController::class, 'penginapanCreate'])->name('penginapan.create');
        Route::post('/{geosite}/penginapan', [TeleController::class, 'penginapanStore'])->name('penginapan.store');
        Route::get('/{geosite}/penginapan/{id}/edit', [TeleController::class, 'penginapanEdit'])->name('penginapan.edit');
        Route::put('/{geosite}/penginapan/{id}', [TeleController::class, 'penginapanUpdate'])->name('penginapan.update');
        Route::delete('/{geosite}/penginapan/{id}', [TeleController::class, 'penginapanDestroy'])->name('penginapan.destroy');

        // Modul GALERI
        Route::get('/{geosite}/galeri', [TeleController::class, 'galeri'])->name('galeri.index');
        Route::get('/{geosite}/galeri/create', [TeleController::class, 'galeriCreate'])->name('galeri.create');
        Route::post('/{geosite}/galeri', [TeleController::class, 'galeriStore'])->name('galeri.store');
        Route::get('/{geosite}/galeri/{id}/edit', [TeleController::class, 'galeriEdit'])->name('galeri.edit');
        Route::put('/{geosite}/galeri/{id}', [TeleController::class, 'galeriUpdate'])->name('galeri.update');
        Route::delete('/{geosite}/galeri/{id}', [TeleController::class, 'galeriDestroy'])->name('galeri.destroy');

        // Modul INFORMASI
        Route::get('/{geosite}/informasi', [TeleController::class, 'informasi'])->name('informasi.index');
        Route::get('/{geosite}/informasi/create', [TeleController::class, 'informasiCreate'])->name('informasi.create');
        Route::post('/{geosite}/informasi', [TeleController::class, 'informasiStore'])->name('informasi.store');
        Route::get('/{geosite}/informasi/{id}', [TeleController::class, 'informasiShow'])->name('informasi.show');
        Route::get('/{geosite}/informasi/{id}/edit', [TeleController::class, 'informasiEdit'])->name('informasi.edit');
        Route::put('/{geosite}/informasi/{id}', [TeleController::class, 'informasiUpdate'])->name('informasi.update');
        Route::delete('/{geosite}/informasi/{id}', [TeleController::class, 'informasiDestroy'])->name('informasi.destroy');
    });
});

