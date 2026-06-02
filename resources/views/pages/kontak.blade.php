@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== LOGO SECTION ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(255, 255, 255, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }
    
    .logo-container:hover {
        background: white;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: #e0e0e0;
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: #5a6e7c;
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }

    /* ==================== HERO ==================== */
    .kontak-hero {
        height: 45vh;
        background: linear-gradient(135deg, rgba(0,0,0,0.65), rgba(0,0,0,0.4)),
                    url('/image/kontak-hero.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
        position: relative;
    }
    
    .kontak-hero::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, #fafaf8, transparent);
    }
    
    .kontak-hero h1 {
        font-size: 3.5rem;
        font-weight: 400;
        font-family: 'Cormorant Garamond', serif;
        letter-spacing: 0.02em;
        margin-bottom: 15px;
    }
    
    .kontak-hero p {
        font-size: 1rem;
        opacity: 0.85;
        letter-spacing: 0.2em;
        text-transform: uppercase;
    }
    
    /* ==================== KONTAK SECTION ==================== */
    .kontak-section {
        padding: 60px 0;
    }
    
    .kontak-card {
        background: white;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
        height: 100%;
    }
    
    .kontak-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .kontak-icon {
        width: 65px;
        height: 65px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
    }
    
    .kontak-icon i {
        font-size: 28px;
        color: #c6a43b;
    }
    
    .kontak-card h4 {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: #1a1a1a;
    }
    
    .kontak-card p {
        color: #666;
        margin-bottom: 5px;
        font-size: 0.85rem;
        line-height: 1.5;
    }
    
    /* ==================== MAPS ==================== */
    .map-card {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
        background: white;
        height: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }
    
    .map-card iframe {
        width: 100%;
        height: 550px;
        border: 0;
    }
    
    .map-info {
        padding: 30px 35px;
        text-align: center;
    }
    
    .map-info h4 {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #1a1a1a;
    }
    
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    
    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f5f4f0;
        border-radius: 50%;
        color: #1a1a1a;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-icons a:hover {
        background: #c6a43b;
        color: white;
        transform: translateY(-3px);
    }
    
    .jam-operasional p {
        margin-bottom: 5px;
        font-size: 0.85rem;
        color: #666;
    }
    
    .jam-operasional h5 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #1a1a1a;
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .kontak-hero h1 {
            font-size: 2.2rem;
        }
        .kontak-hero p {
            font-size: 0.8rem;
        }
        .kontak-section {
            padding: 40px 0;
        }
    }
    
    @media (max-width: 576px) {
        .kontak-hero h1 {
            font-size: 1.8rem;
        }
        .kontak-card {
            padding: 20px 15px;
        }
    }
</style>

<!-- HERO -->
<section class="kontak-hero">
    <div class="container">
        <h1 data-aos="fade-up">{{ $kontak->judul ?? 'Hubungi Kami' }}</h1>
        <p data-aos="fade-up" data-aos-delay="100">{{ $kontak->subjudul ?? 'Senang mendengar dari Anda' }}</p>
    </div>
</section>

<!-- KONTAK SECTION -->
<section class="kontak-section">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- ALAMAT (Dinamis) -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Alamat</h4>
                    {!! nl2br(e($kontak->alamat ?? 'Geosite Danau Toba<br>Pulau Sibandang, Danau Toba<br>Sumatera Utara, Indonesia')) !!}
                </div>
            </div>
            
            <!-- TELEPON (Dinamis) -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Telepon</h4>
                @if($kontak?->telepon1)
                    <p>{{ $kontak->telepon1 }}</p>
                @endif
                @if($kontak?->telepon2)
                    <p>{{ $kontak->telepon2 }}</p>
                @endif
                @if($kontak?->telepon3)
                    <p>{{ $kontak->telepon3 }}</p>
                @endif
                @if(!$kontak || (!$kontak->telepon1 && !$kontak->telepon2 && !$kontak->telepon3))
                    <p>Nomor telepon belum diisi</p>
                @endif
                </div>
            </div>
            
            <!-- EMAIL (Dinamis) -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                @if($kontak?->email1)
                    <p>{{ $kontak->email1 }}</p>
                @endif
                @if($kontak?->email2)
                    <p>{{ $kontak->email2 }}</p>
                @endif
                @if($kontak?->email3)
                    <p>{{ $kontak->email3 }}</p>
                @endif
                @if(!$kontak || (!$kontak->email1 && !$kontak->email2 && !$kontak->email3))
                    <p>Email belum diisi</p>
                @endif
                </div>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- MAPS & SOSIAL -->
            <div class="col-12 col-lg-10" data-aos="fade-left">
                <div class="map-card mx-auto">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <div class="map-info">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                        <div class="jam-operasional">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat: 08:00 - 17:00</p>
                            <p>Sabtu - Minggu: 08:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

@endsection