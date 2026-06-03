@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')
<style>
    /* ============================================
       ROOT VARIABLES - WORLD CLASS DESIGN SYSTEM
       ============================================ */
    :root {
        --primary: #003366;
        --primary-dark: #002244;
        --primary-light: #1a4a7a;
        --gold: #c6a43b;
        --gold-light: #e8c96a;
        --gold-dark: #a58a36;
        --white: #ffffff;
        --gray: #64748b;
        --gray-light: #f8fafc;
        --dark: #0f172a;
        
        /* Gradients */
        --gradient-gold: linear-gradient(135deg, #f5e6b8 0%, #c6a43b 50%, #a58a36 100%);
        --gradient-primary: linear-gradient(135deg, #003366 0%, #002244 100%);
        --gradient-hero: linear-gradient(135deg, #003366 0%, #1a4a7a 40%, #002244 100%);
        --gradient-card: linear-gradient(145deg, #ffffff 0%, #fefefe 100%);
        
        /* Shadows */
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.03);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.06);
        --shadow-lg: 0 16px 36px rgba(0,0,0,0.1);
        --shadow-xl: 0 24px 48px rgba(0,0,0,0.12);
        --shadow-gold: 0 12px 28px rgba(198,164,59,0.2);
        
        /* Transitions */
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-bounce: all 0.4s cubic-bezier(0.34, 1.2, 0.64, 1);
    }

    /* ============================================
       HERO SECTION - STUNNING
       ============================================ */
    .kontak-hero {
        background: var(--gradient-hero);
        padding: 100px 0 70px;
        margin-top: 76px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .kontak-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.08) 0%, transparent 60%);
        animation: pulseGlow 4s ease-in-out infinite;
    }

    @keyframes pulseGlow {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    .kontak-hero .container {
        position: relative;
        z-index: 2;
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .kontak-hero h1 {
        font-size: 3.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff, var(--gold-light), #ffffff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 12px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .kontak-hero p {
        font-size: 0.9rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.85);
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(8px);
        display: inline-block;
        padding: 6px 24px;
        border-radius: 40px;
    }

    @media (max-width: 768px) {
        .kontak-hero h1 { font-size: 2.2rem; }
        .kontak-hero { padding: 80px 0 50px; }
    }

    /* ============================================
       SECTION UTAMA
       ============================================ */
    .kontak-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ============================================
       GRID KONTAK
       ============================================ */
    .kontak-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 28px;
        margin-bottom: 48px;
    }

    @media (max-width: 768px) {
        .kontak-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
    }

    /* ============================================
       KARTU KONTAK - PREMIUM
       ============================================ */
    .kontak-person-card {
        background: var(--white);
        border-radius: 24px;
        padding: 24px;
        cursor: pointer;
        transition: var(--transition-bounce);
        border: 1px solid #eef2f6;
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .kontak-person-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.3s ease;
        transform-origin: left;
    }

    .kontak-person-card:hover::before {
        transform: scaleX(1);
    }

    .kontak-person-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(198,164,59,0.3);
    }

    .kontak-person-card.active {
        border-color: var(--gold);
        box-shadow: var(--shadow-gold);
        background: linear-gradient(145deg, #ffffff, #fffdf5);
    }

    /* Header Card */
    .kontak-person-card h4 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 6px;
        letter-spacing: -0.3px;
    }

    .kontak-person-card .card-subtitle {
        font-size: 0.8rem;
        color: var(--gray);
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #eef2f6;
    }

    /* Detail Group */
    .kontak-details {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .kontak-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    @media (max-width: 480px) {
        .kontak-row {
            grid-template-columns: 1fr;
        }
    }

    .detail-group {
        background: #fafbfc;
        padding: 10px 12px;
        border-radius: 14px;
        transition: var(--transition);
    }

    .kontak-person-card:hover .detail-group {
        background: #fef8e8;
    }

    .detail-group strong {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .detail-group strong i {
        color: var(--gold);
        font-size: 0.75rem;
        width: 20px;
    }

    .detail-group p,
    .detail-group a {
        margin: 0;
        font-size: 0.85rem;
        color: var(--gray);
        line-height: 1.5;
        word-break: break-word;
    }

    .detail-group a {
        color: var(--primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .detail-group a:hover {
        color: var(--gold);
    }

    /* ============================================
       MAP CARD - PREMIUM
       ============================================ */
    .kontak-map-card {
        background: var(--white);
        border-radius: 28px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: var(--transition-bounce);
        border: 1px solid #eef2f6;
    }

    .kontak-map-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(198,164,59,0.2);
    }

    .map-wrapper {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
        background: #eef2f6;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: 0;
        transition: transform 0.5s ease;
    }

    .kontak-map-card:hover .map-wrapper iframe {
        transform: scale(1.02);
    }

    .map-unavailable {
        display: none;
        position: absolute;
        inset: 0;
        background: #f8fafc;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        color: var(--gray);
    }

    .map-unavailable i {
        font-size: 2.5rem;
        color: var(--gold);
        opacity: 0.5;
    }

    /* Map Footer */
    .map-footer {
        padding: 24px 28px;
        border-top: 1px solid #eef2f6;
    }

    .map-footer h4 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
    }

    .map-footer h4 span {
        color: var(--gold);
        border-bottom: 2px solid var(--gold);
        padding-bottom: 2px;
    }

    .map-footer p {
        font-size: 0.85rem;
        color: var(--gray);
        margin-bottom: 20px;
        line-height: 1.6;
    }

    /* ============================================
       SOCIAL ICONS
       ============================================ */
    .social-icons {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f1f5f9;
        border-radius: 50%;
        color: var(--primary);
        font-size: 1rem;
        transition: var(--transition-bounce);
        text-decoration: none;
    }

    .social-icons a:hover {
        background: var(--gradient-gold);
        color: var(--primary-dark);
        transform: translateY(-4px);
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .kontak-person-card {
        animation: fadeInUp 0.5s ease backwards;
    }
    .kontak-person-card:nth-child(1) { animation-delay: 0.05s; }
    .kontak-person-card:nth-child(2) { animation-delay: 0.1s; }
    .kontak-person-card:nth-child(3) { animation-delay: 0.15s; }
    .kontak-person-card:nth-child(4) { animation-delay: 0.2s; }
    .kontak-person-card:nth-child(5) { animation-delay: 0.25s; }
    .kontak-person-card:nth-child(6) { animation-delay: 0.3s; }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 992px) {
        .kontak-section { padding: 50px 0 80px; }
        .map-wrapper { height: 360px; }
    }

    @media (max-width: 768px) {
        .kontak-section { padding: 40px 0 60px; }
        .kontak-person-card { padding: 20px; }
        .kontak-person-card h4 { font-size: 1.3rem; }
        .map-wrapper { height: 300px; }
        .map-footer { padding: 18px 20px; }
    }

    @media (max-width: 480px) {
        .container { padding: 0 16px; }
        .kontak-person-card { padding: 18px; }
        .map-wrapper { height: 260px; }
        .social-icons a { width: 36px; height: 36px; font-size: 0.9rem; }
    }

    /* ============================================
       SCROLLBAR
       ============================================ */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #eef2f6; border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: linear-gradient(135deg, var(--primary), var(--gold)); border-radius: 10px; }

    /* ============================================
       DARK MODE - TETAP CANTIK
       ============================================ */
    @media (prefers-color-scheme: dark) {
        .kontak-section { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }
        .kontak-person-card { background: var(--white); }
        .kontak-person-card.active { background: var(--white); }
        .map-footer { background: var(--white); }
        .detail-group { background: #fafbfc; }
        .social-icons a { background: #f1f5f9; }
    }
</style>

<section class="kontak-hero">
    <div class="container">
        <h1 data-aos="fade-up">Kontak</h1>
        <p data-aos="fade-up" data-aos-delay="100">Hubungi langsung tim dan mitra kami</p>
    </div>
</section>

<section class="kontak-section">
    <div class="container">

        {{-- KARTU KONTAK --}}
        <div class="kontak-grid" data-aos="fade-up">
            @forelse($kontaks as $kontak)
                @php
                    // Siapkan embed src di server-side
                    $rawMap = $kontak->maps ? trim($kontak->maps) : null;
                    $embedSrc = null;

                    if ($rawMap) {
                        if (stripos($rawMap, '<iframe') !== false) {
                            preg_match('/src=["\']([^"\']+)["\']/', $rawMap, $iframeMatch);
                            $embedSrc = $iframeMatch[1] ?? null;
                        } elseif (preg_match('/^https?:\/\//i', $rawMap)) {
                            if (stripos($rawMap, '/embed') !== false) {
                                $embedSrc = $rawMap;
                            } elseif (stripos($rawMap, '/maps') !== false) {
                                $embedSrc = preg_replace('/\/maps(\/|\?|$)/i', '/maps/embed$1', $rawMap, 1);
                            } else {
                                $embedSrc = 'https://www.google.com/maps?q=' . urlencode($rawMap) . '&output=embed';
                            }
                        }
                    }
                @endphp
                <div
                    class="kontak-person-card"
                    onclick="showMap(this)"
                    data-map="{{ $embedSrc ?? '' }}"
                    data-name="{{ $kontak->judul }}"
                >
                    <div>
                        <h4>{{ $kontak->judul }}</h4>
                        @if($kontak->subjudul)
                            <p class="card-subtitle">{{ $kontak->subjudul }}</p>
                        @endif
                    </div>
                    <div class="kontak-details">
                        <div class="kontak-row">
                            @if($kontak->alamat)
                                <div class="detail-group">
                                    <strong><i class="fas fa-map-marker-alt" style="color:#c6a43b;margin-right:8px;"></i> Alamat</strong>
                                    <p>{!! nl2br(e($kontak->alamat)) !!}</p>
                                </div>
                            @endif
                            @if($kontak->kode_pos)
                                <div class="detail-group">
                                    <strong><i class="fas fa-mail-bulk" style="color:#c6a43b;margin-right:8px;"></i> Kode Pos</strong>
                                    <p>{{ $kontak->kode_pos }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="kontak-row">
                            @if($kontak->instagram)
                                <div class="detail-group">
                                    <strong><i class="fab fa-instagram" style="color:#c6a43b;margin-right:8px;"></i> Instagram</strong>
                                    @php
                                        $igLink = $kontak->instagram;
                                        if (!preg_match('/^https?:\/\//i', $igLink)) {
                                            $igLink = 'https://instagram.com/' . ltrim(trim($igLink), '@');
                                        }
                                    @endphp
                                    <a href="{{ $igLink }}" target="_blank" rel="noopener noreferrer" onclick="event.stopPropagation()">
                                        {{ $kontak->instagram }}
                                    </a>
                                </div>
                            @endif
                            @if($kontak->telepon1 || $kontak->telepon2 || $kontak->telepon3)
                                <div class="detail-group">
                                    <strong><i class="fas fa-phone" style="color:#c6a43b;margin-right:8px;"></i> Telepon</strong>
                                    @if($kontak->telepon1)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon1) }}" onclick="event.stopPropagation()">{{ $kontak->telepon1 }}</a></p>
                                    @endif
                                    @if($kontak->telepon2)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon2) }}" onclick="event.stopPropagation()">{{ $kontak->telepon2 }}</a></p>
                                    @endif
                                    @if($kontak->telepon3)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon3) }}" onclick="event.stopPropagation()">{{ $kontak->telepon3 }}</a></p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        @if($kontak->email1 || $kontak->email2 || $kontak->email3)
                            <div class="detail-group">
                                <strong><i class="fas fa-envelope" style="color:#c6a43b;margin-right:8px;"></i> Email</strong>
                                @if($kontak->email1)
                                    <p><a href="mailto:{{ $kontak->email1 }}" onclick="event.stopPropagation()">{{ $kontak->email1 }}</a></p>
                                @endif
                                @if($kontak->email2)
                                    <p><a href="mailto:{{ $kontak->email2 }}" onclick="event.stopPropagation()">{{ $kontak->email2 }}</a></p>
                                @endif
                                @if($kontak->email3)
                                    <p><a href="mailto:{{ $kontak->email3 }}" onclick="event.stopPropagation()">{{ $kontak->email3 }}</a></p>
                                @endif
                            </div>
                        @endif
                        @if(!$kontak->alamat && !$kontak->telepon1 && !$kontak->telepon2 && !$kontak->telepon3 && !$kontak->email1 && !$kontak->email2 && !$kontak->email3 && !$kontak->instagram && !$kontak->kode_pos)
                            <div class="detail-group">
                                <strong>Info Kontak</strong>
                                <p>Kontak person ini tidak membagikan detail tambahan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="kontak-person-card">
                    <h4>Kontak belum tersedia</h4>
                    <p class="card-subtitle">Silakan tambahkan kontak person melalui panel admin.</p>
                </div>
            @endforelse
        </div>

        {{-- PETA TUNGGAL --}}
        @php
            $defaultEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid';

            // Cari kontak pertama yang punya maps untuk ditampilkan saat halaman pertama load
            $firstWithMap = $kontaks->first(fn($k) => !empty($k->maps));
            $initialSrc   = null;
            $initialName  = 'Default';

            if ($firstWithMap) {
                $rawInit = trim($firstWithMap->maps);
                if (stripos($rawInit, '<iframe') !== false) {
                    preg_match('/src=["\']([^"\']+)["\']/', $rawInit, $m);
                    $initialSrc  = $m[1] ?? null;
                } elseif (preg_match('/^https?:\/\//i', $rawInit)) {
                    if (stripos($rawInit, '/embed') !== false) {
                        $initialSrc = $rawInit;
                    } elseif (stripos($rawInit, '/maps') !== false) {
                        $initialSrc = preg_replace('/\/maps(\/|\?|$)/i', '/maps/embed$1', $rawInit, 1);
                    } else {
                        $initialSrc = 'https://www.google.com/maps?q=' . urlencode($rawInit) . '&output=embed';
                    }
                }
                $initialName = $firstWithMap->judul;
            }

            $initialSrc = $initialSrc ?? $defaultEmbed;
        @endphp

        <div class="kontak-map-card" data-aos="fade-up" data-aos-delay="100">
            <div class="map-wrapper">
                <iframe
                    id="kontak-map-iframe"
                    src="{{ e($initialSrc) }}"
                    loading="lazy"
                    allowfullscreen>
                </iframe>
                <div class="map-unavailable" id="map-unavailable">
                    <i class="fas fa-map-marker-slash"></i>
                    <span>Lokasi tidak tersedia untuk kontak ini</span>
                </div>
            </div>
            <div class="map-footer">
                <h4>Lokasi: <span id="map-active-label">{{ $initialName }}</span></h4>
                <p>Klik kartu kontak di atas untuk melihat lokasinya di peta.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
            
            </div>
        </div>

    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });

    const iframe        = document.getElementById('kontak-map-iframe');
    const unavailable   = document.getElementById('map-unavailable');
    const activeLabel   = document.getElementById('map-active-label');
    const allCards      = document.querySelectorAll('.kontak-person-card');

    function showMap(card) {
        // Tandai card yang aktif
        allCards.forEach(c => c.classList.remove('active'));
        card.classList.add('active');

        const src  = card.dataset.map;
        const name = card.dataset.name;

        activeLabel.textContent = name;

        if (src && src.trim() !== '') {
            // Ada URL maps — tampilkan iframe, sembunyikan overlay
            unavailable.style.display = 'none';
            iframe.style.display      = 'block';
            iframe.src                = src;
        } else {
            // Tidak ada URL maps — sembunyikan iframe, tampilkan overlay
            iframe.style.display        = 'none';
            iframe.src                  = '';          // bersihkan residu
            unavailable.style.display   = 'flex';
        }

        // Scroll halus ke peta
        document.querySelector('.kontak-map-card').scrollIntoView({
            behavior: 'smooth', block: 'start'
        });
    }

    // Aktifkan card pertama yang punya maps saat halaman load
    const firstWithMap = Array.from(allCards).find(c => c.dataset.map && c.dataset.map.trim() !== '');
    if (firstWithMap) firstWithMap.classList.add('active');
</script>

@endsection