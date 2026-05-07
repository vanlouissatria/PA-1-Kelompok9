<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <title>Sihotang - Geosite Danau Toba</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS -->
    <!-- GANTI KE CSS YANG SUDAH TERBUKTI BERHASIL -->
    <link rel="stylesheet" href="{{ asset('css/sihotang.css') }}">
</head>

<body>

<!-- NAVBAR -->
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
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>

        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</div>

<!-- MOBILE MENU -->
<div class="mobile-overlay" id="mobileOverlay">

    <div class="mobile-close" id="mobileClose">&times;</div>

    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#informasi" class="mobile-link">Informasi</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>

</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">

        <h1 class="hero-title">SIHOTANG</h1>

        <p class="hero-subtitle">
            Pulau Samosir · Danau Toba · UNESCO Global Geopark
        </p>

    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">

    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Budaya</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-intro" style="margin-bottom:50px; line-height:1.8; color:#444;">

            <p>
                Sihotang merupakan salah satu kawasan budaya di Pulau Samosir
                yang memiliki panorama Danau Toba yang indah dan sejarah Batak
                yang kaya.
            </p>

            <p>
                Kawasan ini dikenal dengan kehidupan masyarakat tradisional,
                budaya Batak yang masih terjaga, serta keindahan alam yang
                menjadi daya tarik wisatawan lokal maupun mancanegara.
            </p>

        </div>

        <div class="sejarah-grid">

            <!-- ITEM 1 -->
            <div class="sejarah-item" data-aos="fade-right">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-detail.jpg') }}" alt="Sihotang">
                </div>

                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom:12px;">
                        Panorama Alam
                    </h4>

                    <p>
                        Sihotang menawarkan pemandangan Danau Toba yang luas
                        dengan udara sejuk dan suasana yang tenang.
                    </p>
                </div>

            </div>

            <!-- ITEM 2 -->
            <div class="sejarah-item reverse" data-aos="fade-left">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-hero.jpg') }}" alt="Budaya">
                </div>

                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom:12px;">
                        Budaya Batak
                    </h4>

                    <p>
                        Tradisi dan budaya Batak masih dijaga oleh masyarakat
                        setempat melalui adat, rumah tradisional, dan kegiatan budaya.
                    </p>
                </div>

            </div>

            <!-- ITEM 3 -->
            <div class="sejarah-item" data-aos="fade-right">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Wisata">
                </div>

                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom:12px;">
                        Destinasi Wisata
                    </h4>

                    <p>
                        Kawasan ini menjadi salah satu tujuan wisata unggulan
                        di sekitar Danau Toba karena keindahan alam dan budaya lokalnya.
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- INFORMASI -->
<section id="informasi" class="section">

    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Informasi Wisata</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-grid">

            <!-- ITEM -->
            <div class="sejarah-item" data-aos="fade-right">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Lokasi">
                </div>

                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom:12px;">
                        Lokasi Strategis
                    </h4>

                    <p>
                        Mudah diakses dari Pangururan dan berbagai wilayah
                        wisata Danau Toba lainnya.
                    </p>
                </div>

            </div>

            <!-- ITEM -->
            <div class="sejarah-item reverse" data-aos="fade-left">

                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Wisata">
                </div>

                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom:12px;">
                        Wisata Alam
                    </h4>

                    <p>
                        Cocok untuk menikmati pemandangan, fotografi,
                        dan wisata budaya Batak.
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section">

    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi</h2>
            <div class="divider"></div>
        </div>

        <div class="maps-container">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127645.46001033459!2d98.700731!3d2.621083"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="cta">

    <div class="container" data-aos="fade-up">

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