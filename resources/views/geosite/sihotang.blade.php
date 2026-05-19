<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sihotang - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #002F5F; --primary-light: #004a8f; --gold: #D4AF37; --light: #f8f9fa; --white: #ffffff; --shadow: 0 10px 30px rgba(0,0,0,0.08); --shadow-hover: 0 20px 40px rgba(0,0,0,0.12); --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; color: #333; background: var(--white); }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }
        .navbar { position: fixed; top: 0; left: 0; width: 100%; background: #002F5F; z-index: 1000; }
        .nav-container { max-width: 1280px; margin: 0 auto; padding: 16px 24px; display: flex; justify-content: space-between; align-items: center; }
        .nav-logo { display: flex; align-items: center; gap: 10px; }
        .nav-logo img { height: 35px; object-fit: contain; }
        .logo-divider { width: 1px; height: 28px; background: rgba(255,255,255,0.25); }
        .logo-text h4 { font-size: 1.2rem; color: white; margin: 0; line-height: 1.1; }
        .logo-text p { font-size: 0.75rem; color: rgba(255,255,255,0.75); margin: 0; }
        .nav-menu { display: flex; gap: 24px; }
        .nav-link { text-decoration: none; color: white; font-weight: 500; position: relative; }
        .nav-link:hover, .nav-link.active { color: var(--gold); }
        .nav-link.active::after { content: ''; position: absolute; bottom: -6px; left: 0; width: 100%; height: 2px; background: var(--gold); }
        .hamburger { display: none; background: none; border: none; cursor: pointer; padding: 10px; }
        .hamburger span { display: block; width: 26px; height: 3px; background: white; margin: 5px 0; border-radius: 3px; }
        .mobile-overlay { position: fixed; top: 0; right: -100%; width: 80%; max-width: 320px; height: 100%; background: #002F5F; padding: 80px 24px; display: flex; flex-direction: column; gap: 22px; transition: 0.3s ease; z-index: 1001; }
        .mobile-overlay.active { right: 0; }
        .mobile-close { position: absolute; top: 22px; right: 22px; font-size: 2rem; color: white; cursor: pointer; }
        .mobile-link { color: white; text-decoration: none; font-size: 1rem; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.15); }
        .mobile-link:hover { color: var(--gold); }
        .hero { min-height: 75vh; background: url('/image/meat/meat-hero.jpg') center/cover no-repeat fixed; display: flex; align-items: center; justify-content: center; text-align: center; color: white; padding-top: 84px; position: relative; }
        .hero::before { content: ''; position: absolute; inset: 0; background: rgba(0,0,0,0.45); }
        .hero > div { position: relative; z-index: 1; }
        .hero-title { font-size: 3rem; letter-spacing: 1px; font-weight: 800; margin-bottom: 16px; font-family: 'Cormorant Garamond', serif; }
        .hero-subtitle { font-size: 1.05rem; opacity: 0.92; letter-spacing: 0.8px; }
        .section { padding: 80px 0; }
        .section:nth-child(even) { background: var(--light); }
        .section-title { text-align: center; margin-bottom: 45px; }
        .section-title h2 { font-size: 2rem; color: var(--primary); font-weight: 700; margin-bottom: 14px; font-family: 'Cormorant Garamond', serif; }
        .divider { width: 90px; height: 3px; background: var(--gold); margin: 0 auto; border-radius: 3px; }
        .section-title p { color: #5b6770; margin-top: 18px; max-width: 640px; margin-left: auto; margin-right: auto; }
        .sejarah-grid, .grid-umkm, .grid-penginapan, .grid-fasilitas { display: grid; gap: 30px; justify-content: center; justify-items: center; }
        .sejarah-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .sejarah-item { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; align-items: center; background: white; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); }
        .sejarah-item.reverse { grid-template-columns: 1fr 1fr; }
        .sejarah-image { min-height: 320px; overflow: hidden; }
        .sejarah-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.45s ease; }
        .sejarah-item:hover .sejarah-image img { transform: scale(1.05); }
        .sejarah-text { padding: 32px; color: #3f4a5a; line-height: 1.8; }
        .sejarah-text h4 { margin-bottom: 14px; color: var(--primary); }
        .informasi-card { display: flex; flex-wrap: wrap; background: white; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); margin-bottom: 40px; transition: var(--transition); }
        .informasi-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-hover); }
        .informasi-image { flex: 1; min-width: 300px; max-height: 350px; overflow: hidden; }
        .informasi-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .informasi-content { flex: 1; padding: 30px; }
        .informasi-content h3 { font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 20px; font-family: 'Cormorant Garamond', serif; border-left: 4px solid var(--gold); padding-left: 15px; }
        .informasi-text { color: #444; line-height: 1.8; font-size: 1rem; }
        .informasi-text p { margin-bottom: 15px; }
        .galeri-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; justify-content: center; justify-items: center; }
        .galeri-item { position: relative; overflow: hidden; border-radius: 24px; min-height: 250px; box-shadow: var(--shadow); }
        .galeri-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.45s ease; }
        .galeri-item:hover img { transform: scale(1.08); }
        .galeri-overlay { position: absolute; inset: auto 0 0 0; background: linear-gradient(transparent, rgba(0,0,0,0.80)); color: white; padding: 18px; transform: translateY(100%); transition: transform 0.3s ease; }
        .galeri-item:hover .galeri-overlay { transform: translateY(0); }
        .galeri-overlay h4 { margin: 0 0 6px; font-size: 1rem; }
        .card-item { background: white; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); transition: var(--transition); }
        .card-item:hover { transform: translateY(-8px); box-shadow: var(--shadow-hover); }
        .card-item .image-wrapper { position: relative; height: 230px; overflow: hidden; background: #f0f0f0; }
        .card-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.45s ease; }
        .card-item:hover img { transform: scale(1.06); }
        .category-badge { position: absolute; top: 16px; right: 16px; background: rgba(0,47,95,0.9); color: white; padding: 7px 14px; border-radius: 999px; font-size: 0.75rem; }
        .card-body { padding: 24px; }
        .card-body h4 { margin: 0 0 10px; font-size: 1.2rem; color: var(--primary); }
        .deskripsi { color: #5b6770; line-height: 1.75; font-size: 0.95rem; margin-bottom: 16px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .info-item { display: flex; align-items: center; gap: 10px; color: #6f7a89; font-size: 0.9rem; margin-top: 10px; }
        .info-item i { color: var(--gold); min-width: 18px; }
        .harga { font-weight: 700; color: var(--primary); margin-top: 14px; font-size: 1rem; }
        .maps-container { border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); }
        .maps-container iframe { width: 100%; height: 420px; border: 0; }
        .info-rute { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow); margin-top: 30px; }
        .info-rute h4 { margin-bottom: 18px; color: var(--primary); font-size: 1.3rem; }
        .info-rute p { margin-bottom: 12px; line-height: 1.75; color: #4a5866; }
        .info-rute strong { color: var(--primary); }
        .cta { background: #002F5F; color: white; padding: 60px 0; text-align: center; }
        .cta h3 { font-size: 2rem; margin-bottom: 20px; font-weight: 700; }
        .cta p { max-width: 620px; margin: 0 auto 26px; color: rgba(255,255,255,0.83); line-height: 1.8; }
        .cta-btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 30px; background: var(--gold); color: var(--primary); font-weight: 700; border-radius: 999px; text-decoration: none; transition: transform 0.25s ease; }
        .cta-btn:hover { transform: translateY(-2px); }
        .footer { background: #002F5F; color: white; padding: 40px 0 24px; }
        .footer-container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }
        .footer-content { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px; align-items: center; }
        .footer-logo { display: flex; align-items: center; gap: 15px; }
        .footer-logo img { height: 45px; object-fit: contain; }
        .footer-divider { width: 1px; height: 40px; background: rgba(255,255,255,0.3); }
        .footer-text h4 { margin: 0; font-size: 1.2rem; }
        .footer-text span { color: var(--gold); }
        .footer-text p, .footer-info p { margin: 5px 0; opacity: 0.75; font-size: 0.9rem; }
        .footer-info { text-align: right; }
        .footer-bottom { text-align: center; padding-top: 18px; border-top: 1px solid rgba(255,255,255,0.18); font-size: 0.78rem; opacity: 0.65; }
        .empty-state {
    width: 420px;
    min-height: 190px;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    margin: 0 auto;
    text-align: center;
    padding: 45px;

    background: white;
    border-radius: 24px;
    color: #6f7a89;

    box-shadow: 0 15px 35px rgba(0,0,0,0.08);

    justify-self: center;
}

.empty-state i {
    font-size: 3rem;
    color: var(--gold);
    margin-bottom: 18px;
}

.grid-umkm .empty-state,
.grid-penginapan .empty-state,
.grid-fasilitas .empty-state,
.galeri-grid .empty-state {
    grid-column: 1 / -1;
}

@media (max-width: 992px) {
    .sejarah-grid {
        grid-template-columns: 1fr;
    }

    .grid-umkm,
    .grid-penginapan,
    .grid-fasilitas {
        grid-template-columns: 1fr;
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
        min-height: 55vh;
    }

    .hero-title {
        font-size: 2.2rem;
    }

    .section {
        padding: 55px 0;
    }

    .footer-info {
        text-align: center;
    }
}

@media (max-width: 576px) {
    .navbar {
        padding: 0;
    }

    .nav-container {
        padding: 14px 18px;
    }

    .hero-title {
        font-size: 1.8rem;
    }

    .hero-subtitle {
        font-size: 0.95rem;
    }

    .empty-state {
        width: 100%;
    }
}
    </style>
</head>
<body>

<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Logo BI">
            <div class="logo-divider"></div>
            <img src="{{ asset('image/logo/del.jpg') }}" alt="Logo Del">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#informasi" class="nav-link">Informasi</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">&times;</div>
    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#informasi" class="mobile-link">Informasi</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">Sihotang</h1>
        <p class="hero-subtitle">Pulau Samosir · Danau Toba · Budaya & Alam</p>
    </div>
</section>

<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Budaya Sihotang</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="{{ asset('image/meat/meat-detail.jpg') }}" alt="Sihotang"></div>
                <div class="sejarah-text"><h4>Panorama Alam</h4><p>Sihotang menawarkan pemandangan Danau Toba yang memukau, udara sejuk, dan pengalaman wisata budaya yang kuat.</p></div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image"><img src="{{ asset('image/meat/meat-hero.jpg') }}" alt="Sihotang"></div>
                <div class="sejarah-text"><h4>Budaya Batak</h4><p>Budaya Batak masih hidup di Sihotang melalui rumah adat, tarian, dan kerajinan lokal yang dikenalkan kepada pengunjung.</p></div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="{{ asset('image/meat/slide1.jpg') }}" alt="Sihotang"></div>
                <div class="sejarah-text"><h4>Destinasi Wisata</h4><p>Wilayah ini menjadi salah satu tujuan terbaik di Danau Toba untuk menikmati alam, budaya, dan pengalaman lokal.</p></div>
            </div>
        </div>
    </div>
</section>

<section id="informasi" class="section" style="background: var(--light);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi Wisata Sihotang</h2>
            <div class="divider"></div>
            <p>Persiapkan perjalanan Anda dengan informasi terbaru seputar Sihotang.</p>
        </div>
        @if(isset($informasi) && $informasi->count())
            @foreach($informasi as $info)
                <div class="informasi-card" data-aos="fade-up">
                    @if($info->gambar && file_exists(public_path($info->gambar)))
                        <div class="informasi-image"><img src="{{ asset($info->gambar) }}" alt="{{ $info->judul }}"></div>
                    @endif
                    <div class="informasi-content"><h3>{{ $info->judul }}</h3><div class="informasi-text">{!! nl2br(e($info->konten)) !!}</div></div>
                </div>
            @endforeach
        @else
            <div class="informasi-card" data-aos="fade-up">
                <div class="informasi-content"><h3>Informasi Umum Sihotang</h3><div class="informasi-text"><p>Wisata Sihotang buka setiap hari. Akses mudah dari Pangururan dan Tomok, dengan pilihan paket wisata budaya dan alam.</p><p>Pastikan membawa perlengkapan nyaman dan kamera untuk menangkap pemandangan Danau Toba.</p></div></div>
            </div>
        @endif
    </div>
</section>

<section id="galeri" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Sihotang</h2>
            <div class="divider"></div>
            <p>Dokumentasi pemandangan dan aktivitas wisata di Sihotang.</p>
        </div>
        <div class="galeri-grid">
            @forelse($galeri as $item)
                @php
                    $gambarUrl = asset('image/default.jpg');
                    if($item->gambar) {
                        if(file_exists(public_path($item->gambar))) {
                            $gambarUrl = asset($item->gambar);
                        } elseif(file_exists(storage_path('app/public/' . $item->gambar))) {
                            $gambarUrl = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <div class="galeri-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <img src="{{ $gambarUrl }}" alt="{{ $item->judul }}">
                    <div class="galeri-overlay"><h4>{{ $item->judul }}</h4><p>{{ Str::limit($item->deskripsi ?? '', 60) }}</p></div>
                </div>
            @empty
                <div class="empty-state"><i class="fas fa-images"></i><p>Belum ada galeri Sihotang.</p></div>
            @endforelse
        </div>
    </div>
</section>

<section id="umkm" class="section" style="background: var(--light);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Produk usaha masyarakat sekitar Sihotang.</p>
        </div>
        <div class="grid-umkm">
            @forelse($umkm as $item)
                <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="image-wrapper">
                        @php
                            $fotoUrl = asset('image/default-umkm.jpg');
                            if($item->foto_utama) {
                                if(file_exists(public_path($item->foto_utama))) {
                                    $fotoUrl = asset($item->foto_utama);
                                } elseif(file_exists(storage_path('app/public/' . $item->foto_utama))) {
                                    $fotoUrl = asset('storage/' . $item->foto_utama);
                                }
                            }
                        @endphp
                        <img src="{{ $fotoUrl }}" alt="{{ $item->nama_usaha }}">
                        <span class="category-badge">{{ $item->kategori ?? 'UMKM' }}</span>
                    </div>
                    <div class="card-body">
                        <h4>{{ $item->nama_usaha }}</h4>
                        <div class="info-item"><i class="fas fa-user"></i><span>{{ $item->pemilik ?? 'Tidak tersedia' }}</span></div>
                        <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Deskripsi belum tersedia', 100) }}</div>
                        <div class="info-item"><i class="fas fa-map-marker-alt"></i><span>{{ Str::limit($item->alamat ?? 'Lokasi tidak tersedia', 60) }}</span></div>
                        @if($item->no_telepon)
                            <div class="info-item"><i class="fas fa-phone-alt"></i><span>{{ $item->no_telepon }}</span></div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state"><i class="fas fa-store"></i><p>Belum ada data UMKM untuk Sihotang.</p></div>
            @endforelse
        </div>
    </div>
</section>

<section id="penginapan" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Penginapan</h2>
            <div class="divider"></div>
            <p>Rekomendasi tempat menginap di sekitar Sihotang.</p>
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
                        <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Deskripsi tidak tersedia', 80) }}</div>
                        <div class="info-item"><i class="fas fa-map-marker-alt"></i><span>{{ Str::limit($item->alamat ?? 'Alamat tidak tersedia', 50) }}</span></div>
                        @if($item->no_telepon)
                            <div class="info-item"><i class="fas fa-phone-alt"></i><span>{{ $item->no_telepon }}</span></div>
                        @endif
                        @if($item->harga)
                            <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }} <span style="font-size:0.8rem;">/ malam</span></div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state"><i class="fas fa-hotel"></i><p>Belum ada data penginapan untuk Sihotang.</p></div>
            @endforelse
        </div>
    </div>
</section>

<section id="fasilitas" class="section" style="background: var(--light);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fasilitas</h2>
            <div class="divider"></div>
            <p>Fasilitas pendukung wisata di Sihotang.</p>
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
                        <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Deskripsi tidak tersedia', 80) }}</div>
                        @if($item->harga)
                            <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state"><i class="fas fa-concierge-bell"></i><p>Belum ada data fasilitas untuk Sihotang.</p></div>
            @endforelse
        </div>
    </div>
</section>

<section id="lokasi" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Rute praktis menuju Sihotang.</p>
        </div>
        <div class="maps-container" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127645.46001033459!2d98.700731!3d2.621083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d060f0e3180b%3A0xb561ba45f008aa18!2sPulau%20Sihotang!5e0!3m2!1sid!2sid!4v1778767596787!5m2!1sid!2sid" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="info-rute" data-aos="fade-up">
            <h4><i class="fas fa-location-dot"></i> Rute Menuju Sihotang</h4>
            <p><strong>Dari Pangururan:</strong> Perjalanan darat sekitar 40 menit menuju Sihotang melalui Jalan Lintas Samosir.</p>
            <p><strong>Dari Tomok:</strong> Sekitar 50 menit perjalanan darat menuju kawasan budaya dan alam Sihotang.</p>
            <p><strong>Jam Operasional:</strong> 08.00 - 18.00 WIB setiap hari.</p>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Kunjungi Sihotang</h3>
        <div class="divider"></div>
        <p>Nikmati keindahan Danau Toba dan budaya Batak yang autentik.</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Logo BI">
                <div class="footer-divider"></div>
                <img src="{{ asset('image/logo/del.jpg') }}" alt="Logo Del">
                <div class="footer-divider"></div>
                <div class="footer-text">
                    <h4>GEO<span>TOBA</span></h4>
                    <p>Geopark Danau Toba</p>
                </div>
            </div>
            <div class="footer-info">
                <p><i class="fas fa-map-marker-alt"></i> Pulau Sihotang, Kabupaten Samosir</p>
                <p><i class="fas fa-clock"></i> Buka Setiap Hari: 08.00 - 18.00 WIB</p>
            </div>
        </div>
        <div class="footer-bottom">&copy; 2026 Geopark Danau Toba. All rights reserved.</div>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 50, disable: 'mobile' });
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');
    const closeMenu = () => { mobileOverlay.classList.remove('active'); document.body.style.overflow = ''; };
    hamburger.addEventListener('click', () => { mobileOverlay.classList.add('active'); document.body.style.overflow = 'hidden'; });
    mobileClose.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-link').forEach(link => link.addEventListener('click', closeMenu));
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link, .mobile-link');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const top = section.offsetTop - 120;
            if(window.scrollY >= top) current = section.getAttribute('id');
        });
        navLinks.forEach(link => { link.classList.remove('active'); if(link.getAttribute('href') === `#${current}`) link.classList.add('active'); });
    });
    document.querySelectorAll('.nav-link[href^="#"], .mobile-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if(target) target.scrollIntoView({ behavior: 'smooth' });
            closeMenu();
        });
    });
</script>
</body>
</html>

        <h3>Kunjungi Sihotang</h3>

        <div class="divider"></div>

        <p>
            Nikmati keindahan Danau Toba dan budaya Batak yang autentik
        </p>

        <a href="{{ url('/') }}" class="cta-btn">
            Kembali ke Beranda
        </a>

    </div>

</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">

    <div class="lightbox-close" onclick="closeLightbox()">×</div>

    <img id="lightboxImg">

</div>

<!-- SCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

    AOS.init({
        duration: 700,
        once: true,
        offset: 50
    });

    // HAMBURGER
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    hamburger.addEventListener('click', () => {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    const closeMenu = () => {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    mobileClose.addEventListener('click', closeMenu);

    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // SMOOTH SCROLL
    document.querySelectorAll('.nav-link[href^="#"], .mobile-link[href^="#"]').forEach(anchor => {

        anchor.addEventListener('click', function(e) {

            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));

            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }

        });

    });

</script>

</body>
</html>