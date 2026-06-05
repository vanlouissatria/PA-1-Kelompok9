@extends('layouts.app')

@section('title', $galeri->judul . ' - GeoToba')

@section('content')
<style>
    /* DETAIL GALLERY SECTION */
    .detail-gallery-section {
        padding: 140px 0 80px;
        background: #ffffff;
        min-height: 100vh;
    }

    .detail-gallery-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 24px;
        text-align: center;
    }

    /* METADATA */
    .detail-date {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #c6a43b;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .detail-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .detail-author {
        font-size: 0.8rem;
        color: #64748b;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 40px;
    }

    .detail-author i {
        font-size: 0.85rem;
    }

    /* IMAGE CONTAINER */
    .detail-image-wrapper {
        background: #ffffff;
        border-radius: 24px;
        padding: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
        margin-bottom: 30px;
        display: inline-block;
        width: 100%;
        max-width: 650px;
    }

    .detail-image-wrapper img {
        width: 100%;
        height: auto;
        border-radius: 16px;
        object-fit: cover;
    }

    /* DESCRIPTION */
    .detail-description {
        font-size: 0.95rem;
        color: #334155;
        line-height: 1.8;
        text-align: left;
        max-width: 650px;
        margin: 0 auto 50px;
        padding: 0 10px;
    }

    /* BUTTON BACK */
    .btn-back-wrapper {
        border-top: 1px solid #e2e8f0;
        padding-top: 40px;
        margin-top: 20px;
    }

    .btn-geotoba-back {
        background-color: #002244;
        color: #ffffff;
        padding: 10px 24px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 34, 68, 0.2);
    }

    .btn-geotoba-back:hover {
        background-color: #003366;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 34, 68, 0.3);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .detail-gallery-section {
            padding: 100px 0 60px;
        }
        .detail-title {
            font-size: 1.8rem;
        }
    }

    .audio-player{
        position: fixed;
        right: 25px;
        bottom: 90px; /* di atas tombol scroll-up */
        z-index: 9999;
    }

    .audio-btn{
        width: 52px;
        height: 52px;
        border-radius: 50%;
        border: none;
        background: #c9a227; /* warna emas GeoToba */
        color: white;
        cursor: pointer;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size: 20px;

        box-shadow: 0 4px 15px rgba(0,0,0,.2);
        transition: all .3s ease;
    }

    .audio-btn:hover{
        transform: scale(1.08);
    }

    .audio-btn.muted{
        background: #777;
    }
</style>

<section class="detail-gallery-section">
    <div class="detail-gallery-container">
        
        <div class="detail-date">
            {{ $galeri->created_at ? $galeri->created_at->translatedFormat('d F Y') : \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>

        <h1 class="detail-title">{{ $galeri->judul }}</h1>

        <div class="detail-author">
            <i class="fas fa-user"></i> Admin
        </div>

        @php
            $imgSrc = asset('image/default.jpg');
            if ($galeri->gambar) {
                if (file_exists(public_path($galeri->gambar)) || file_exists(public_path('storage/' . $galeri->gambar))) {
                    $imgSrc = route('galeri.gambar', ['id' => $galeri->id]);
                }
            }
        @endphp

        <div class="detail-image-wrapper">
            <img src="{{ $imgSrc }}" alt="{{ $galeri->judul }}">
        </div>

        <div class="detail-description">
            {{ $galeri->deskripsi ?? 'opretgjoisrdgjos' }}
        </div>

        <div class="btn-back-wrapper">
            <a href="{{ url('/galeri') }}" class="btn-geotoba-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Galeri
            </a>
        </div>

    </div>
</section>

<div class="audio-player">
    <button id="toggleAudio" class="audio-btn">
        <i class="fas fa-volume-up"></i>
    </button>

    <audio id="galleryAudio" autoplay>
        <source src="{{ asset('audio/sound.mp4') }}" type="audio/mp4">
    </audio>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const audio = document.getElementById('galleryAudio');
    const button = document.getElementById('toggleAudio');

    button.addEventListener('click', function () {

        if(audio.paused){

            audio.play();

            button.innerHTML =
                '<i class="fas fa-volume-up"></i>';

            button.classList.remove('muted');

        } else {

            audio.pause();

            button.innerHTML =
                '<i class="fas fa-volume-mute"></i>';

            button.classList.add('muted');

        }

    });

});
</script>
@endsection