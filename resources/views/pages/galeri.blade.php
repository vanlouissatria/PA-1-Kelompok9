@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<style>
    .gallery-header {
        background: linear-gradient(135deg, #003366 0%, #005c8a 100%);
        padding: 60px 0 40px;
        margin-bottom: 40px;
        text-align: center;
        color: white;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    }
    .gallery-header h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3rem;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }
    .gallery-header p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }
    .gallery-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.02);
        transition: all 0.35s ease;
        cursor: pointer;
        position: relative;
    }
    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px -10px rgba(0,0,0,0.2);
    }
    .gallery-img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .gallery-card:hover .gallery-img {
        transform: scale(1.05);
    }
    .gallery-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(198, 164, 59, 0.9);
        color: #003366;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        backdrop-filter: blur(4px);
        z-index: 2;
    }
    .gallery-body {
        padding: 20px;
    }
    .gallery-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
    }
    .gallery-desc {
        font-size: 0.85rem;
        color: #4a5568;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    /* Lightbox Modal */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.92);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .lightbox.active {
        display: flex;
    }
    .lightbox-content {
        max-width: 90%;
        max-height: 85vh;
        background: #1a1a1a;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        cursor: default;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
    }
    .lightbox-img {
        max-width: 100%;
        max-height: 65vh;
        object-fit: contain;
        background: #000;
    }
    .lightbox-info {
        padding: 20px 30px;
        background: #1e1e1e;
        color: #eee;
    }
    .lightbox-info h3 {
        margin: 0 0 10px;
        font-size: 1.5rem;
        color: #c6a43b;
    }
    .lightbox-info p {
        margin: 0;
        font-size: 0.9rem;
        line-height: 1.6;
    }
    .close-lightbox {
        position: absolute;
        top: 25px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        z-index: 10000;
    }
    .close-lightbox:hover {
        color: #c6a43b;
        transform: rotate(90deg);
    }
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }
        .gallery-header h1 { font-size: 2rem; }
        .lightbox-info { padding: 15px; }
        .lightbox-info h3 { font-size: 1.2rem; }
    }
</style>

<!-- Header -->
<div class="gallery-header">
    <div class="container">
        <h1>🌟 Galeri Foto GeoToba</h1>
        <p>Jejak visual keindahan Geosite Tele, Efrata & Sihotang</p>
    </div>
</div>

<div class="container">
    <div class="gallery-grid">
        @forelse($galeriByKategori as $kategori => $items)
            @foreach($items as $item)
            <div class="gallery-card" data-img="{{ route('galeri.gambar', $item->id) }}" data-title="{{ addslashes($item->judul) }}" data-desc="{{ addslashes($item->deskripsi) }}" data-category="{{ $kategori }}">
                <span class="gallery-category">{{ strtoupper($kategori) }}</span>
                <img class="gallery-img" src="{{ route('galeri.gambar', $item->id) }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='https://placehold.co/600x400?text=Gambar+Tidak+Tersedia'">
                <div class="gallery-body">
                    <h3 class="gallery-title">{{ $item->judul }}</h3>
                    <p class="gallery-desc">{{ Str::limit($item->deskripsi, 100) }}</p>
                </div>
            </div>
            @endforeach
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">Belum ada galeri yang diupload. Silakan login sebagai admin untuk menambahkan.</div>
            </div>
        @endforelse
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <div class="lightbox-content">
        <img class="lightbox-img" id="lightbox-img" src="" alt="">
        <div class="lightbox-info">
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-desc"></p>
        </div>
    </div>
</div>

<script>
    // Lightbox functionality
    const cards = document.querySelectorAll('.gallery-card');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxDesc = document.getElementById('lightbox-desc');
    const closeBtn = document.querySelector('.close-lightbox');

    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            const imgSrc = this.getAttribute('data-img');
            const title = this.getAttribute('data-title');
            const desc = this.getAttribute('data-desc');
            const category = this.getAttribute('data-category');
            
            lightboxImg.src = imgSrc;
            lightboxTitle.innerText = title + ' — ' + category.toUpperCase();
            lightboxDesc.innerText = desc || 'Tidak ada deskripsi.';
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        lightboxImg.src = '';
    }

    closeBtn.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            closeLightbox();
        }
    });
</script>
@endsection