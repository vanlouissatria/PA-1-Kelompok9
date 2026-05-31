@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- STATISTIK -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label">Galeri</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label">Berita</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label">Informasi</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
        <div class="stat-label">UMKM</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
        <div class="stat-label">Fasilitas</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
        <div class="stat-label">Penginapan</div>
    </div>
</div>

<!-- PESAN INFO -->
<div style="background: #e3f2fd; padding: 15px; border-radius: 8px; margin-top: 20px; text-align: center;">
    <p style="margin: 0; color: #003366;">
        <i class="fas fa-info-circle"></i> 
        Gunakan menu di samping untuk mengelola konten.
    </p>
</div>

<!-- QUICK ACTIONS - SEMUA DINONAKTIFKAN -->
<div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px;">
    <!-- HANYA TOMBOL YANG ROUTE NYA SUDAH PASTI ADA -->
    @if(Route::has('admin.galeri.create'))
        <a href="{{ route('admin.galeri.create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Galeri</a>
    @endif
    
    @if(Route::has('admin.berita.create'))
        <a href="{{ route('admin.berita.create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Berita</a>
    @endif
    
    @if(Route::has('admin.informasi.create'))
        <a href="{{ route('admin.informasi.create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Informasi</a>
    @endif
</div>

<!-- PENGUMUMAN -->
<div style="margin-top: 30px; padding: 15px; background: #fff3cd; border-radius: 8px; border-left: 4px solid #ffc107;">
    <h5 style="margin: 0 0 10px 0; color: #856404;">
        <i class="fas fa-tools"></i> Fitur Dalam Pengembangan
    </h5>
    <p style="margin: 0; color: #856404;">
        Menu UMKM, Fasilitas, dan Penginapan sedang dalam pengembangan. Silakan gunakan menu Tele yang sudah tersedia.
    </p>
</div>
@endsection@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- STATISTIK -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label">Galeri</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label">Berita</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label">Informasi</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
        <div class="stat-label">UMKM</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
        <div class="stat-label">Fasilitas</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
        <div class="stat-label">Penginapan</div>
    </div>
</div>

<!-- QUICK ACTIONS - HANYA YANG ROUTE NYA PASTI ADA -->
<div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px;">
    <a href="{{ url('/admin/galeri/create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Galeri</a>
    <a href="{{ url('/admin/berita/create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Berita</a>
    <a href="{{ url('/admin/informasi/create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Informasi</a>
    <a href="{{ url('/admin/destinasi/create') }}" class="btn-primary"><i class="fas fa-plus-circle"></i> Destinasi</a>
    <a href="{{ url('/admin/geosite/tele') }}" class="btn-primary"><i class="fas fa-tower-cell"></i> Kelola Tele</a>
</div>

<!-- PENGUMUMAN -->
<div style="margin-top: 30px; padding: 15px; background: #e8f4f8; border-radius: 8px; border-left: 4px solid #0099ff;">
    <h5 style="margin: 0 0 10px 0; color: #003366;">
        <i class="fas fa-info-circle"></i> Informasi
    </h5>
    <p style="margin: 0; color: #005599;">
        Gunakan menu <strong>Tele</strong> di sidebar untuk mengelola UMKM, Fasilitas, Penginapan, Galeri, dan Informasi khusus halaman Tele.
    </p>
</div>
@endsection