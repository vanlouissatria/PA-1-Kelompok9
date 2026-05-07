<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\GeositeController;

use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\InformasiController as PublicInformasiController;

use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\PenginapanController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// DESTINASI
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');

// INFORMASI
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');

// ================= GALERI =================
// Halaman Galeri
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');

// TAMBAHAN: Route untuk menampilkan gambar dari database (binary/base64)
Route::get('/galeri/gambar/{id}', [PublicGaleriController::class, 'showImage'])->name('galeri.gambar');

// Detail Galeri (berdasarkan slug)
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// BERITA
Route::get('/berita', function () {
    $berita = App\Models\Berita::where('status', true)->latest()->paginate(9);
    return view('pages.berita', compact('berita'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// BUDAYA
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// KONTAK
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

/*
|--------------------------------------------------------------------------
| GEOSITE ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/geosite/tele', [GeositeController::class, 'tele'])->name('geosite.tele');
Route::get('/geosite/efrata', [GeositeController::class, 'efrata'])->name('geosite.efrata');
Route::get('/geosite/sihotang', [GeositeController::class, 'sihotang'])->name('geosite.sihotang');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        $totalGaleri = DB::table('galeris')->count();
        $totalBerita = DB::table('berita')->count();
        $totalInformasi = DB::table('informasi')->count();
        $totalUmkm = DB::table('umkm')->count();
        $totalFasilitas = DB::table('fasilitas')->count();
        $totalPenginapan = DB::table('penginapan')->count();
        $totalViews = 0;
        return view('admin.dashboard', compact(
            'totalGaleri', 'totalBerita', 'totalInformasi',
            'totalUmkm', 'totalFasilitas', 'totalPenginapan', 'totalViews'
        ));
    })->name('admin.dashboard');

    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::resource('umkm', UmkmController::class)->names('admin.umkm');
    Route::resource('fasilitas', FasilitasController::class)->names('admin.fasilitas');
    Route::resource('penginapan', PenginapanController::class)->names('admin.penginapan');

    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    Route::post('berita/toggle-status/{id}', [BeritaController::class, 'toggleStatus'])->name('admin.berita.toggle-status');
    Route::post('informasi/toggle-status/{id}', [InformasiController::class, 'toggleStatus'])->name('admin.informasi.toggle-status');
});