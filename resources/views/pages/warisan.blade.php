@extends('layouts.app')

@section('title', 'Warisan Alam & Budaya - GeoToba')

@section('content')
<style>
    /* HERO SECTION */
    .heritage-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .heritage-hero::before {
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

    .heritage-hero .container {
        position: relative;
        z-index: 2;
    }

    .heritage-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .heritage-hero p {
        color: rgba(255,255,255,0.8);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.85rem;
    }

    /* HERITAGE SECTION & BLOCKS */
    .heritage-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2f8 100%);
        min-height: 100vh;
    }

    .heritage-container {
        max-width: 1400px;
        margin: auto;
        padding: 0 24px;
    }

    .heritage-category-block {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        border-left: 6px solid #c6a43b;
    }

    .heritage-title-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .heritage-title-wrapper i {
        font-size: 2rem;
        color: #003366;
    }

    .heritage-title-wrapper h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #003366;
        margin: 0;
        font-family: 'Playfair Display', serif;
    }

    /* STACK CONTAINER (Efek Kartu Bertumpuk) */
    .stack-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start; /* Diubah ke kiri agar tumpukan rapi mulai dari kiri */
        gap: 0;
        padding: 30px 0 10px 40px; /* Tambah padding kiri agar kartu pertama tidak mepet */
    }

    /* CARD STYLE */
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
    .empty-text {
        color: #64748b;
        font-style: italic;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 20px 0;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .stack-container { gap: 20px; padding-left: 0; }
        .slip-card { margin-left: 0; width: 260px; }
        .slip-card:hover ~ .slip-card { transform: none; }
    }

    @media (max-width: 768px) {
        .heritage-hero h1 { font-size: 2.2rem; }
        .slip-card { width: calc(50% - 10px); }
        .slip-image { height: 260px; }
    }

    @media (max-width: 560px) {
        .slip-card { width: 100%; }
        .slip-image { height: 280px; }
    }
</style>

<section class="heritage-hero">
    <div class="container">
        <h1>Warisan Alam & Budaya</h1>
        <p>Discover the Heritage of Geopark Danau Toba</p>
    </div>
</section>

<section class="heritage-section">
    <div class="heritage-container">

        <div class="heritage-category-block">
            <div class="heritage-title-wrapper">
                <i class="fas fa-mountain"></i>
                <h2>Geodiversity</h2>
            </div>
            
            <div class="stack-container">
                @forelse($geodiversity ?? [] as $item)
                    <a href="{{ url('/warisan/' . $item->slug) }}" class="slip-card">
                        <div class="slip-line"></div>
                        <div class="slip-image">
                                @php
                                    $warisanImage = $item->gambar;
                                    if ($warisanImage && !\Illuminate\Support\Str::startsWith($warisanImage, ['http://', 'https://', 'data:'])) {
                                        $warisanImage = asset('storage/' . ltrim($warisanImage, '/'));
                                    }
                                @endphp
                                <img src="{{ $warisanImage ?: asset('image/default.jpg') }}" alt="{{ $item->judul }}">
                                <div class="slip-overlay">
                                    <div class="slip-overlay-content">
                                        <span class="slip-category">{{ $item->label_jenis }}</span>
                                        <div class="slip-overlay-title">{{ $item->judul }}</div>
                                    </div>
                                </div>
                            </div>
                        <div class="slip-info">
                            <div class="slip-title">{{ $item->judul }}</div>
                            <div class="slip-location">
                                <i class="fas fa-map-marker-alt"></i> Geopark Toba
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="empty-text">
                        <i class="fas fa-info-circle"></i> Belum ada data geodiversity.
                    </p>
                @endforelse
            </div>
        </div>

        <div class="heritage-category-block">
            <div class="heritage-title-wrapper">
                <i class="fas fa-leaf"></i>
                <h2>Biodiversity</h2>
            </div>
            
            <div class="stack-container">
                @forelse($biodiversity ?? [] as $item)
                    <a href="{{ url('/warisan/' . $item->slug) }}" class="slip-card">
                        <div class="slip-line"></div>
                        <div class="slip-image">
                                @php
                                    $warisanImage = $item->gambar;
                                    if ($warisanImage && !\Illuminate\Support\Str::startsWith($warisanImage, ['http://', 'https://', 'data:'])) {
                                        $warisanImage = asset('storage/' . ltrim($warisanImage, '/'));
                                    }
                                @endphp
                                <img src="{{ $warisanImage ?: asset('image/default.jpg') }}" alt="{{ $item->judul }}">
                                <div class="slip-overlay">
                                    <div class="slip-overlay-content">
                                        <span class="slip-category">{{ $item->label_jenis }}</span>
                                        <div class="slip-overlay-title">{{ $item->judul }}</div>
                                    </div>
                                </div>
                            </div>
                        <div class="slip-info">
                            <div class="slip-title">{{ $item->judul }}</div>
                            <div class="slip-location">
                                <i class="fas fa-map-marker-alt"></i> Geopark Toba
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="empty-text">
                        <i class="fas fa-info-circle"></i> Belum ada data biodiversity.
                    </p>
                @endforelse
            </div>
        </div>

        <div class="heritage-category-block">
            <div class="heritage-title-wrapper">
                <i class="fas fa-landmark"></i>
                <h2>Cultural Diversity</h2>
            </div>
            
            <div class="stack-container">
                @forelse($cultural_diversity ?? [] as $item)
                    <a href="{{ url('/warisan/' . $item->slug) }}" class="slip-card">
                        <div class="slip-line"></div>
                        <div class="slip-image">
                                @php
                                    $warisanImage = $item->gambar;
                                    if ($warisanImage && !\Illuminate\Support\Str::startsWith($warisanImage, ['http://', 'https://', 'data:'])) {
                                        $warisanImage = asset('storage/' . ltrim($warisanImage, '/'));
                                    }
                                @endphp
                                <img src="{{ $warisanImage ?: asset('image/default.jpg') }}" alt="{{ $item->judul }}">
                                <div class="slip-overlay">
                                    <div class="slip-overlay-content">
                                        <span class="slip-category">{{ $item->label_jenis }}</span>
                                        <div class="slip-overlay-title">{{ $item->judul }}</div>
                                    </div>
                                </div>
                            </div>
                        <div class="slip-info">
                            <div class="slip-title">{{ $item->judul }}</div>
                            <div class="slip-location">
                                <i class="fas fa-map-marker-alt"></i> Geopark Toba
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="empty-text">
                        <i class="fas fa-info-circle"></i> Belum ada data cultural diversity.
                    </p>
                @endforelse
            </div>
        </div>

    </div>
</section>
@endsection