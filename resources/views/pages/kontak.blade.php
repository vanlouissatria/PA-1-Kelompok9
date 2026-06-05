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
        
        --gradient-gold: linear-gradient(135deg, #f5e6b8 0%, #c6a43b 50%, #a58a36 100%);
        --gradient-primary: linear-gradient(135deg, #003366 0%, #002244 100%);
        --gradient-hero: linear-gradient(135deg, #003366 0%, #1a4a7a 40%, #002244 100%);
        --gradient-card: linear-gradient(145deg, #ffffff 0%, #fefefe 100%);
        --gradient-text-gold: linear-gradient(135deg, #f5e6b8, #c6a43b, #e8c96a);
        
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.03);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.06);
        --shadow-lg: 0 16px 36px rgba(0,0,0,0.1);
        --shadow-xl: 0 24px 48px rgba(0,0,0,0.12);
        
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-bounce: all 0.4s cubic-bezier(0.34, 1.2, 0.64, 1);
    }

    /* ============================================
       HERO SECTION
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
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(198,164,59,0.08) 0%, transparent 70%);
        animation: rotateGlow 20s linear infinite;
        pointer-events: none;
    }
    
    @keyframes rotateGlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .kontak-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: var(--gradient-text-gold);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 16px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
        animation: fadeInUp 0.6s ease-out;
    }

    .kontak-hero p {
        font-size: 1rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.95);
        background: rgba(0,0,0,0.25);
        backdrop-filter: blur(10px);
        display: inline-block;
        padding: 8px 28px;
        border-radius: 50px;
        font-weight: 500;
        border: 1px solid rgba(255,255,255,0.2);
        animation: fadeInUp 0.6s ease-out 0.1s both;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
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
       GRID KONTAK - FLEX TERPUSAT & RINGKAS
       ============================================ */
    .kontak-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 28px;
        margin-bottom: 48px;
    }

    /* KARTU KONTAK - LEBAR TETAP & TIDAK MEMANJANG */
    .kontak-person-card {
        flex: 0 0 auto;
        width: 400px;
        max-width: 100%;
        background: var(--white);
        border-radius: 24px;
        padding: 20px;
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

    .kontak-person-card h4 {
        font-size: 1.4rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 6px;
        letter-spacing: -0.3px;
    }

    .kontak-person-card .card-subtitle {
        font-size: 0.8rem;
        color: var(--gold-dark);
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #eef2f6;
        font-weight: 500;
    }

    .kontak-details {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .kontak-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 10px;
    }

    .detail-group {
        background: #fafbfc;
        padding: 8px 12px;
        border-radius: 14px;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
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
        line-height: 1.4;
        word-break: break-word;
    }

    .detail-group a {
        color: var(--primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-weight: 500;
    }

    .detail-group a:hover {
        color: var(--gold);
        transform: translateX(2px);
    }

    /* MAP CARD */
    .kontak-map-card {
        background: var(--white);
        border-radius: 28px;
        padding: 24px;
        margin-top: 32px;
        border: 1px solid #eef2f6;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
        transition: var(--transition);
    }
    
    .kontak-map-card:hover {
        box-shadow: var(--shadow-xl);
    }

    .map-wrapper {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        min-height: 320px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        min-height: 320px;
        border: 0;
        display: block;
    }

    .map-unavailable {
        position: absolute;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        text-align: center;
        padding: 24px;
        color: var(--primary);
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(6px);
    }

    .map-unavailable i {
        font-size: 1.8rem;
        color: var(--gold);
    }

    .map-footer {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .map-footer h4 {
        font-size: 1.1rem;
        margin: 0;
        background: linear-gradient(135deg, var(--primary), var(--gold-dark));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }

    .map-footer p {
        margin: 0;
        color: #64748b;
        line-height: 1.6;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 992px) {
        .kontak-section { padding: 50px 0 80px; }
    }

    @media (max-width: 768px) {
        .kontak-section { padding: 40px 0 60px; }
        .kontak-person-card { padding: 18px; width: 100%; max-width: 480px; margin: 0 auto; }
        .kontak-person-card h4 { font-size: 1.3rem; }
        .kontak-row { grid-template-columns: 1fr; }
        .social-icon {
            width: 44px;
            height: 44px;
            font-size: 1.3rem;
        }
        .social-icons {
            gap: 12px;
        }
    }

    @media (max-width: 480px) {
        .container { padding: 0 16px; }
        .kontak-person-card { padding: 16px; }
        .detail-group p, .detail-group a { font-size: 0.8rem; }
    }

    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #eef2f6; border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: linear-gradient(135deg, var(--primary), var(--gold)); border-radius: 10px; }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
                    $fbUrl = $kontak->facebook ? (!preg_match('/^https?:\/\//i', $kontak->facebook) ? "https://facebook.com/".trim($kontak->facebook) : $kontak->facebook) : "";
                    $igUrl = $kontak->instagram ? (!preg_match('/^https?:\/\//i', $kontak->instagram) ? "https://instagram.com/".ltrim(trim($kontak->instagram), "@") : $kontak->instagram) : "";
                    $twUrl = $kontak->twitter ? (!preg_match('/^https?:\/\//i', $kontak->twitter) ? "https://x.com/".ltrim(trim($kontak->twitter), "@") : $kontak->twitter) : "";
                    $ytUrl = $kontak->youtube ? (!preg_match('/^https?:\/\//i', $kontak->youtube) ? "https://youtube.com/".trim($kontak->youtube) : $kontak->youtube) : "";
                    $ttUrl = $kontak->tiktok ? (!preg_match('/^https?:\/\//i', $kontak->tiktok) ? "https://tiktok.com/@".ltrim(trim($kontak->tiktok), "@") : $kontak->tiktok) : "";
                @endphp
                
                <div class="kontak-person-card">
                    <div>
                        <h4>{{ $kontak->judul }}</h4>
                        @if($kontak->subjudul)
                            <p class="card-subtitle">{{ $kontak->subjudul }}</p>
                        @endif
                    </div>
                    
                    <div class="kontak-details">
                        {{-- ALAMAT & KODE POS --}}
                        @if(!empty($kontak->alamat) || !empty($kontak->kode_pos))
                            <div class="kontak-row">
                                @if(!empty($kontak->alamat))
                                    <div class="detail-group">
                                        <strong><i class="fas fa-map-marker-alt"></i> Alamat</strong>
                                        <p>{!! nl2br(e($kontak->alamat)) !!}</p>
                                    </div>
                                @endif
                                @if(!empty($kontak->kode_pos))
                                    <div class="detail-group">
                                        <strong><i class="fas fa-mail-bulk"></i> Kode Pos</strong>
                                        <p>{{ $kontak->kode_pos }}</p>
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- MEDIA SOSIAL (FB, IG, TW) --}}
                        @if(!empty($kontak->facebook) || !empty($kontak->instagram) || !empty($kontak->twitter))
                            <div class="kontak-row">
                                @if(!empty($kontak->facebook))
                                    <div class="detail-group">
                                        <strong><i class="fab fa-facebook-f"></i> Facebook</strong>
                                        <a href="{{ $fbUrl }}" target="_blank" rel="noopener noreferrer">{{ $kontak->facebook }}</a>
                                    </div>
                                @endif
                                @if(!empty($kontak->instagram))
                                    <div class="detail-group">
                                        <strong><i class="fab fa-instagram"></i> Instagram</strong>
                                        <a href="{{ $igUrl }}" target="_blank" rel="noopener noreferrer">{{ $kontak->instagram }}</a>
                                    </div>
                                @endif
                                @if(!empty($kontak->twitter))
                                    <div class="detail-group">
                                        <strong><i class="fab fa-twitter"></i> Twitter</strong>
                                        <a href="{{ $twUrl }}" target="_blank" rel="noopener noreferrer">{{ $kontak->twitter }}</a>
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- YOUTUBE & TIKTOK --}}
                        @if(!empty($kontak->youtube) || !empty($kontak->tiktok))
                            <div class="kontak-row">
                                @if(!empty($kontak->youtube))
                                    <div class="detail-group">
                                        <strong><i class="fab fa-youtube"></i> YouTube</strong>
                                        <a href="{{ $ytUrl }}" target="_blank" rel="noopener noreferrer">{{ $kontak->youtube }}</a>
                                    </div>
                                @endif
                                @if(!empty($kontak->tiktok))
                                    <div class="detail-group">
                                        <strong><i class="fab fa-tiktok"></i> TikTok</strong>
                                        <a href="{{ $ttUrl }}" target="_blank" rel="noopener noreferrer">{{ $kontak->tiktok }}</a>
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- TELEPON --}}
                        @if($kontak->telepon1 || $kontak->telepon2 || $kontak->telepon3)
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-phone"></i> Telepon</strong>
                                    @if($kontak->telepon1)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon1) }}">{{ $kontak->telepon1 }}</a></p>
                                    @endif
                                    @if($kontak->telepon2)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon2) }}">{{ $kontak->telepon2 }}</a></p>
                                    @endif
                                    @if($kontak->telepon3)
                                        <p><a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon3) }}">{{ $kontak->telepon3 }}</a></p>
                                    @endif
                                </div>
                            </div>
                        @endif

                        {{-- EMAIL --}}
                        @if($kontak->email1 || $kontak->email2 || $kontak->email3)
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-envelope"></i> Email</strong>
                                    @if($kontak->email1)
                                        <p><a href="mailto:{{ $kontak->email1 }}">{{ $kontak->email1 }}</a></p>
                                    @endif
                                    @if($kontak->email2)
                                        <p><a href="mailto:{{ $kontak->email2 }}">{{ $kontak->email2 }}</a></p>
                                    @endif
                                    @if($kontak->email3)
                                        <p><a href="mailto:{{ $kontak->email3 }}">{{ $kontak->email3 }}</a></p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data kontak.</p>
            @endforelse
        </div>

        <div class="kontak-map-card" data-aos="fade-up" data-aos-delay="100">
            <div class="map-wrapper">
                <iframe
                    id="kontak-map-iframe"
                    src="{{ $initialSrc ?? '' }}"
                    loading="lazy"
                    allowfullscreen
                    style="{{ empty($initialSrc) ? 'display:none;' : '' }}">
                </iframe>
                <div class="map-unavailable" id="map-unavailable" style="{{ empty($initialSrc) ? 'display:flex;' : 'display:none;' }}">
                    <i class="fas fa-map-marker-slash"></i>
                    <span>Lokasi tidak tersedia untuk kontak ini</span>
                </div>
            </div>
            <div class="map-footer">
                <h4>Lokasi: <span id="map-active-label">{{ $initialName ?? 'Pilih kontak' }}</span></h4>
                <p>Klik kartu kontak di atas untuk melihat lokasinya di peta.</p>
            </div>
        </div>

    </div>
</section>
@endsection