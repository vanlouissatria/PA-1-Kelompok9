@extends('layouts.app')

@section('title', 'Warisan Alam & Budaya - GeoToba')

@section('content')
<style>
    /* HERO SECTION */
    .heritage-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .heritage-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .heritage-hero .container {
        position: relative;
        z-index: 2;
    }

    .heritage-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .heritage-hero p {
        color: rgba(255,255,255,0.88);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.92rem;
    }

    /* SECTION LAYOUT */
    .heritage-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2f8 100%);
    }

    .heritage-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .heritage-category-block {
        background: #ffffff;
        border-radius: 28px;
        padding: 40px;
        margin-bottom: 42px;
        box-shadow: 0 16px 35px rgba(29, 47, 76, 0.08);
        border-left: 6px solid #c6a43b;
    }

    .heritage-title-wrapper {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        border-bottom: 1px solid #e6eef7;
        padding-bottom: 18px;
    }

    .heritage-title-wrapper i {
        font-size: 2rem;
        color: #1f4b79;
    }

    .heritage-title-wrapper h2 {
        font-size: 2rem;
        color: #1f4b79;
        margin: 0;
        font-family: 'Playfair Display', serif;
    }

    .heritage-description {
        color: #475569;
        line-height: 1.8;
        font-size: 0.98rem;
        max-width: 860px;
        margin-bottom: 28px;
    }

    .heritage-items {
        display: grid;
        gap: 24px;
    }

    .heritage-item {
        display: grid;
        grid-template-columns: 280px minmax(0, 1fr);
        gap: 28px;
        align-items: flex-start;
        padding: 20px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .heritage-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .heritage-item:nth-child(even) {
        grid-template-columns: minmax(0, 1fr) 280px;
    }

    .heritage-item:nth-child(even) .heritage-item-image {
        order: 2;
    }

    .heritage-item-image {
        border-radius: 16px;
        overflow: hidden;
        width: 280px;
        height: 220px;
        box-shadow: 0 12px 28px rgba(15, 44, 69, 0.06);
        flex-shrink: 0;
    }

    .heritage-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .heritage-item:hover .heritage-item-image img {
        transform: scale(1.02);
    }

    .heritage-item-content {
        display: flex;
        flex-direction: column;
        gap: 14px;
        min-width: 0;
    }

    .heritage-item-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f3b2c;
        margin: 0;
        line-height: 1.4;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .heritage-item-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        color: #64748b;
        font-size: 0.85rem;
    }

    .heritage-item-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .heritage-item-meta i {
        color: #c6a43b;
    }

    .heritage-item-text {
        color: #334155;
        line-height: 1.75;
        font-size: 0.95rem;
        margin: 0;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        hyphens: auto;
    }

    .heritage-items.collapsed .heritage-item:nth-child(n+2) {
        display: none;
    }

    .read-more-btn {
        padding: 14px 26px;
        margin-top: 12px;
        border: none;
        border-radius: 999px;
        background: #c6a43b;
        color: #09212f;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        transition: background 0.25s ease, transform 0.25s ease;
    }

    .read-more-btn:hover {
        background: #a58a36;
        transform: translateY(-2px);
    }

    .empty-text {
        color: #64748b;
        font-style: italic;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 20px 0 10px;
    }

    @media (max-width: 992px) {
        .heritage-item {
            grid-template-columns: 1fr;
        }

        .heritage-item:nth-child(even) {
            grid-template-columns: 1fr;
        }

        .heritage-item:nth-child(even) .heritage-item-image {
            order: 0;
        }

        .heritage-item-image {
            width: 100%;
            height: 240px;
        }
    }

    @media (max-width: 680px) {
        .heritage-category-block {
            padding: 28px 20px;
        }

        .heritage-title-wrapper {
            flex-direction: column;
            align-items: flex-start;
        }

        .heritage-item {
            gap: 14px;
            padding: 16px 0;
        }

        .heritage-item-title {
            font-size: 1.15rem;
        }

        .heritage-item-text {
            font-size: 0.9rem;
        }

        .heritage-item-image {
            width: 100%;
            height: 200px;
        }

        .read-more-btn {
            padding: 12px 20px;
            font-size: 0.9rem;
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
                'geodiversity'       => ['icon' => 'fas fa-mountain',  'label' => 'Geodiversity',       'items' => $geodiversity ?? []],
                'biodiversity'       => ['icon' => 'fas fa-leaf',       'label' => 'Biodiversity',       'items' => $biodiversity ?? []],
                'cultural_diversity' => ['icon' => 'fas fa-landmark',   'label' => 'Cultural Diversity', 'items' => $cultural_diversity ?? []],
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
            const itemCount = container.querySelectorAll('.heritage-item').length;
            button.textContent = 'Baca Selengkapnya (' + (itemCount - 1) + ' data lainnya)';
        }
    }
</script>
@endsection