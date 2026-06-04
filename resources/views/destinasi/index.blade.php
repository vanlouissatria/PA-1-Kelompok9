@extends('layouts.app')

@section('title', 'Destinasi - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== HERO SECTION (same as home) ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }

    .slides-container { position: relative; width: 100%; height: 100%; }
    .slide { position: absolute; top:0; left:0; width:100%; height:100%; background-size:cover; background-position:center; opacity:0; transform:scale(1.02); transition: opacity 1s ease-in-out, transform 8s ease-out; z-index:1; }
    .slide.active { opacity:1; z-index:2; transform:scale(1); }

    .slide-1{ background-image: linear-gradient(125deg, rgba(0,30,60,0.7) 0%, rgba(0,80,120,0.5) 40%, rgba(0,30,60,0.7) 100%), url('{{ asset('image/home/tele1.jpg') }}'); }
    .slide-2{ background-image: linear-gradient(125deg, rgba(0,40,70,0.7) 0%, rgba(212,175,55,0.2) 40%, rgba(0,40,70,0.7) 100%), url('{{ asset('image/home/efrata5.jpg') }}'); }
    .slide-3{ background-image: linear-gradient(125deg, rgba(0,20,50,0.7) 0%, rgba(100,150,200,0.3) 40%, rgba(0,20,50,0.7) 100%), url('{{ asset('image/home/sihotang2.jpg') }}'); }
    .slide-4{ background-image: linear-gradient(125deg, rgba(0,35,65,0.7) 0%, rgba(212,175,55,0.25) 40%, rgba(0,35,65,0.7) 100%), url('{{ asset('image/home/sihotang3.jpg') }}'); }
    .slide-5{ background-image: linear-gradient(125deg, rgba(0,25,55,0.7) 0%, rgba(80,130,180,0.35) 40%, rgba(0,25,55,0.7) 100%), url('{{ asset('image/home/efrata1.jpg') }}'); }

    .hero-content{ position:absolute; z-index:10; bottom:20%; left:0; right:0; text-align:center; color:white; padding:0 20px; }
    .hero-subtitle{ font-size:0.7rem; letter-spacing:0.35em; text-transform:uppercase; margin-bottom:20px; font-weight:300; opacity:0.9; }
    .hero-title{ font-size:3rem; font-weight:700; font-family:'Cormorant Garamond', serif; line-height:1.2; margin-bottom:12px; color:white; text-shadow:0 2px 15px rgba(0,0,0,0.4); }
    .hero-divider{ width:60px; height:2px; background:#c6a43b; margin:10px auto 18px; }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes borderGlow {
        0%, 100% {
            box-shadow: 0 0 5px rgba(198, 164, 59, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(198, 164, 59, 0.8);
        }
    }
    
    /* ==================== CATEGORY SECTION ==================== */
    .category-section {
        padding: 80px 0;
        background: #f0f4f0;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-header .subtitle {
        display: inline-block;
        font-size: 0.7rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #c6a43b;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .section-header .divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 20px;
    }
    
    .section-header p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        font-size: 0.9rem;
    }
    
    /* Category Cards */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .category-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }
    
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .card-image {
        position: relative;
        height: 240px;
        overflow: hidden;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .category-card:hover .card-image img {
        transform: scale(1.05);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,51,102,0.3) 100%);
    }
    
    .card-content {
        padding: 25px;
        text-align: center;
    }
    
    .card-icon {
        width: 60px;
        height: 60px;
        background: rgba(0,51,102,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -40px auto 15px;
        position: relative;
        z-index: 2;
    }
    
    .card-icon i {
        font-size: 24px;
        color: #003366;
    }
    
    .card-content h3 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #003366;
    }
    
    .card-content p {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 0;
    }
    
    /* ==================== STATS SECTION (home style) ==================== */
    .stats-section {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        padding: 60px 0;
    }

    .stats-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    .stat-item {
        flex: 1;
        min-width: 100px;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(198,164,59,0.2), transparent);
        transition: left 0.6s ease;
    }

    .stat-item:hover::before {
        left: 100%;
    }

    .stat-item:hover {
        transform: translateY(-10px) scale(1.05);
        background: rgba(0, 51, 102, 0.1);
        animation: borderGlow 1s infinite;
    }

    .stat-number {
        font-size: 2.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: #c6a43b;
        margin-bottom: 8px;
        transition: all 0.3s ease;
    }

    .stat-item:hover .stat-number {
        transform: scale(1.1);
        color: #003366;
    }

    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
        transition: letter-spacing 0.3s ease;
    }

    .stat-item:hover .stat-label {
        letter-spacing: 0.3em;
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .destinasi-hero {
            min-height: 300px;
        }
        .destinasi-hero h1 {
            font-size: 2rem;
        }
        .category-section {
            padding: 50px 0;
        }
        .section-header h2 {
            font-size: 1.6rem;
        }
        .category-grid {
            grid-template-columns: 1fr;
        }
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }
</style>

<!-- HERO SECTION (same structure as home) -->
<section class="hero-section">
    <div class="slides-container">
        <div class="slide slide-5 active"></div>
    </div>

    <div class="hero-content" data-aos="fade-up">
        <div class="hero-subtitle">Destinasi Geosite</div>
        <h1 class="hero-title">Destinasi Geosite</h1>
        <div class="hero-divider"></div>
        <p style="max-width:720px; margin:0 auto; color: rgba(255,255,255,0.9);">Jelajahi pesona caldera Danau Toba dan temukan destinasi terbaik untuk setiap pengalaman wisata.</p>
    </div>
</section>

<!-- SEMUA DESTINASI -->
<section class="category-section">
    <div class="container">

        <div class="section-header" data-aos="fade-up">
            <span class="subtitle">SEMUA DESTINASI</span>
            <h2>Jelajahi Destinasi GeoToba</h2>
            <div class="divider"></div>
            <p>Temukan berbagai destinasi alam, budaya, dan buatan di kawasan Geopark Kaldera Toba.</p>
        </div>

        <div class="category-grid">

            @foreach($destinasi as $item)

                @php
                    $gambar = $item->gambar;

                    if ($gambar &&
                        !str_starts_with($gambar, 'http') &&
                        !str_starts_with($gambar, 'data:')) {
                        $gambar = image_url($gambar);
                    }
                @endphp

                <div class="category-card" data-aos="fade-up">

                    <div class="card-image">
                        <img src="{{ $gambar }}" alt="{{ $item->nama_destinasi }}">
                        <div class="card-overlay"></div>
                    </div>

                    <div class="card-content">
                        <h3>{{ $item->nama_destinasi }}</h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                        </p>

                        <small>
                            <strong>Kategori:</strong>
                            {{ ucfirst($item->kategori) }}
                        </small>
                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection