<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Menara Pandang Tele - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ==================== VARIABLES ==================== */
        :root {
            --primary: #002F5F;
            --primary-light: #004a8f;
            --gold: #D4AF37;
            --gold-light: #E5C56B;
            --dark: #1a1a2e;
            --gray: #6c757d;
            --light: #f8f9fa;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --shadow-hover: 0 20px 40px rgba(0,0,0,0.12);
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #333;
            line-height: 1.6;
            background: var(--white);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ==================== NAVBAR BIRU ==================== */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #002F5F;
            z-index: 1000;
            padding: 0;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-logo img {
            height: 35px;
            width: auto;
            object-fit: contain;
        }

        .logo-divider {
            width: 1px;
            height: 30px;
            background: rgba(255,255,255,0.3);
        }

        .logo-text h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: white;
            margin: 0;
            line-height: 1.2;
        }

        .logo-text h4 span {
            color: #D4AF37;
        }

        .logo-text p {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.7);
            margin: 0;
        }

        .nav-menu {
            display: flex;
            gap: 25px;
        }

        .nav-link {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            color: #D4AF37;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #D4AF37;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 2px;
            background: white;
            margin: 5px 0;
            transition: var(--transition);
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 300px;
            height: 100%;
            background: #002F5F;
            box-shadow: -5px 0 30px rgba(0,0,0,0.1);
            z-index: 1001;
            transition: 0.3s ease;
            padding: 80px 30px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .mobile-overlay.active {
            right: 0;
        }

        .mobile-close {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 2rem;
            cursor: pointer;
            color: white;
        }

        .mobile-link {
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .mobile-link:hover {
            color: #D4AF37;
        }

        /* ==================== HERO SECTION ==================== */
        .hero {
            height: 85vh;
            min-height: 550px;
            background: url('/image/tele/tele1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 65px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
        }

        .hero > div {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 16px;
            font-family: 'Cormorant Garamond', serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        /* ==================== SECTION STYLES ==================== */
        .section {
            padding: 80px 0;
        }

        .section:nth-child(even) {
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            font-family: 'Cormorant Garamond', serif;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: var(--gold);
            margin: 0 auto;
            border-radius: 3px;
        }

        .section-title p {
            margin-top: 20px;
            color: var(--gray);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ==================== INFORMASI CARD ==================== */
        .informasi-card {
            display: flex;
            flex-wrap: wrap;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
            transition: var(--transition);
        }

        .informasi-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .informasi-image {
            flex: 1;
            min-width: 300px;
            max-height: 350px;
            overflow: hidden;
        }

        .informasi-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .informasi-card:hover .informasi-image img {
            transform: scale(1.03);
        }

        .informasi-content {
            flex: 1;
            padding: 30px;
        }

        .informasi-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
            font-family: 'Cormorant Garamond', serif;
            border-left: 4px solid var(--gold);
            padding-left: 15px;
        }

        .informasi-text {
            color: #444;
            line-height: 1.8;
            font-size: 1rem;
        }

        .informasi-text p {
            margin-bottom: 15px;
        }

        /* ==================== GALERI GRID ==================== */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .galeri-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            height: 250px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .galeri-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .galeri-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .galeri-item:hover img {
            transform: scale(1.08);
        }

        .galeri-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,47,95,0.9));
            padding: 20px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .galeri-item:hover .galeri-overlay {
            transform: translateY(0);
        }

        .galeri-overlay h4 {
            font-size: 1rem;
            margin: 0 0 5px;
        }

        .galeri-overlay p {
            font-size: 0.8rem;
            margin: 0;
            opacity: 0.8;
        }

        /* ==================== CARD GRID ==================== */
        .grid-umkm, .grid-penginapan, .grid-fasilitas {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .card-item {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .card-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        .card-item:active {
            transform: scale(0.98);
        }

        .card-item .image-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f0f0f0;
        }

        .card-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card-item:hover img {
            transform: scale(1.08);
        }

        .card-item .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,47,95,0.9);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        .card-body {
            padding: 20px;
        }

        .card-body h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .card-body .deskripsi {
            color: #666;
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-body .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            font-size: 0.8rem;
            color: var(--gray);
        }

        .card-body .info-item i {
            color: var(--gold);
            width: 20px;
        }

        .card-body .harga {
            font-weight: 700;
            color: var(--primary);
            margin-top: 12px;
            font-size: 1rem;
        }

        /* ==================== MAPS SECTION ==================== */
        .maps-container {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .maps-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }

        .info-rute {
            background: var(--white);
            padding: 30px;
            border-radius: 24px;
            margin-top: 30px;
            box-shadow: var(--shadow);
        }

        .info-rute h4 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .info-rute p {
            margin-bottom: 12px;
            line-height: 1.8;
        }

        .info-rute strong {
            color: var(--primary);
        }

        /* ==================== FOOTER ==================== */
        .footer {
            background: #002F5F;
            color: white;
            padding: 40px 0 20px;
            margin-top: 0;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .footer-logo img {
            height: 45px;
            width: auto;
        }

        .footer-divider {
            width: 1px;
            height: 40px;
            background: rgba(255,255,255,0.3);
        }

        .footer-text h4 {
            font-size: 1.2rem;
            margin: 0;
        }

        .footer-text h4 span {
            color: #D4AF37;
        }

        .footer-text p {
            font-size: 0.7rem;
            opacity: 0.7;
            margin: 0;
        }

        .footer-info {
            text-align: right;
        }

        .footer-info p {
            margin: 5px 0;
            font-size: 0.85rem;
            opacity: 0.8;
        }

        .footer-info i {
            color: #D4AF37;
            margin-right: 8px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.2);
            font-size: 0.75rem;
            opacity: 0.6;
        }

        /* ==================== EMPTY STATE ==================== */
        .empty-state {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 20px;
            color: var(--gray);
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.2rem;
            }
            .galeri-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            .hamburger {
                display: block;
            }
            .hero {
                margin-top: 60px;
            }
            .hero-title {
                font-size: 1.6rem;
            }
            .hero-subtitle {
                font-size: 0.9rem;
            }
            .section {
                padding: 50px 0;
            }
            .section-title h2 {
                font-size: 1.6rem;
            }
            .grid-umkm, .grid-penginapan, .grid-fasilitas {
                grid-template-columns: 1fr;
            }
            .info-rute {
                padding: 20px;
            }
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
            .footer-info {
                text-align: center;
            }
            .footer-logo {
                justify-content: center;
            }
            .informasi-content {
                padding: 20px;
            }
            .informasi-content h3 {
                font-size: 1.2rem;
            }
            .galeri-item {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .nav-logo img {
                height: 25px;
            }
            .logo-text h4 {
                font-size: 0.9rem;
            }
            .logo-text p {
                font-size: 0.5rem;
            }
            .logo-divider {
                height: 20px;
            }
            .hero-title {
                font-size: 1.3rem;
            }
            .galeri-grid {
                grid-template-columns: 1fr;
            }
        }
        .grid-umkm .empty-state, .grid-penginapan .empty-state, .grid-fasilitas .empty-state,.galeri-grid .empty-state {
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>

<!-- ==================== NAVBAR ==================== -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="/image/logo/logobankindonesia.jpg" alt="Logo Bank Indonesia">
            <div class="logo-divider"></div>
            <img src="/image/logo/del.jpg" alt="Logo Del">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#informasi" class="nav-link">Informasi</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">&times;</div>
    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#informasi" class="mobile-link">Informasi</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- ==================== HERO SECTION ==================== -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">Menara Pandang Tele</h1>
        <p class="hero-subtitle">Desa Turpuk Limbong · Samosir · UNESCO Global Geopark</p>
    </div>
</section>

<!-- ==================== INFORMASI TELE SECTION ==================== -->
<section id="informasi" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi & Legenda Tele</h2>
            <div class="divider"></div>
        </div>
        
        @if(isset($informasi) && $informasi->count() > 0)
            @foreach($informasi as $info)
            <div class="informasi-card" data-aos="fade-up">
                @if($info->gambar && file_exists(public_path($info->gambar)))
                    <div class="informasi-image">
                        <img src="{{ asset($info->gambar) }}" alt="{{ $info->judul }}">
                    </div>
                @endif
                <div class="informasi-content">
                    <h3>{{ $info->judul }}</h3>
                    <div class="informasi-text">
                        {!! nl2br(e($info->konten)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="informasi-default" data-aos="fade-up">
                <p>Menara Pandang Tele adalah menara pengamatan setinggi 25 meter yang terletak di Desa Turpuk Limbong, Kecamatan Harian, Kabupaten Samosir, Sumatera Utara, pada ketinggian 1.479 meter di atas permukaan laut.</p>
                <p>Terletak di perbukitan dengan udara sejuk, Menara Pandang Tele menjadi spot wajib bagi pelancong yang ingin menikmati panorama alam dan berburu foto Instagramable. Setelah pemekaran wilayah pada 2003, menara ini menjadi bagian dari Kabupaten Samosir dan kini masuk dalam Kawasan Strategis Pariwisata Nasional (KSPN) Danau Toba.</p>
            </div>
        @endif
    </div>
</section>

<!-- ==================== GALERI SECTION ==================== -->
<section id="galeri" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Foto Tele</h2>
            <div class="divider"></div>
            <p>Dokumentasi keindahan Menara Pandang Tele</p>
        </div>
        
        <div class="galeri-grid">
            @php
                $galeriTele = App\Models\Galeri::where('kategori', 'tele')->where('status', 1)->orderBy('created_at', 'desc')->get();
            @endphp
            
            @forelse($galeriTele as $item)
            <div class="galeri-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                @php
                    $imgSrc = asset($item->gambar);
                    if(!file_exists(public_path($item->gambar))) {
                        $imgSrc = asset('image/default.jpg');
                    }
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $item->judul }}">
                <div class="galeri-overlay">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ Str::limit($item->deskripsi, 50) }}</p>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-images fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada foto galeri untuk Tele.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== UMKM SECTION (DIPERBAIKI) ==================== -->
<section id="umkm" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Berbagai produk unggulan dari masyarakat sekitar Menara Pandang Tele</p>
        </div>
        
        <div class="grid-umkm">
            @forelse($umkm as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        // Perbaikan path foto UMKM
                        $fotoUrl = asset('image/default-umkm.jpg'); // default
                        if($item->foto_utama) {
                            // Cek apakah file ada di storage
                            $storagePath = storage_path('app/public/' . $item->foto_utama);
                            if(file_exists($storagePath)) {
                                $fotoUrl = asset('storage/' . $item->foto_utama);
                            } else {
                                // Coba cek di public
                                $publicPath = public_path($item->foto_utama);
                                if(file_exists($publicPath)) {
                                    $fotoUrl = asset($item->foto_utama);
                                }
                            }
                        }
                    @endphp
                    <img src="{{ $fotoUrl }}" alt="{{ $item->nama_usaha }}">
                    <span class="category-badge">{{ $item->kategori ?? 'UMKM' }}</span>
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama_usaha }}</h4>
                    <div class="info-item">
                        <i class="fas fa-user"></i>
                        <span>{{ $item->pemilik ?? 'Tidak tersedia' }}</span>
                    </div>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 100) }}</div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ Str::limit($item->alamat ?? 'Lokasi tidak tersedia', 60) }}</span>
                    </div>
                    @if($item->no_telepon)
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $item->no_telepon }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-store fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data UMKM.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== PENGINAPAN SECTION (DIPERBAIKI) ==================== -->
<section id="penginapan" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Penginapan & Homestay</h2>
            <div class="divider"></div>
            <p>Rekomendasi tempat menginap di sekitar kawasan Tele</p>
        </div>
        
        <div class="grid-penginapan">
            @forelse($penginapan as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        $gambarUrl = asset('image/default-hotel.jpg');
                        if($item->gambar) {
                            if(file_exists(public_path($item->gambar))) {
                                $gambarUrl = asset($item->gambar);
                            } elseif(file_exists(storage_path('app/public/' . $item->gambar))) {
                                $gambarUrl = asset('storage/' . $item->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $gambarUrl }}" alt="{{ $item->nama }}">
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama }}</h4>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 80) }}</div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ Str::limit($item->alamat ?? 'Alamat tidak tersedia', 50) }}</span>
                    </div>
                    @if($item->no_telepon)
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $item->no_telepon }}</span>
                    </div>
                    @endif
                    @if($item->harga)
                    <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }} <span style="font-size: 0.7rem;">/ malam</span></div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-hotel fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data penginapan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== FASILITAS SECTION (DIPERBAIKI) ==================== -->
<section id="fasilitas" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fasilitas Wisata</h2>
            <div class="divider"></div>
            <p>Berbagai fasilitas yang tersedia di Menara Pandang Tele</p>
        </div>
        
        <div class="grid-fasilitas">
            @forelse($fasilitas as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        $gambarUrl = asset('image/default-fasilitas.jpg');
                        if($item->gambar) {
                            if(file_exists(public_path($item->gambar))) {
                                $gambarUrl = asset($item->gambar);
                            } elseif(file_exists(storage_path('app/public/' . $item->gambar))) {
                                $gambarUrl = asset('storage/' . $item->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $gambarUrl }}" alt="{{ $item->nama }}">
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama }}</h4>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 80) }}</div>
                    @if($item->harga)
                    <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-concierge-bell fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data fasilitas.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== LOKASI SECTION ==================== -->
<section id="lokasi" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Temukan rute menuju Menara Pandang Tele</p>
        </div>
        
        <div class="maps-container" data-aos="fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15943.444458681364!2d98.62135836667979!3d2.552062367800812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d060f0e3180b%3A0xb561ba45f008aa18!2sMenara%20Pandang%20Tele!5e0!3m2!1sid!2sid!4v1778767596787!5m2!1sid!2sid" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
        
        <div class="info-rute" data-aos="fade-up">
            <h4><i class="fas fa-location-dot"></i> Rute Menuju Menara Pandang Tele</h4>
            <p><strong>Dari Medan:</strong> Perjalanan darat sekitar 5-6 jam melalui Parapat, kemudian menyeberang dengan feri ke Pulau Samosir (sekitar 45 menit). Setelah sampai di Pulau Samosir, perjalanan ke Menara Pandang Tele sekitar 1 jam dari Pelabuhan Tomok.</p>
            <p><strong>Dari Pangururan:</strong> Hanya 22 km dengan waktu tempuh sekitar 40 menit melalui Jalan Lintas Tele–Pangururan.</p>
            <p><strong>Dari Pelabuhan Tomok:</strong> Jarak sekitar 50 km dengan waktu tempuh 1.5 jam.</p>
            <p><strong>Jam Operasional:</strong> 08.00 - 18.00 WIB (Setiap Hari)</p>
            <p><strong>Tiket Masuk:</strong> Rp 15.000 - Rp 25.000 per orang</p>
        </div>
    </div>
</section>

<!-- ==================== FOOTER ==================== -->
<section id="lokasi" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Temukan rute menuju Menara Pandang Tele</p>
        </div>
        
        <div class="maps-container" data-aos="fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.4449733479133!2d98.65088637583683!3d2.3551523575306494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031dd7aee90d9fb%3A0xe67ca0df0df3c1ab!2sMenara%20Pandang%20Tele!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
        
        <div class="info-rute" data-aos="fade-up">
            <h4><i class="fas fa-location-dot"></i> Rute Menuju Menara Pandang Tele</h4>
            <p><strong>Dari Medan:</strong> Perjalanan darat sekitar 5-6 jam melalui Parapat, kemudian menyeberang dengan feri ke Pulau Samosir (sekitar 45 menit). Setelah sampai di Pulau Samosir, perjalanan ke Menara Pandang Tele sekitar 1 jam dari Pelabuhan Tomok.</p>
            <p><strong>Dari Pangururan:</strong> Hanya 22 km dengan waktu tempuh sekitar 40 menit melalui Jalan Lintas Tele–Pangururan.</p>
            <p><strong>Dari Pelabuhan Tomok:</strong> Jarak sekitar 50 km dengan waktu tempuh 1.5 jam.</p>
            <p><strong>Jam Operasional:</strong> 08.00 - 18.00 WIB (Setiap Hari)</p>
            <p><strong>Tiket Masuk:</strong> Rp 15.000 - Rp 25.000 per orang.</p>
        </div>
    </div>
</section>

<section class="cta" style="background: #002F5F; padding: 60px 0; text-align: center; color: white;">
    <div class="container" data-aos="fade-up">
        <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; margin-bottom: 15px;">Kunjungi Tele</h3>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <p style="opacity: 0.9; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">Nikmati keindahan Danau Toba dan budaya Batak yang autentik.</p>
        <a href="{{ route('home') }}" class="cta-btn" style="display: inline-block; padding: 12px 35px; background: var(--gold); color: #002F5F; text-decoration: none; font-weight: 600; border-radius: 30px; transition: var(--transition);">Kembali ke Beranda</a>
    </div>
</section>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="/image/logo/logobankindonesia.jpg" alt="Logo Bank Indonesia">
                <div class="footer-divider"></div>
                <img src="/image/logo/del.jpg" alt="Logo Del">
                <div class="footer-divider"></div>
                <div class="footer-text">
                    <h4>GEO<span>TOBA</span></h4>
                    <p>Geopark Danau Toba</p>
                </div>
            </div>
            <div class="footer-info">
                <p><i class="fas fa-map-marker-alt"></i> Menara Pandang Tele, Kabupaten Samosir</p>
                <p><i class="fas fa-clock"></i> Buka Setiap Hari: 08.00 - 18.00 WIB</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 Geopark Danau Toba. All rights reserved.
        </div>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });

    // Mobile Menu Logic
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    if(hamburger && mobileOverlay && mobileClose) {
        hamburger.addEventListener('click', () => mobileOverlay.classList.add('active'));
        mobileClose.addEventListener('click', () => mobileOverlay.classList.remove('active'));
    }
</script>
</body>
</html>