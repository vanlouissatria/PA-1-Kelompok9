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

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
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

    // DASHBOARD
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
    
    // Toggle Status Routes (must be before resource routes)
    Route::post('galeri/toggle-status/{id}', [AdminGaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    Route::post('berita/toggle-status/{id}', [AdminBeritaController::class, 'toggleStatus'])->name('admin.berita.toggle-status');
    Route::post('informasi/toggle-status/{id}', [AdminInformasiController::class, 'toggleStatus'])->name('admin.informasi.toggle-status');
    Route::post('destinasi/toggle-status/{id}', [AdminDestinasiController::class, 'toggleStatus'])->name('admin.destinasi.toggle-status');
    Route::post('fasilitas/toggle-status/{id}', [AdminFasilitasController::class, 'toggleStatus'])->name('admin.fasilitas.toggle-status');
    
    // GALERI
    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');

    // BERITA
    Route::resource('berita', AdminBeritaController::class)->names('admin.berita');

    // INFORMASI
    Route::resource('informasi', AdminInformasiController::class)->names('admin.informasi');

    // DESTINASI
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    
    // ==================== TELE ROUTES (LENGKAP) ====================
    Route::prefix('tele')->name('admin.tele.')->group(function () {
        Route::get('/', [TeleController::class, 'index'])->name('index');
    });
});