@extends('layouts.app')

@section('title', 'Galeri - GeoToba')

@section('content')

<style>
    /* HERO SECTION */
    .gallery-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 100px 0 70px;
        margin-top: 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .gallery-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .gallery-hero .container {
        position: relative;
        z-index: 2;
        animation: heroReveal 0.8s cubic-bezier(0.34, 1.2, 0.64, 1);
    }

    @keyframes heroReveal {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .gallery-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, #e8c96a 40%, #ffffff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 16px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
        display: inline-block;
    }

    .gallery-hero p {
        font-size: 0.9rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.88);
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(8px);
        display: block;
        margin: 0 auto;
        max-width: 900px;
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: 500;
    }

    /* GALLERY SECTION */
    .gallery-section {
        padding: 70px 0 100px;
        background: #f8fafc;
        min-height: 100vh;
    }

    .gallery-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* STACK CONTAINER */
    .stack-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        padding: 30px 0;
    }

    /* CARD */
    .slip-card {
        position: relative;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        text-decoration: none;
        color: inherit;
    }

    .slip-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 24px 45px rgba(0,0,0,0.16);
    }

    /* IMAGE */
    .slip-image {
        position: relative;
        width: 100%;
        height: 320px;
        overflow: hidden;
        background: #e2e8f0;
    }

    .slip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .slip-card:hover .slip-image img {
        transform: scale(1.08);
    }

    /* OVERLAY */
    .slip-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.18));
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
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .slip-overlay-title {
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.4;
    }

    /* CARD INFO */
    .slip-info {
        padding: 20px;
        position: relative;
    }

    .slip-line {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #c6a43b, #e8c96a, #c6a43b);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.35s ease;
    }

    .slip-card:hover .slip-line {
        transform: scaleX(1);
    }

    .slip-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 12px;
        line-height: 1.5;
    }

    .slip-location {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #64748b;
        font-size: 0.85rem;
    }

    .slip-location i {
        color: #c6a43b;
    }

    /* EMPTY STATE */
    .empty-gallery {
        text-align: center;
        background: white;
        padding: 80px 30px;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .empty-gallery i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-gallery h5 {
        color: #0f172a;
        margin-bottom: 10px;
        font-size: 1.4rem;
    }

    .empty-gallery p {
        color: #64748b;
        font-size: 0.95rem;
    }

    /* PAGINATION */
    .pagination-wrapper {
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .gallery-hero h1 {
            font-size: 3rem;
        }

        .slip-image {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .gallery-hero h1 {
            font-size: 2.2rem;
        }

        .slip-image {
            height: 260px;
        }
    }

    @media (max-width: 560px) {
        .gallery-hero {
            padding: 80px 0 50px;
        }

        .slip-image {
            height: 240px;
        }
    }
</style>

<!-- HERO -->
<section class="gallery-hero">
    <div class="container">
        <h1>Galeri Foto</h1>
        <p>Dokumentasi Keindahan Geopark Danau Toba</p>
    </div>
</section>

<!-- GALLERY -->
<section class="gallery-section">
    <div class="gallery-container">

        <div class="stack-container">

            @forelse($galeri as $item)

                @php
                    $imgSrc = '';

                    if ($item->gambar) {

                        if (file_exists(public_path($item->gambar))) {
                            $imgSrc = image_url($item->gambar);

                        } elseif (file_exists(public_path('storage/' . $item->gambar))) {
                            $imgSrc = image_url($item->gambar);

                        } else {
                            $imgSrc = asset('image/default.jpg');
                        }

                    } else {
                        $imgSrc = asset('image/default.jpg');
                    }
                @endphp

                <a href="{{ url('/galeri/' . $item->slug) }}"
                   class="slip-card">

                    <div class="slip-image">

                        <img src="{{ $imgSrc }}"
                             alt="{{ $item->judul }}">

                        <div class="slip-overlay">
                            <div class="slip-overlay-content">

                                <span class="slip-category">
                                    Galeri
                                </span>

                                <div class="slip-overlay-title">
                                    {{ Str::limit($item->judul, 40) }}
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="slip-info">

                        <div class="slip-line"></div>

                        <h5 class="slip-title">
                            {{ Str::limit($item->judul, 50) }}
                        </h5>

                        <div class="slip-location">
                            <i class="fas fa-eye"></i>
                            {{ $item->views ?? 0 }} views
                        </div>

                    </div>

                </a>

            @empty

                <div class="col-12">
                    <div class="empty-gallery">

                        <i class="fas fa-images"></i>

                        <h5>Belum ada foto galeri</h5>

                        <p>
                            Silakan cek kembali nanti
                        </p>

                    </div>
                </div>

            @endforelse

        </div>

        @if($galeri->hasPages())

            <div class="pagination-wrapper">
                {{ $galeri->links() }}
            </div>

        @endif

    </div>
</section>

@endsection