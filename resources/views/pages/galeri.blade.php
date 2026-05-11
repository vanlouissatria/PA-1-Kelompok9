@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<style>
    /* 1. Header Baru: Lurus, Modern, dan Bersih */
    .gallery-header {
        background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                    url('https://source.unsplash.com/1600x900/?lake,mountain'); /* Ganti dengan gambar Toba jika ada */
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        margin-bottom: 50px;
        text-align: center;
        color: white;
        /* Menghapus clip-path agar header lurus */
    }

    .gallery-header h1 {
        font-family: 'Playfair Display', serif; /* Font lebih elegan */
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    .gallery-header p {
        font-size: 1.2rem;
        font-weight: 300;
        letter-spacing: 1px;
        max-width: 600px;
        margin: 0 auto;
    }

    /* 2. Grid Galeri */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 80px;
    }

    /* 3. Efek Glassmorphism pada Kartu (Sesuai Foto) */
    .gallery-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px; /* Sudut lebih melengkung lembut */
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
    }

    .gallery-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
    }

    /* 4. Kontainer Gambar */
    .img-container {
        position: relative;
        overflow: hidden;
        margin: 15px; /* Memberi jarak dalam seperti di foto */
        border-radius: 20px;
    }

    .gallery-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .gallery-card:hover .gallery-img {
        transform: scale(1.1);
    }

    /* 5. Badge Kategori (Kuning di kiri atas gambar) */
    .gallery-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #C6A43B; /* Warna emas/kuning Geotoba */
        color: #000;
        padding: 6px 15px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* 6. Body Kartu */
    .gallery-body {
        padding: 5px 25px 25px;
    }

    .gallery-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 10px;
        text-transform: lowercase; /* Sesuai foto user: "sihotang", "tele" */
    }

    .gallery-desc {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.6;
    }

    /* Lightbox tetap sama namun diperhalus */
    .lightbox-content {
        border-radius: 30px;
        border: 1px solid rgba(255,255,255,0.2);
    }
</style>

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
            <div class="gallery-card" 
                 data-img="{{ route('galeri.gambar', $item->id) }}" 
                 data-title="{{ addslashes($item->judul) }}" 
                 data-desc="{{ addslashes($item->deskripsi) }}" 
                 data-category="{{ $kategori }}">
                
                <div class="img-container">
                    <span class="gallery-category">{{ $kategori }}</span>
                    <img class="gallery-img" src="{{ route('galeri.gambar', $item->id) }}" alt="{{ $item->judul }}" loading="lazy">
                </div>

                <div class="gallery-body">
                    <h3 class="gallery-title">{{ strtolower($item->judul) }}</h3>
                    <p class="gallery-desc">{{ Str::limit($item->deskripsi, 120) }}</p>
                </div>
            </div>
            @endforeach
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-light shadow-sm">Belum ada galeri yang tersedia.</div>
            </div>
        @endforelse
    </div>
</div>

<div id="lightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <div class="lightbox-content">
        <img class="lightbox-img" id="lightbox-img" src="">
        <div class="lightbox-info">
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-desc"></p>
        </div>
    </div>
</div>

<script>
    // Script Lightbox Anda sudah bagus, tetap gunakan yang sama
    const cards = document.querySelectorAll('.gallery-card');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxDesc = document.getElementById('lightbox-desc');
    const closeBtn = document.querySelector('.close-lightbox');

    cards.forEach(card => {
        card.addEventListener('click', function() {
            lightboxImg.src = this.getAttribute('data-img');
            lightboxTitle.innerText = this.getAttribute('data-title').toUpperCase();
            lightboxDesc.innerText = this.getAttribute('data-desc') || 'Tidak ada deskripsi.';
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    closeBtn.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
</script>
@endsection