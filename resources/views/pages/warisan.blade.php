@extends('layouts.app')

@section('title', 'Warisan Alam & Budaya - GeoToba')

@section('content')
<style>
    /* ============================================
       ROOT VARIABLES - PREMIUM DESIGN SYSTEM
       ============================================ */
    :root {
        --primary: #003366;
        --primary-dark: #002244;
        --primary-light: #1a4a7a;
        --gold: #c6a43b;
        --gold-light: #e8c96a;
        --gold-dark: #a58a36;
        --accent: #0f3b2c;
        --white: #ffffff;
        --white-pure: #ffffff;
        --dark: #09212f;
        --gray: #64748b;
        --gray-light: #f8fafc;
        
        /* Gradients Gila - Card jadi PUTIH */
        --gradient-gold: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 50%, var(--gold-dark) 100%);
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-hero: linear-gradient(135deg, #003366 0%, #1a4a7a 50%, #002244 100%);
        --gradient-card: linear-gradient(145deg, #ffffff 0%, #ffffff 100%);
        --gradient-hover: linear-gradient(145deg, #ffffff 0%, #fffef8 100%);
        --gradient-glass: linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
        
        /* Shadows Gila */
        --shadow-sm: 0 10px 30px -10px rgba(0,0,0,0.08);
        --shadow-md: 0 20px 40px -12px rgba(0,0,0,0.12);
        --shadow-lg: 0 25px 50px -12px rgba(0,0,0,0.2);
        --shadow-xl: 0 35px 60px -15px rgba(0,0,0,0.25);
        --shadow-2xl: 0 50px 80px -20px rgba(0,0,0,0.3);
        --shadow-gold: 0 20px 40px -12px rgba(198,164,59,0.3);
        --shadow-neon: 0 0 20px rgba(198,164,59,0.4), 0 0 40px rgba(198,164,59,0.2);
        
        /* Transitions Gila */
        --transition-bounce: cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-smooth: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --transition-elastic: cubic-bezier(0.68, -0.55, 0.265, 1.55);
        --transition-flip: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* ============================================
       HERO SECTION - SUPER DRAMATIC
       ============================================ */
    .heritage-hero {
        background: var(--gradient-hero);
        padding: 140px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
        clip-path: polygon(0% 0%, 100% 0%, 100% 90%, 0% 100%);
        margin-bottom: -40px;
    }

    /* Animated Particles Background */
    .heritage-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    /* Floating Orbs */
    .heritage-hero::after {
        content: '';
        position: absolute;
        bottom: 10%;
        right: 5%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(198,164,59,0.15), transparent 70%);
        border-radius: 50%;
        animation: floatBubble 8s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes floatBubble {
        0%, 100% { transform: translateY(0) scale(1); opacity: 0.6; }
        50% { transform: translateY(-30px) scale(1.05); opacity: 1; }
    }

    .heritage-hero .container {
        position: relative;
        z-index: 2;
        animation: heroReveal 0.8s var(--transition-bounce);
    }

    @keyframes heroReveal {
        0% { opacity: 0; transform: translateY(50px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .heritage-hero h1 {
        font-size: 4rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, var(--gold-light) 50%, #ffffff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 3px;
        text-shadow: 0 5px 20px rgba(0,0,0,0.2);
        position: relative;
        display: inline-block;
    }

    .heritage-hero h1::before {
        content: '✦';
        position: absolute;
        left: -30px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        color: var(--gold);
        opacity: 0;
        animation: starGlow 2s ease-in-out infinite;
    }

    .heritage-hero h1::after {
        content: '✦';
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        color: var(--gold);
        opacity: 0;
        animation: starGlow 2s ease-in-out infinite 1s;
    }

    @keyframes starGlow {
        0%, 100% { opacity: 0; transform: translateY(-50%) scale(0.5); }
        50% { opacity: 1; transform: translateY(-50%) scale(1); }
    }

    .heritage-hero p {
        color: rgba(255,255,255,0.9);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 1rem;
        font-weight: 500;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        position: relative;
        display: inline-block;
        padding: 8px 24px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 60px;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .heritage-hero h1 { font-size: 2.5rem; }
        .heritage-hero h1::before, .heritage-hero h1::after { display: none; }
        .heritage-hero { padding: 100px 0 60px; }
    }

    /* ============================================
       SECTION LAYOUT - PREMIUM
       ============================================ */
    .heritage-section {
        padding: 80px 0 120px;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2f8 100%);
        position: relative;
    }

    /* Background Pattern */
    .heritage-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: radial-gradient(rgba(198,164,59,0.03) 2px, transparent 2px);
        background-size: 30px 30px;
        pointer-events: none;
    }

    .heritage-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }

    /* ============================================
       CATEGORY BLOCK - CARD PUTIH SUPER GILA
       ============================================ */
    .heritage-category-block {
        background: #ffffff;
        border-radius: 48px;
        padding: 48px;
        margin-bottom: 48px;
        box-shadow: var(--shadow-lg);
        transition: all 0.5s var(--transition-bounce);
        border: 1px solid rgba(198,164,59,0.1);
        position: relative;
        overflow: hidden;
    }

    /* Glowing Border Effect */
    .heritage-category-block::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 48px;
        padding: 2px;
        background: var(--gradient-gold);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .heritage-category-block:hover {
        transform: translateY(-12px) scale(1.01);
        box-shadow: var(--shadow-2xl);
        border-color: rgba(198,164,59,0.25);
        background: #ffffff;
    }

    .heritage-category-block:hover::before {
        opacity: 1;
    }

    /* Decorative Corner */
    .heritage-category-block::after {
        content: '✧';
        position: absolute;
        bottom: 20px;
        right: 30px;
        font-size: 3rem;
        color: var(--gold);
        opacity: 0.04;
        font-family: serif;
        transition: all 0.5s ease;
        pointer-events: none;
    }

    .heritage-category-block:hover::after {
        opacity: 0.12;
        transform: rotate(10deg) scale(1.2);
    }

    @media (max-width: 768px) {
        .heritage-category-block {
            padding: 32px 24px;
            border-radius: 36px;
        }
    }

    /* Title Wrapper Premium */
    .heritage-title-wrapper {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
        border-bottom: 2px solid rgba(198,164,59,0.2);
        padding-bottom: 20px;
        position: relative;
    }

    .heritage-title-wrapper::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: var(--gradient-gold);
        border-radius: 2px;
        transition: width 0.4s ease;
    }

    .heritage-category-block:hover .heritage-title-wrapper::before {
        width: 150px;
    }

    .heritage-title-wrapper i {
        font-size: 2.5rem;
        background: var(--gradient-gold);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        transition: transform 0.3s ease;
    }

    .heritage-category-block:hover .heritage-title-wrapper i {
        transform: rotate(5deg) scale(1.05);
    }

    .heritage-title-wrapper h2 {
        font-size: 2.2rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
        font-family: 'Playfair Display', serif;
        letter-spacing: -0.5px;
        transition: transform 0.3s ease;
    }

    .heritage-category-block:hover .heritage-title-wrapper h2 {
        transform: translateX(8px);
    }

    @media (max-width: 680px) {
        .heritage-title-wrapper {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        .heritage-title-wrapper h2 { font-size: 1.6rem; }
        .heritage-title-wrapper i { font-size: 2rem; }
    }

    /* Description */
    .heritage-description {
        color: #475569;
        line-height: 1.8;
        font-size: 1rem;
        max-width: 860px;
        margin-bottom: 32px;
        padding-left: 12px;
        border-left: 3px solid var(--gold);
        transition: all 0.3s ease;
    }

    .heritage-category-block:hover .heritage-description {
        border-left-color: var(--gold-light);
        padding-left: 20px;
    }

    /* ============================================
       HERITAGE ITEMS - SUPER GILA
       ============================================ */
    .heritage-items {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .heritage-item {
        display: grid;
        grid-template-columns: 300px minmax(0, 1fr);
        gap: 32px;
        align-items: center;
        padding: 28px 0;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        transition: all 0.4s var(--transition-bounce);
        position: relative;
        background: transparent;
    }

    .heritage-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .heritage-item:nth-child(even) {
        grid-template-columns: minmax(0, 1fr) 300px;
    }

    .heritage-item:nth-child(even) .heritage-item-image {
        order: 2;
    }

    /* Hover Effect on Item */
    .heritage-item:hover {
        background: linear-gradient(90deg, rgba(198,164,59,0.02) 0%, transparent 50%);
        border-radius: 24px;
        padding-left: 20px;
        padding-right: 20px;
        margin-left: -20px;
        margin-right: -20px;
    }

    /* Image Container Premium */
    .heritage-item-image {
        border-radius: 24px;
        overflow: hidden;
        width: 300px;
        height: 240px;
        box-shadow: var(--shadow-md);
        position: relative;
        transition: all 0.4s var(--transition-bounce);
        cursor: pointer;
    }

    /* Image Overlay Effect */
    .heritage-item-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(198,164,59,0.25), transparent);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .heritage-item-image::after {
        content: '🔍';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        font-size: 2rem;
        color: white;
        z-index: 2;
        transition: transform 0.3s var(--transition-bounce);
        opacity: 0;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .heritage-item-image:hover::before {
        opacity: 1;
    }

    .heritage-item-image:hover::after {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }

    .heritage-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s var(--transition-elastic);
    }

    .heritage-item-image:hover img {
        transform: scale(1.1);
    }

    /* Content Area */
    .heritage-item-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
        min-width: 0;
    }

    /* Premium Title */
    .heritage-item-title {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
        line-height: 1.35;
        letter-spacing: -0.3px;
        transition: transform 0.3s ease;
    }

    .heritage-item:hover .heritage-item-title {
        transform: translateX(6px);
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
        -webkit-background-clip: text;
        background-clip: text;
    }

    /* Meta Information */
    .heritage-item-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        color: var(--gray);
        font-size: 0.85rem;
    }

    .heritage-item-meta span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        padding: 4px 8px;
        border-radius: 40px;
        background: rgba(198,164,59,0.05);
    }

    .heritage-item:hover .heritage-item-meta span {
        background: rgba(198,164,59,0.1);
        transform: translateY(-2px);
    }

    .heritage-item-meta i {
        color: var(--gold);
        transition: transform 0.3s ease;
    }

    .heritage-item:hover .heritage-item-meta i {
        transform: scale(1.1);
    }

    /* Text Content with Readability */
    .heritage-item-text {
        color: #334155;
        line-height: 1.8;
        font-size: 0.95rem;
        margin: 0;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        hyphens: auto;
        transition: color 0.3s ease;
    }

    .heritage-item:hover .heritage-item-text {
        color: #1a2a3a;
    }

    /* Button Read More */
    .heritage-item-text.collapsed {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
    }

    .read-more-btn {
        padding: 10px 24px;
        margin-top: 12px;
        border: none;
        border-radius: 60px;
        background: var(--gradient-gold);
        color: var(--primary-dark);
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s var(--transition-bounce);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow-sm);
    }

    .read-more-btn i {
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover {
        background: var(--gradient-gold);
        transform: translateY(-3px);
        box-shadow: var(--shadow-gold);
        gap: 14px;
        padding: 10px 28px;
    }

    .read-more-btn:hover i {
        transform: translateX(4px);
    }

    .read-more-btn:active {
        transform: translateY(0);
    }

    /* Empty State */
    .empty-text {
        color: var(--gray);
        font-style: italic;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 30px 20px;
        background: rgba(0,0,0,0.02);
        border-radius: 24px;
        justify-content: center;
    }

    .empty-text i {
        font-size: 1.5rem;
        color: var(--gold);
        opacity: 0.6;
    }

    /* ============================================
       ANIMATION ON SCROLL
       ============================================ */
    .heritage-category-block,
    .heritage-item {
        animation: fadeInUp 0.7s var(--transition-smooth) backwards;
    }

    .heritage-category-block:nth-child(1) { animation-delay: 0.05s; }
    .heritage-category-block:nth-child(2) { animation-delay: 0.1s; }
    .heritage-category-block:nth-child(3) { animation-delay: 0.15s; }
    .heritage-category-block:nth-child(4) { animation-delay: 0.2s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============================================
       RESPONSIVE PERFECTION
       ============================================ */
    @media (max-width: 992px) {
        .heritage-item,
        .heritage-item:nth-child(even) {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .heritage-item:nth-child(even) .heritage-item-image {
            order: 0;
        }

        .heritage-item-image {
            width: 100%;
            height: 260px;
        }

        .heritage-item:hover {
            padding-left: 0;
            padding-right: 0;
            margin-left: 0;
            margin-right: 0;
        }
    }

    @media (max-width: 680px) {
        .heritage-category-block {
            padding: 28px 20px;
            border-radius: 28px;
        }

        .heritage-title-wrapper h2 {
            font-size: 1.4rem;
        }

        .heritage-description {
            font-size: 0.9rem;
            padding-left: 8px;
        }

        .heritage-item {
            gap: 16px;
            padding: 20px 0;
        }

        .heritage-item-title {
            font-size: 1.2rem;
        }

        .heritage-item-text {
            font-size: 0.85rem;
            line-height: 1.7;
        }

        .heritage-item-image {
            height: 220px;
            border-radius: 20px;
        }

        .heritage-item-meta {
            gap: 12px;
            font-size: 0.75rem;
        }

        .read-more-btn {
            padding: 8px 20px;
            font-size: 0.8rem;
        }
    }

    /* ============================================
       SCROLLBAR CUSTOM
       ============================================ */
    .heritage-section::-webkit-scrollbar {
        width: 10px;
    }

    .heritage-section::-webkit-scrollbar-track {
        background: #eef2f8;
        border-radius: 10px;
    }

    .heritage-section::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary) 0%, var(--gold) 100%);
        border-radius: 10px;
    }

    /* ============================================
       LOADING SKELETON (Optional)
       ============================================ */
    .heritage-item.skeleton {
        pointer-events: none;
        background: linear-gradient(110deg, #ececec 8%, #f5f5f5 18%, #ececec 33%);
        background-size: 200% 100%;
        animation: shimmer 1.5s linear infinite;
        border-radius: 24px;
    }

    @keyframes shimmer {
        to {
            background-position: -200% 0;
        }
    }

    /* ============================================
       DARK MODE SUPPORT (Tetap Putih)
       ============================================ */
    @media (prefers-color-scheme: dark) {
        :root {
            --gray-light: #1a1a2e;
        }
        
        .heritage-category-block {
            background: #ffffff;
        }
        
        .heritage-category-block:hover {
            background: #ffffff;
        }
        
        .heritage-item-text {
            color: #334155;
        }
        
        .heritage-description {
            color: #475569;
        }
    }
</style>

<section class="heritage-hero">
    <div class="container">
        <h1>Warisan Alam & Budaya</h1>
        <p>Tiga kategori utama, satu halaman. Detail muncul dalam kartu tanpa pindah halaman.</p>
    </div>
</section>

<section class="heritage-section">
    <div class="heritage-container">

        @php
            $categories = [
                'geodiversity' => ['icon' => 'fas fa-mountain', 'label' => 'Geodiversity', 'items' => $geodiversity ?? []],
                'biodiversity' => ['icon' => 'fas fa-leaf', 'label' => 'Biodiversity', 'items' => $biodiversity ?? []],
                'cultural_diversity' => ['icon' => 'fas fa-landmark', 'label' => 'Cultural Diversity', 'items' => $cultural_diversity ?? []],
            ];
        @endphp

        @foreach($categories as $key => $category)
            <div class="heritage-category-block">
                <div class="heritage-title-wrapper">
                    <i class="{{ $category['icon'] }}"></i>
                    <h2>{{ $category['label'] }}</h2>
                </div>
                <p class="heritage-description">
                    Data di bawah ini adalah hasil input melalui panel admin untuk jenis {{ strtolower($category['label']) }}. Setiap item ditampilkan dalam satu baris yang bergantian penempatan gambar dan teks.
                </p>

                @if(count($category['items']) > 0)
                    <div class="heritage-items collapsed" id="heritage-items-{{ $key }}">
                        @foreach($category['items'] as $item)
                            @php
                                $warisanImage = $item->gambar;
                                if ($warisanImage && !\Illuminate\Support\Str::startsWith($warisanImage, ['http://', 'https://', 'data:'])) {
                                    $warisanImage = asset('storage/' . ltrim($warisanImage, '/'));
                                }
                            @endphp
                            <div class="heritage-item" id="warisan-item-{{ $item->id }}">
                                <div class="heritage-item-image">
                                    <img src="{{ $warisanImage ?: asset('image/default.jpg') }}" alt="{{ $item->judul }}">
                                </div>
                                <div class="heritage-item-content">
                                    <h3 class="heritage-item-title">{{ $item->judul }}</h3>
                                    <div class="heritage-item-meta">
                                        <span><i class="fas fa-layer-group"></i> {{ $item->label_jenis }}</span>
                                        <span><i class="fas fa-sort-numeric-down"></i> Urutan {{ $item->urutan }}</span>
                                    </div>
                                    <p class="heritage-item-text">{!! nl2br(e($item->deskripsi)) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(count($category['items']) > 1)
                        <button type="button" class="read-more-btn" onclick="toggleCategory('{{ $key }}', this)">
                            Baca Selengkapnya ({{ count($category['items']) - 1 }} data lainnya)
                        </button>
                    @endif
                @else
                    <p class="empty-text"><i class="fas fa-info-circle"></i> Belum ada data {{ strtolower($category['label']) }}.</p>
                @endif
            </div>
        @endforeach

    </div>
</section>

<script>
    function toggleCategory(categoryKey, button) {
        const container = document.getElementById('heritage-items-' + categoryKey);
        if (!container) return;
        
        const isCollapsed = container.classList.contains('collapsed');
        
        if (isCollapsed) {
            container.classList.remove('collapsed');
            button.textContent = 'Sembunyikan';
        } else {
            container.classList.add('collapsed');
            // Hitung jumlah item yang tersembunyi
            const itemCount = container.querySelectorAll('.heritage-item').length;
            button.textContent = 'Baca Selengkapnya (' + (itemCount - 1) + ' data lainnya)';
        }
    }
</script>
@endsection