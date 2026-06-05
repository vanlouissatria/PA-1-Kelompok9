@extends('layouts.app')

@section('title', $informasi->judul . ' - GeoToba')

@section('content')
<style>
    /* DETAIL INFORMASI SECTION */
    .detail-informasi-section {
        padding: 140px 0 80px;
        background: #ffffff;
        min-height: 100vh;
    }

    .detail-informasi-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* METADATA */
    .detail-date {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #c6a43b;
        font-weight: 600;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .detail-category {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    /* IMAGE CONTAINER */
    .detail-image-wrapper {
        background: #ffffff;
        border-radius: 24px;
        padding: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
        margin-bottom: 50px;
        overflow: hidden;
    }

    .detail-image-wrapper img {
        width: 100%;
        height: auto;
        border-radius: 16px;
        object-fit: cover;
        display: block;
    }

    /* CONTENT */
    .detail-content {
        font-size: 1rem;
        color: #334155;
        line-height: 1.9;
        text-align: justify;
        margin-bottom: 50px;
    }

    .detail-content h2 {
        font-size: 1.5rem;
        color: #003366;
        font-weight: 700;
        margin-top: 30px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 3px solid #c6a43b;
    }

    .detail-content h3 {
        font-size: 1.2rem;
        color: #1e293b;
        font-weight: 600;
        margin-top: 20px;
        margin-bottom: 12px;
    }

    .detail-content p {
        margin-bottom: 15px;
    }

    .detail-content ul, .detail-content ol {
        margin-left: 20px;
        margin-bottom: 15px;
    }

    .detail-content li {
        margin-bottom: 8px;
        line-height: 1.8;
    }

    /* INFO BOX */
    .info-box {
        background: linear-gradient(135deg, #f0f8ff 0%, #e6f2ff 100%);
        border-left: 5px solid #c6a43b;
        padding: 20px;
        border-radius: 8px;
        margin: 30px 0;
    }

    .info-box strong {
        color: #003366;
    }

    /* BUTTON BACK */
    .btn-back-wrapper {
        border-top: 2px solid #e2e8f0;
        padding-top: 40px;
        margin-top: 60px;
        text-align: center;
    }

    .btn-geotoba-back {
        background-color: #002F5F;
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        border: 2px solid #002F5F;
    }

    .btn-geotoba-back:hover {
        background-color: transparent;
        color: #002F5F;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .detail-title {
            font-size: 1.8rem;
        }

        .detail-content {
            font-size: 0.95rem;
        }

        .detail-informasi-container {
            padding: 0 16px;
        }
    }

    @media (max-width: 480px) {
        .detail-title {
            font-size: 1.5rem;
        }

        .detail-content {
            text-align: left;
            font-size: 0.9rem;
        }
    }
</style>

<section class="detail-informasi-section">
    <div class="detail-informasi-container">
        
        <!-- METADATA -->
        <div class="detail-date">
            <i class="fas fa-calendar-alt"></i>
            {{ $informasi->created_at->format('d M Y') }}
        </div>

        <!-- JUDUL -->
        <h1 class="detail-title">{{ $informasi->judul }}</h1>

        <!-- KATEGORI -->
        <span class="detail-category">
            <i class="fas fa-bookmark me-1"></i> Edukasi
        </span>

        <!-- GAMBAR -->
        @if($informasi->gambar)
            <div class="detail-image-wrapper">
                <img src="{{ image_url($informasi->gambar) }}" alt="{{ $informasi->judul }}" loading="lazy">
            </div>
        @endif

        <!-- KONTEN -->
        <div class="detail-content">
            {!! nl2br(e($informasi->konten)) !!}
        </div>

        <!-- TOMBOL KEMBALI -->
        <div class="btn-back-wrapper">
            <a href="{{ route('informasi') }}" class="btn-geotoba-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Informasi
            </a>
        </div>

    </div>
</section>
@endsection
