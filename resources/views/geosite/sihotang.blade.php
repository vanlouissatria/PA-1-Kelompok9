<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sihotang - Geosite Danau Toba</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/sihotang.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar" id="navbar">
    <div class="nav-container">

        <div class="nav-logo">
            <!-- Logo BI -->
            <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Logo BI">

            <div class="logo-divider"></div>

            <!-- Logo Del -->
            <img src="{{ asset('image/logo/del.jpg') }}" alt="Logo Del">

            <div class="logo-divider"></div>

            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>

        <!-- MENU -->
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>

        <!-- HAMBURGER -->
        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</div>

<!-- MOBILE MENU -->
<div class="mobile-overlay" id="mobileOverlay">

    <div class="mobile-close" id="mobileClose">
        &times;
    </div>

    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>

</div>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">

        <div class="hero-badge">
            UNESCO Global Geopark
        </div>

        <h1 class="hero-title">
            SIHOTANG
        </h1>

        <p class="hero-subtitle">
            Pulau Sibandang · Danau Toba
        </p>

    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">

    <div class="container">

        <div class="section-header">

            <div class="badge">
                Warisan Budaya
            </div>

            <h2>
                Desa Sihotang
            </h2>

            <div class="divider"></div>

            <p>
                Desa bersejarah dengan panorama Danau Toba yang indah
            </p>

        </div>

        <div class="sejarah-grid">

            <div class="sejarah-item">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-detail.jpg') }}"
                        alt="Desa Sihotang">
                </div>

                <div class="sejarah-text">

                    <h3>Pantai Satu</h3>

                    <p>
                        Desa Sihotang memiliki panorama alam yang sangat indah
                        dengan budaya Batak yang masih terjaga.
                    </p>

                </div>

            </div>

            <div class="sejarah-item reverse">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-hero.jpg') }}"
                        alt="Budaya Batak">
                </div>

                <div class="sejarah-text">

                    <h3>Pantai Dua</h3>

                    <p>
                        Wisata budaya dan alam menjadi daya tarik utama
                        bagi wisatawan lokal maupun mancanegara.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- UMKM -->
<section id="umkm" class="section section-light">

    <div class="container">

        <div class="section-header">

            <div class="badge">Produk Lokal</div>

            <h2>UMKM</h2>

            <div class="divider"></div>

            <p>Produk unggulan masyarakat lokal</p>

        </div>

        <div class="grid-3">

            @forelse($umkm as $item)

            <div class="card">

                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))

                    <img src="{{ $item->gambar }}"
                        class="card-img"
                        alt="{{ $item->nama }}">

                @else

                    <div style="
                        height:200px;
                        background:#e2e8f0;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    ">
                        <i class="fas fa-image"
                            style="font-size:2rem; color:#94a3b8;">
                        </i>
                    </div>

                @endif

                <div class="card-content">

                    <h3>{{ $item->nama }}</h3>

                    <p>
                        {{ Str::limit($item->deskripsi, 90) }}
                    </p>

                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $item->lokasi ?? 'Sihotang' }}
                    </div>

                    <div class="card-contact">
                        <i class="fas fa-phone"></i>
                        {{ $item->kontak ?? 'Hubungi Pengrajin' }}
                    </div>

                </div>

            </div>

            @empty

            <div class="empty-state">

                <i class="fas fa-store"></i>

                <p>Belum ada data UMKM</p>

            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">

    <div class="container">

        <div class="section-header">

            <div class="badge">Akomodasi</div>

            <h2>Penginapan</h2>

            <div class="divider"></div>

            <p>Penginapan nyaman untuk wisatawan</p>

        </div>

        <div class="grid-3">

            @forelse($penginapan as $item)

            <div class="card">

                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))

                    <img src="{{ $item->gambar }}"
                        class="card-img"
                        alt="{{ $item->nama }}">

                @else

                    <div style="
                        height:200px;
                        background:#e2e8f0;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    ">
                        <i class="fas fa-hotel"
                            style="font-size:2rem; color:#94a3b8;">
                        </i>
                    </div>

                @endif

                <div class="card-content">

                    <h3>{{ $item->nama }}</h3>

                    <p>
                        {{ Str::limit($item->deskripsi, 90) }}
                    </p>

                    <div class="card-price">
                        <i class="fas fa-tag"></i>
                        {{ $item->harga ?? 'Hubungi' }}
                    </div>

                </div>

            </div>

            @empty

            <div class="empty-state">

                <i class="fas fa-hotel"></i>

                <p>Belum ada data penginapan</p>

            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section section-light">

    <div class="container">

        <div class="section-header">

            <div class="badge">Fasilitas</div>

            <h2>Layanan Wisata</h2>

            <div class="divider"></div>

            <p>Fasilitas lengkap untuk wisatawan</p>

        </div>

        <div class="grid-2">

            @forelse($fasilitas as $item)

            <div class="fasilitas-item">

                <div class="fasilitas-content">

                    <h4>{{ $item->nama }}</h4>

                    <p>
                        {{ Str::limit($item->deskripsi, 70) }}
                    </p>

                </div>

            </div>

            @empty

            <div class="empty-state">

                <i class="fas fa-tools"></i>

                <p>Belum ada data fasilitas</p>

            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="footer">

    <div class="container">

        <p>
            © 2026 Geosite Sihotang - Geopark Danau Toba
        </p>

    </div>

</footer>

</body>
</html>