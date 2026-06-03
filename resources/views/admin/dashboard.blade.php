@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- STATISTIK -->
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 10px; width: 100%;">
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Galeri</div>
    </div>
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Berita</div>
    </div>
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Informasi</div>
    </div>
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalDestinasi ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Destinasi</div>
    </div>
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalWarisanAlam ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Warisan Alam & Budaya</div>
    </div>
    <div class="stat-card" style="padding: 15px 10px; background: #fff; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        <div class="stat-number" style="font-size: 20px; font-weight: bold;">{{ $totalKontak ?? 0 }}</div>
        <div class="stat-label" style="font-size: 11px; color: #666; text-transform: uppercase;">Kontak</div>
    </div>
</div>

<!-- PESAN INFO -->
<div style="background: #e3f2fd; padding: 15px; border-radius: 8px; margin-top: 20px; text-align: center;">
    <p style="margin: 0; color: #003366;">
        <i class="fas fa-info-circle"></i> 
        Gunakan menu di samping untuk mengelola konten.
    </p>
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

