@extends('layouts.app')

@section('title', 'Terbentuknya Danau Toba - GeoToba')

@section('content')
<style>
    /* MAIN WRAPPER FOR FOOTER PUSH */
    .page-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* HERO SECTION (Diselaraskan dengan Berita, Galeri, & Warisan) */
    .information-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .information-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .information-hero .container {
        position: relative;
        z-index: 2;
    }

    .information-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .information-hero p {
        color: #c6a43b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* MAIN CONTENT SECTION */
    .information-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2f8 100%);
        flex: 1; /* Memastikan section ini mengambil sisa ruang agar footer tetap di bawah */
    }

    .information-container {
        max-width: 1400px;
        margin: auto;
        padding: 0 24px;
    }

    /* STACK CONTAINER (Efek Kartu Bertumpuk) */
    .stack-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0;
        padding: 30px 0;
    }

    /* SLIP CARD STYLE */
    .slip-card {
        position: relative;
        width: 280px;
        background: white;
        border-radius: 18px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        margin-left: -60px;
        text-decoration: none;
        color: inherit;
    }

    .slip-card:first-child {
        margin-left: 0;
    }

    .slip-card:hover {
        transform: translateY(-15px) scale(1.02);
        z-index: 10;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .slip-card:hover ~ .slip-card {
        transform: translateX(20px);
    }

    /* IMAGE CONTAINER */
    .slip-image {
        position: relative;
        width: 100%;
        height: 320px;
        overflow: hidden;
        background: #ddd;
    }

    .slip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .slip-card:hover .slip-image img {
        transform: scale(1.06);
    }

    /* OVERLAY ON HOVER */
    .slip-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.1));
        display: flex;
        align-items: flex-end;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .slip-card:hover .slip-overlay {
        opacity: 1;
    }

    .slip-overlay-content {
        color: white;
    }

    .slip-category {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .slip-overlay-title {
        font-size: 0.9rem;
        font-weight: 600;
        line-height: 1.4;
    }

    /* CARD INFO SECTION */
    .slip-info {
        padding: 18px;
        position: relative;
    }

    .slip-line {
        position: absolute;
        top: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background: linear-gradient(90deg, #c6a43b, #e8c45a, #c6a43b);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .slip-card:hover .slip-line {
        transform: scaleX(1);
    }

    .slip-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.5;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .slip-location {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 0.8rem;
    }

    .slip-location i {
        color: #c6a43b;
    }

    /* EMPTY STATE */
    .empty-gallery {
        text-align: center;
        background: white;
        padding: 80px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        width: 100%;
    }

    .empty-gallery i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-gallery h5 {
        color: #1e293b;
        margin-bottom: 10px;
    }

    .empty-gallery p {
        color: #64748b;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .stack-container { gap: 20px; }
        .slip-card { margin-left: 0; width: 260px; }
        .slip-card:hover ~ .slip-card { transform: none; }
    }

    @media (max-width: 768px) {
        .information-hero h1 { font-size: 2.2rem; }
        .slip-card { width: calc(50% - 10px); }
        .slip-image { height: 260px; }
    }

    @media (max-width: 560px) {
        .slip-card { width: 100%; }
        .slip-image { height: 280px; }
    }
</style>

<div class="page-wrapper">
    <section class="information-hero">
        <div class="container">
            <p>WARISAN GEOLOGI KELAS DUNIA</p>
            <h1>Terbentuknya Danau Toba</h1>
        </div>
    </section>

    <section class="information-section">
        <div class="information-container">
            
            <div class="stack-container">
                @forelse($informasi as $info)
                    <a href="{{ url('/informasi/' . ($info->slug ?? $info->id)) }}" class="slip-card">
                        <div class="slip-line"></div>
                        
                        <div class="slip-image">
                            @if($info->gambar)
                                <img src="{{ asset($info->gambar) }}" alt="{{ $info->judul }}" loading="lazy">
                            @else
                                <img src="https://placehold.co/800x600?text=GeoToba" alt="Placeholder">
                            @endif
                            
                            <div class="slip-overlay">
                                <div class="slip-overlay-content">
                                    <span class="slip-category">Edukasi</span>
                                    <div class="slip-overlay-title">{{ $info->judul }}</div>
                                </div>
                            </div>
                        </div>

                    <div class="slip-info">
                        <div class="slip-title">{{ $info->judul }}</div>
                        <div class="slip-location">
                            <i class="fas fa-history"></i> Sejarah Toba
                        </div>
                    </div>
                </a>
            @empty
                <div class="empty-gallery">
                    <i class="fas fa-file-alt"></i>
                    <h5>Belum Ada Informasi</h5>
                    <p>Data mengenai pembentukan Danau Toba belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>
</div>
@endsection