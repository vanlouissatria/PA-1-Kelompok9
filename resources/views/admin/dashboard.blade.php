@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- STATISTIK -->
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 15px; width: calc(100% + 30px); margin-left: -15px; margin-right: -15px;">
    <div class="stat-card" style="margin: 0 15px;">
        <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label">Galeri</div>
    </div>
    <div class="stat-card" style="margin: 0 15px;">
        <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label">Berita</div>
    </div>
    <div class="stat-card" style="margin: 0 15px;">
        <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label">Informasi</div>
    </div>
    <div class="stat-card" style="margin: 0 15px;">
        <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
        <div class="stat-label">Fasilitas</div>
    </div>
    <div class="stat-card" style="margin: 0 15px;">
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

