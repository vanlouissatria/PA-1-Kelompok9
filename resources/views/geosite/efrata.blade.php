<!-- resources/views/wisata/efrata.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Terjun Efrata - Geosite Danau Toba</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/efrata.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">

        <div class="nav-logo">
            <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" class="flag-img" alt="">
            
            <div class="logo-divider"></div>

            <img src="{{ asset('image/logo/del.jpg') }}" class="del-img" alt="">

            <div class="logo-divider"></div>

            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>

        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#informasi" class="nav-link">Informasi</a>
        </div>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</div>

<!-- MOBILE MENU -->
<div class="mobile-overlay" id="mobileOverlay">

    <div class="mobile-close" id="mobileClose">&times;</div>

    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#informasi" class="mobile-link">Informasi</a>

</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">EFRATA</h1>
        <p class="hero-subtitle">
            Air Terjun Efrata · Samosir · Sumatera Utara
        </p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah Air Terjun Efrata</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-grid">

            <div class="sejarah-item" data-aos="fade-right">

                <div class="sejarah-image">
                    <img src="{{ asset('image/efrata/efrata1.jpg') }}" alt="">
                </div>

                <div class="sejarah-text">
                    <p>
                        Air Terjun Efrata merupakan salah satu destinasi wisata
                        alam terkenal di Kabupaten Samosir, Sumatera Utara.
                        Air terjun ini berada di Kecamatan Sianjur Mula-Mula,
                        kawasan yang dikenal sebagai tempat asal mula suku Batak.
                    </p>
                </div>

            </div>

            <div class="sejarah-item reverse" data-aos="fade-left">

                <div class="sejarah-image">
                    <img src="{{ asset('image/efrata/efrata2.jpg') }}" alt="">
                </div>

                <div class="sejarah-text">
                    <p>
                        Air Terjun Efrata memiliki bentuk unik menyerupai tirai
                        dengan aliran air yang lebar dan indah. Keindahan alam
                        di sekitarnya menjadikan tempat ini favorit wisatawan
                        lokal maupun mancanegara.
                    </p>
                </div>

            </div>

            <div class="sejarah-item" data-aos="fade-right">

                <div class="sejarah-image">
                    <img src="{{ asset('image/efrata/efrata3.jpg') }}" alt="">
                </div>

                <div class="sejarah-text">
                    <p>
                        Selain panorama alam yang memukau, kawasan Efrata juga
                        memiliki udara sejuk dan suasana tenang sehingga cocok
                        dijadikan tempat beristirahat dan menikmati keindahan
                        alam Danau Toba.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section bg-light">

    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Efrata</h2>
            <div class="divider"></div>
            <p>Keindahan Air Terjun Efrata</p>
        </div>

        <div class="galeri-grid">

            <div class="galeri-item">
                <img src="{{ asset('image/efrata/galeri1.jpg') }}" alt="">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('image/efrata/galeri2.jpg') }}" alt="">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('image/efrata/galeri3.jpg') }}" alt="">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('image/efrata/galeri4.jpg') }}" alt="">
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

            <div class="sejarah-item">

                <div class="sejarah-image">
                    <img src="{{ asset('image/efrata/lokasi.jpg') }}" alt="">
                </div>

                <div class="sejarah-text">
                    <h4>Lokasi</h4>

                    <p>
                        Air Terjun Efrata terletak di Kecamatan Sianjur
                        Mula-Mula, Kabupaten Samosir, Sumatera Utara.
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="cta">

    <div class="container" data-aos="fade-up">

        <h3>Jelajahi Keindahan Air Terjun Efrata</h3>

        <div class="divider"></div>

        <p>
            Destinasi wisata alam terbaik di kawasan Geopark Danau Toba
        </p>

        <a href="{{ url('/') }}" class="cta-btn">
            Kembali ke Beranda
        </a>

    </div>

</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">

    <div class="lightbox-close" onclick="closeLightbox()">
        ×
    </div>

    <img id="lightboxImg">

</div>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

AOS.init({
    duration: 700,
    once: true
});

const hamburger = document.getElementById('hamburger');
const mobileOverlay = document.getElementById('mobileOverlay');
const mobileClose = document.getElementById('mobileClose');

hamburger.addEventListener('click', () => {
    mobileOverlay.classList.add('active');
});

mobileClose.addEventListener('click', () => {
    mobileOverlay.classList.remove('active');
});

document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', () => {
        mobileOverlay.classList.remove('active');
    });
});

const lightbox = document.getElementById('lightbox');

document.querySelectorAll('.galeri-item img').forEach(img => {

    img.addEventListener('click', () => {

        lightbox.classList.add('active');

        document.getElementById('lightboxImg').src = img.src;

    });

});

function closeLightbox() {
    lightbox.classList.remove('active');
}

</script>

</body>
</html>