@extends('layouts.app')

@section('title', 'GeoToba - Galeri')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
    /* 1. Header Baru: Modern, Lurus, dan Bersih */
    .gallery-header {
        background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                    url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=1600'); 
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        margin-bottom: 50px;
        text-align: center;
        color: white;
    }

    .gallery-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    .gallery-header p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.2rem;
        font-weight: 300;
        letter-spacing: 1px;
        max-width: 600px;
        margin: 0 auto;
    }

    /* 2. Grid Galeri (Memperbaiki tata letak 3 kolom) */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 80px;
    }

    /* 3. Efek Glassmorphism pada Kartu */
    .gallery-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
    }

    .gallery-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
    }

    /* 4. Kontainer Gambar dalam Kartu */
    .img-container {
        position: relative;
        overflow: hidden;
        margin: 15px;
        border-radius: 20px;
        background: #eee; /* Fallback jika gambar loading */
    }

    .gallery-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
    }

    .gallery-card:hover .gallery-img {
        transform: scale(1.1);
    }

    /* 5. Badge Kategori (Memperbaiki posisi teks seperti "fasilitas") */
    .gallery-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #C6A43B; /* Warna emas Geotoba */
        color: #000;
        padding: 6px 15px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* 6. Body Kartu (Teks di bawah gambar) */
    .gallery-body {
        padding: 5px 25px 25px;
    }

    .gallery-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 5px;
        text-transform: lowercase; /* Sesuai foto user: "tele", "efrata" */
    }

    .gallery-desc {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.6;
    }

    /* 7. Lightbox Styles (Animasi saat diklik) */
    .lightbox {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.95);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        transition: opacity 0.3s ease;
        padding: 20px;
    }

    .lightbox.active {
        display: flex;
        opacity: 1;
    }

    .lightbox-content {
        max-width: 900px;
        width: 100%;
        text-align: center;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }

    .lightbox.active .lightbox-content {
        transform: scale(1);
    }

    .lightbox-img {
        max-height: 70vh;
        max-width: 100%;
        border-radius: 20px;
        margin-bottom: 25px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    }

    .lightbox-info h3 {
        color: #C6A43B;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 2rem;
    }

    .close-lightbox {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 50px;
        color: #fff;
        cursor: pointer;
        z-index: 10000;
    }
</style>

{{-- HTML MARKUP --}}
<div class="gallery-header">
    <div class="container">
        <h1>🌟 Galeri Foto GeoToba</h1>
        <p>Jejak visual keindahan Geosite Tele, Efrata & Sihotang</p>
    </div>
</div>

<div class="container">
    <div class="gallery-grid">
        @forelse($galeris as $item)
            {{-- PENTING: data-attribute untuk menangkap info Lightbox --}}
            <div class="gallery-card" 
                 data-img="{{ route('galeri.gambar', $item->id) }}" 
                 data-title="{{ addslashes($item->judul) }}" 
                 data-desc="{{ addslashes($item->deskripsi) }}">
                
                <div class="img-container">
                    <span class="gallery-category">{{ $item->kategori }}</span>
                    {{-- Handle Base64 lewat Route --}}
                    <img class="gallery-img" src="{{ route('galeri.gambar', $item->id) }}" alt="{{ $item->judul }}" loading="lazy">
                </div>

                <div class="gallery-body">
                    <h3 class="gallery-title">{{ strtolower($item->judul) }}</h3>
                    <p class="gallery-desc">{{ Str::limit($item->deskripsi, 120) }}</p>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-light shadow-sm">Belum ada galeri yang tersedia.</div>
            </div>
        @endforelse
    </div>
</div>

{{-- Lightbox Markup --}}
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

{{-- JAVASCRIPT (Animasi Klik) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.gallery-card');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDesc = document.getElementById('lightbox-desc');
        const closeBtn = document.querySelector('.close-lightbox');

        cards.forEach(card => {
            card.addEventListener('click', function() {
                // Ambil data dari atribut kartu
                const imgSource = this.getAttribute('data-img');
                const titleText = this.getAttribute('data-title');
                const descText = this.getAttribute('data-desc');

                // Isi konten Lightbox
                lightboxImg.src = imgSource;
                lightboxTitle.innerText = titleText.toUpperCase();
                lightboxDesc.innerText = descText || 'Tidak ada deskripsi.';

                // Tampilkan Lightbox
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden'; // Kunci scroll layar
            });
        });

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = ''; // Aktifkan kembali scroll
        }

        closeBtn.addEventListener('click', closeLightbox);
        
        // Klik di luar gambar untuk menutup
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        // Menutup dengan tombol ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
        });
    });
</script>
@endsection