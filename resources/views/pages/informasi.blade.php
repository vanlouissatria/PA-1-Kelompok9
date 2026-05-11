@extends('layouts.app')

@section('content')
<style>
    /* 1. Header yang serasi dengan Galeri (Lurus & Gradien Biru) */
    .informasi-header {
        background: linear-gradient(135deg, #003366 0%, #005c8a 100%);
        padding: 80px 0;
        text-align: center;
        color: white;
        margin-bottom: 50px;
    }
    .informasi-header p {
        text-uppercase;
        letter-spacing: 3px;
        font-size: 0.9rem;
        opacity: 0.8;
        margin-bottom: 10px;
    }
    .informasi-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .header-line {
        width: 60px;
        height: 3px;
        background-color: #c6a43b; /* Warna emas khas Geotoba */
        margin: 0 auto;
    }

    /* 2. Efek Kartu Glassmorphism untuk Artikel */
    .info-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
        transition: transform 0.3s ease;
    }
    .info-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.9);
    }

    /* 3. Styling Gambar Artikel */
    .img-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .img-wrapper img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .info-card:hover .img-wrapper img {
        transform: scale(1.05);
    }

    .info-title {
        color: #003366;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .content-text {
        text-align: justify;
        color: #33475b;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    body {
        background-color: #f4f7f6; /* Warna background abu sangat muda agar efek glass terpancar */
    }
</style>

<div class="informasi-header">
    <div class="container">
        <p>WARISAN GEOLOGI KELAS DUNIA</p>
        <h1>Terbentuknya Danau Toba</h1>
        <div class="header-line"></div>
    </div>
</div>

<div class="container py-4">
    @foreach($informasiList as $index => $info)
        <div class="info-card mb-5">
            <div class="row align-items-center">
                @if($index % 2 == 0)
                    <div class="col-lg-5">
                        <div class="img-wrapper">
                            @if($info->gambar)
                                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}">
                            @else
                                <img src="https://placehold.co/600x400?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                        <p class="text-muted small mt-3 text-center italic">~ {{ $info->judul }}</p>
                    </div>
                    <div class="col-lg-7 ps-lg-5">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! $info->konten !!}
                        </div>
                    </div>
                @else
                    <div class="col-lg-7 pe-lg-5 order-2 order-lg-1">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! $info->konten !!}
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <div class="img-wrapper">
                            @if($info->gambar)
                                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}">
                            @else
                                <img src="https://placehold.co/600x400?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                        <p class="text-muted small mt-3 text-center italic">~ {{ $info->judul }}</p>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection