<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\GeositeController;

// --- IMPORT CONTROLLER PUBLIK ---
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\InformasiController as PublicInformasiController;

// --- IMPORT CONTROLLER ADMIN ---
// Menggunakan PascalCase untuk menghindari error case-sensitive di server
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminInformasiController;
use App\Http\Controllers\Admin\AdminUmkmController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\Admin\AdminPenginapanController;
use App\Http\Controllers\Admin\AdminDestinasiController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (PUBLIK)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// DESTINASI
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');

// INFORMASI
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');

// GALERI
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/gambar/{id}', [PublicGaleriController::class, 'showImage'])->name('galeri.gambar');
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = \App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// BERITA
Route::get('/berita', function () {
    $berita = \App\Models\Berita::where('status', true)->latest()->paginate(9);
    return view('pages.berita', compact('berita'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = \App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// LAIN-LAIN
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');
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

    // CRUD Resources menggunakan Controller Admin
    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');
    Route::resource('berita', AdminBeritaController::class)->names('admin.berita');
    Route::resource('informasi', AdminInformasiController::class)->names('admin.informasi');
    Route::resource('umkm', AdminUmkmController::class)->names('admin.umkm');
    Route::resource('fasilitas', AdminFasilitasController::class)->names('admin.fasilitas');
    Route::resource('penginapan', AdminPenginapanController::class)->names('admin.penginapan');
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');

    // Toggle Status Routes
    Route::post('galeri/toggle-status/{id}', [AdminGaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    Route::post('berita/toggle-status/{id}', [AdminBeritaController::class, 'toggleStatus'])->name('admin.berita.toggle-status');
    Route::post('informasi/toggle-status/{id}', [AdminInformasiController::class, 'toggleStatus'])->name('admin.informasi.toggle-status');
});