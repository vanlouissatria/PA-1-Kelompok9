@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')
<style>
    .kontak-hero {
        height: 45vh;
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
        position: relative;
        padding: 40px 0;
    }
    .kontak-hero::before {
        content: '';
        position: absolute;
        top: -40%;
        left: -40%;
        width: 180%;
        height: 180%;
        background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
        z-index: 1;
    }
    .kontak-hero .container { position: relative; z-index: 2; }
    .kontak-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
        margin-bottom: 6px;
    }
    .kontak-hero p {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.9);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin: 0;
    }
    .kontak-section {
        padding: 60px 0;
    }
    .kontak-grid {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        margin-bottom: 40px;
    }
    .kontak-person-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(15, 44, 69, 0.06);
        border: 2px solid #edf2f7;
        padding: 20px;
        display: grid;
        gap: 12px;
        align-items: start;
        cursor: pointer;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
    }
    .kontak-person-card:hover {
        border-color: #c6a43b;
        box-shadow: 0 12px 32px rgba(15, 44, 69, 0.12);
        transform: translateY(-2px);
    }
    .kontak-person-card.active {
        border-color: #c6a43b;
        box-shadow: 0 12px 32px rgba(198, 164, 59, 0.2);
    }
    .kontak-person-card h4 {
        margin: 0 0 8px;
        font-size: 1.75rem;
        color: #09212f;
    }
    .kontak-person-card .card-subtitle {
        margin: 0;
        color: #64748b;
        font-size: 0.98rem;
        line-height: 1.8;
    }
    .kontak-details {
        display: grid;
        gap: 18px;
    }
    .kontak-row {
        display: grid;
        gap: 18px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .detail-group {
        display: grid;
        gap: 10px;
    }
    .detail-group strong {
        display: block;
        font-size: 0.95rem;
        color: #0f3b2c;
    }
    .detail-group p,
    .detail-group a {
        margin: 0;
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.7;
        word-break: break-word;
    }
    .detail-group a {
        color: #1d4e89;
        text-decoration: none;
    }
    .detail-group a:hover {
        text-decoration: underline;
    }
    .kontak-map-card {
        border-radius: 24px;
        overflow: hidden;
        background: white;
        border: 1px solid #e8edf2;
        box-shadow: 0 16px 40px rgba(15, 44, 69, 0.08);
    }
    .map-wrapper {
        position: relative;
        width: 100%;
        height: 420px;
    }
    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: 0;
        display: block;
    }
    /* Overlay "tidak tersedia" */
    .map-unavailable {
        display: none;
        position: absolute;
        inset: 0;
        background: #f8fafc;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 12px;
        color: #64748b;
        font-size: 0.95rem;
    }
    .map-unavailable i {
        font-size: 2.5rem;
        color: #cbd5e1;
    }
    .map-footer {
        padding: 26px 32px;
        display: grid;
        gap: 16px;
    }
    .map-footer h4 {
        margin: 0;
        font-size: 1.3rem;
        color: #09212f;
    }
    .map-footer p {
        margin: 0;
        color: #475569;
        line-height: 1.75;
    }
    #map-active-label {
        font-weight: 600;
        color: #c6a43b;
    }
    .social-icons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    .social-icons a {
        display: inline-flex;
        width: 42px;
        height: 42px;
        align-items: center;
        justify-content: center;
        background: #f5f4f0;
        border-radius: 50%;
        color: #1a1a1a;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .social-icons a:hover {
        background: #c6a43b;
        color: white;
        transform: translateY(-2px);
    }
    .jam-operasional h5 {
        margin: 0 0 8px;
        font-size: 1rem;
        color: #09212f;
    }
    .jam-operasional p {
        margin: 0;
        color: #475569;
        line-height: 1.75;
        font-size: 0.95rem;
    }
    @media (max-width: 992px) {
        .kontak-row { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .kontak-hero h1 { font-size: 2.2rem; }
        .kontak-section { padding: 40px 0; }
    }
    @media (max-width: 576px) {
        .kontak-hero h1 { font-size: 1.8rem; }
        .kontak-person-card { padding: 24px; }
        .map-wrapper { height: 320px; }
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
                <div class="jam-operasional">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 08:00 - 17:00</p>
                    <p>Sabtu - Minggu: 08:00 - 18:00</p>
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