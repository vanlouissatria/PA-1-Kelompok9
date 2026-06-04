<?php $__env->startSection('title', 'Berita Terkini - Geosite Danau Toba'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* ============================================
       ROOT VARIABLES - PREMIUM DESIGN SYSTEM
       ============================================ */
    :root {
        --primary: #003366;
        --primary-dark: #002244;
        --gold: #c6a43b;
        --gold-light: #e8c96a;
        --gold-dark: #a58a36;
        --white: #ffffff;
        --white-soft: #fefefe;
        --gray: #64748b;
        --gray-light: #f1f5f9;
        
        /* Gradients */
        --gradient-gold: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 50%, var(--gold-dark) 100%);
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-hero: linear-gradient(135deg, #003366 0%, #1a4a7a 50%, #002244 100%);
        
        /* Shadows */
        --shadow-sm: 0 8px 20px rgba(0,0,0,0.03);
        --shadow-md: 0 12px 30px rgba(0,0,0,0.05);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.08);
        --shadow-xl: 0 30px 60px rgba(0,0,0,0.12);
        --shadow-gold: 0 20px 40px rgba(198,164,59,0.2);
        
        /* Transitions */
        --transition-bounce: cubic-bezier(0.34, 1.2, 0.64, 1);
        --transition-smooth: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --transition-elastic: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* ============================================
       HERO SECTION - CLEAN & ELEGANT
       ============================================ */
    .news-hero {
        background: var(--gradient-hero);
        padding: 100px 0 70px;
        margin-top: 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .news-hero::before {
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

    .news-hero-content {
        position: relative;
        z-index: 2;
        animation: heroReveal 0.8s var(--transition-bounce);
    }

    @keyframes heroReveal {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .news-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, var(--gold-light) 40%, #ffffff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 16px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
        position: relative;
        display: inline-block;
    }

    .news-hero p {
        font-size: 0.9rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.88);
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(8px);
        display: inline-block;
        padding: 8px 28px;
        border-radius: 50px;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .news-hero h1 { font-size: 2.2rem; }
        .news-hero { padding: 80px 0 50px; }
    }

    /* ============================================
       NEWS SECTION - CLEAN WHITE
       ============================================ */
    .news-section {
        padding: 80px 0 120px;
        background: var(--white-soft);
        position: relative;
    }

    .news-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: radial-gradient(rgba(198,164,59,0.03) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }

    /* ============================================
       STACK CONTAINER - CENTERED GRID
       ============================================ */
    .stack-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 32px;
        padding: 40px 0;
        justify-content: center;
        align-items: stretch;
    }

    @media (max-width: 768px) {
        .stack-container {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            padding: 20px 0;
        }
    }

    @media (max-width: 560px) {
        .stack-container {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin: 0 auto;
        }
    }

    /* ============================================
       SLIP CARD - PURE WHITE
       ============================================ */
    .slip-card {
        position: relative;
        background: var(--white);
        border-radius: 28px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s var(--transition-bounce);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
    }

    .slip-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 28px;
        padding: 2px;
        background: var(--gradient-gold);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        z-index: 3;
    }

    .slip-card:hover::before {
        opacity: 1;
    }

    .slip-card:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(198,164,59,0.2);
    }

    /* ============================================
       SLIP IMAGE
       ============================================ */
    .slip-image {
        position: relative;
        width: 100%;
        height: 240px;
        overflow: hidden;
        background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
    }

    .slip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s var(--transition-elastic);
    }

    .slip-card:hover .slip-image img {
        transform: scale(1.08);
    }

    .slip-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 60%, transparent 100%);
        padding: 30px 20px 20px;
        opacity: 0;
        transition: opacity 0.35s ease;
    }

    .slip-card:hover .slip-overlay {
        opacity: 1;
    }

    .slip-category {
        display: inline-block;
        background: var(--gradient-gold);
        color: var(--primary-dark);
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .slip-title-overlay {
        color: white;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 8px;
        line-height: 1.4;
    }

    /* ============================================
       SLIP INFO - PURE WHITE
       ============================================ */
    .slip-info {
        padding: 20px;
        background: var(--white);
        position: relative;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .slip-line {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.4s var(--transition-bounce);
        transform-origin: left;
    }

    .slip-card:hover .slip-line {
        transform: scaleX(1);
    }

    .slip-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .slip-card:hover .slip-title {
        color: var(--gold-dark);
    }

    .slip-excerpt {
        font-size: 0.8rem;
        color: var(--gray);
        line-height: 1.55;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .slip-date {
        font-size: 0.7rem;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 8px;
    }

    .slip-date i {
        font-size: 0.7rem;
        color: var(--gold);
    }

    .slip-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
    }

    .slip-views {
        font-size: 0.7rem;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .slip-views i {
        font-size: 0.65rem;
        color: var(--gold);
    }

    .slip-number {
        font-size: 0.7rem;
        color: #cbd5e1;
        font-family: monospace;
        font-weight: 600;
    }

    .slip-actions {
        margin-top: 16px;
    }

    .btn-read {
        width: 100%;
        background: transparent;
        border: 2px solid var(--gold);
        color: var(--primary);
        padding: 10px 16px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s var(--transition-bounce);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-read i {
        transition: transform 0.25s ease;
    }

    .btn-read:hover {
        background: var(--gradient-gold);
        color: var(--primary-dark);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-gold);
        gap: 12px;
    }

    .btn-read:hover i {
        transform: translateX(4px);
    }

    /* ============================================
       EMPTY STATE
       ============================================ */
    .empty-news {
        text-align: center;
        padding: 80px 40px;
        background: var(--white);
        border-radius: 32px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(0,0,0,0.04);
        max-width: 500px;
        margin: 40px auto;
    }

    .empty-news i {
        font-size: 3.5rem;
        background: var(--gradient-gold);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 20px;
    }

    .empty-news h3 {
        font-size: 1.3rem;
        color: var(--primary);
        margin-bottom: 8px;
        font-weight: 600;
    }

    .empty-news p {
        color: var(--gray);
        font-size: 0.85rem;
    }

    /* ============================================
       MODAL READER
       ============================================ */
    #fullReader {
        position: fixed;
        top: 100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--white);
        z-index: 99999;
        transition: top 0.7s cubic-bezier(0.86, 0, 0.07, 1);
        overflow-y: auto;
        visibility: hidden;
    }

    #fullReader.active {
        top: 0;
        visibility: visible;
    }

    .progress-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #e2e8f0;
        z-index: 100;
    }

    .progress-bar {
        height: 4px;
        background: var(--gradient-gold);
        width: 0%;
        transition: width 0.1s ease;
    }

    .reader-nav {
        padding: 20px 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(255,255,255,0.98);
        backdrop-filter: blur(12px);
        position: sticky;
        top: 0;
        z-index: 99;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .reader-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .reader-logo span {
        background: var(--gradient-gold);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .btn-close-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s var(--transition-bounce);
        color: var(--primary);
        font-size: 1.2rem;
    }

    .btn-close-circle:hover {
        background: var(--gradient-gold);
        color: var(--primary-dark);
        transform: rotate(90deg) scale(1.05);
    }

    .reader-content-wrap {
        max-width: 850px;
        margin: 0 auto;
        padding: 40px 30px 60px;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease 0.2s;
    }

    #fullReader.active .reader-content-wrap {
        opacity: 1;
        transform: translateY(0);
    }

    .reader-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .reader-date {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: var(--gold);
        display: inline-block;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .reader-title-display {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        line-height: 1.25;
        color: var(--primary);
        margin: 20px 0;
        font-weight: 800;
    }

    .reader-divider {
        width: 60px;
        height: 3px;
        background: var(--gradient-gold);
        margin: 20px auto;
        border-radius: 3px;
    }

    .reader-author {
        font-size: 0.8rem;
        color: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .reader-author i {
        color: var(--gold);
    }

    .reader-hero-img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 24px;
        margin: 30px 0 40px;
        box-shadow: var(--shadow-xl);
        transition: transform 0.3s ease;
    }

    .reader-hero-img:hover {
        transform: scale(1.02);
    }

    .reader-article-body {
        font-size: 1rem;
        line-height: 1.9;
        color: #334155;
        text-align: left;
        font-family: 'Inter', sans-serif;
    }

    .reader-article-body p {
        margin-bottom: 25px;
    }

    .reader-article-body h2, 
    .reader-article-body h3 {
        color: var(--primary);
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .reader-footer {
        margin: 60px 0 0;
        text-align: center;
        border-top: 1px solid #e2e8f0;
        padding-top: 40px;
    }

    .btn-back {
        background: var(--gradient-primary);
        color: white;
        padding: 12px 36px;
        border-radius: 60px;
        border: none;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s var(--transition-bounce);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-back i {
        transition: transform 0.3s ease;
    }

    .btn-back:hover {
        background: var(--gradient-gold);
        color: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: var(--shadow-gold);
        gap: 14px;
    }

    .btn-back:hover i {
        transform: translateX(-4px);
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    .slip-card {
        animation: fadeInUp 0.5s var(--transition-smooth) backwards;
    }

    .slip-card:nth-child(1) { animation-delay: 0.05s; }
    .slip-card:nth-child(2) { animation-delay: 0.1s; }
    .slip-card:nth-child(3) { animation-delay: 0.15s; }
    .slip-card:nth-child(4) { animation-delay: 0.2s; }
    .slip-card:nth-child(5) { animation-delay: 0.25s; }
    .slip-card:nth-child(6) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 992px) {
        .slip-card:hover {
            transform: translateY(-8px);
        }
    }

    @media (max-width: 768px) {
        .news-section {
            padding: 50px 0 80px;
        }
        
        .slip-image {
            height: 200px;
        }
        
        .slip-info {
            padding: 16px;
        }
        
        .reader-title-display {
            font-size: 1.6rem;
        }
        
        .reader-content-wrap {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 16px;
        }
        
        .slip-image {
            height: 220px;
        }
        
        .news-hero h1 {
            font-size: 1.8rem;
        }
    }

    /* ============================================
       SCROLLBAR
       ============================================ */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary) 0%, var(--gold) 100%);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--gold) 0%, var(--primary-dark) 100%);
    }

    /* ============================================
       DARK MODE - TETAP PUTIH BERSIH
       ============================================ */
    @media (prefers-color-scheme: dark) {
        .news-section {
            background: var(--white-soft);
        }
        
        .slip-card {
            background: var(--white);
        }
        
        .slip-info {
            background: var(--white);
        }
        
        .slip-title {
            color: var(--primary);
        }
        
        .slip-excerpt {
            color: var(--gray);
        }
        
        .empty-news {
            background: var(--white);
        }
        
        #fullReader {
            background: var(--white);
        }
        
        .reader-nav {
            background: rgba(255,255,255,0.98);
        }
        
        .reader-title-display {
            color: var(--primary);
        }
        
        .reader-article-body {
            color: #334155;
        }
        
        .reader-date {
            color: var(--gold);
        }
        
        .reader-author {
            color: var(--gray);
        }
        
        .progress-container {
            background: #e2e8f0;
        }
        
        .btn-close-circle {
            background: #f1f5f9;
            color: var(--primary);
        }
        
        .btn-back {
            background: var(--gradient-primary);
            color: white;
        }
        
        .btn-back:hover {
            background: var(--gradient-gold);
            color: var(--primary-dark);
        }
    }
</style>

<!-- HERO SECTION - SAME AS GALERI -->
<div class="news-hero">
    <div class="news-hero-content">
        <h1>BERITA TERKINI</h1>
    </div>
</div>

<!-- STACKED SLIP CARDS SECTION - SAME VISUAL AS GALERI -->
<section class="news-section">
    <div class="container">
        <div class="stack-container">
            <?php $counter = 1; ?>
            <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Handle gambar sama seperti galeri
                    if (!empty($item->gambar)) {
                        $imageSrc = image_url($item->gambar);
                    } else {
                        $imageSrc = asset('image/default.jpg');
                    }
                    
                    // Excerpt untuk preview
                    $excerpt = strip_tags($item->konten);
                    $excerpt = Str::limit($excerpt, 80);
                ?>
                
                <div class="slip-card" onclick="openReader(<?php echo e($item->id); ?>)">
                    <div class="slip-image">
                        <img src="<?php echo e($imageSrc); ?>" 
                             alt="<?php echo e($item->judul); ?>" 
                             loading="lazy" 
                             onerror="this.src='<?php echo e(asset('image/default.jpg')); ?>'">
                        <div class="slip-overlay">
                            <span class="slip-category">BERITA</span>
                            <div class="slip-title-overlay"><?php echo e(Str::limit($item->judul, 35)); ?></div>
                        </div>
                    </div>
                    <div class="slip-info">
                        <div class="slip-line"></div>
                        <div class="slip-title"><?php echo e(Str::limit($item->judul, 30)); ?></div>
                        <div class="slip-excerpt"><?php echo e($excerpt); ?></div>
                        <div class="slip-date">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?php echo e(\Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y')); ?></span>
                        </div>
                        <div class="slip-views">
                            <i class="fas fa-eye"></i>
                            <span><?php echo e($item->views ?? 0); ?></span>
                        </div>
                        <div class="slip-number">#<?php echo e(str_pad($counter, 3, '0', STR_PAD_LEFT)); ?></div>
                        <div class="slip-actions">
                            <button class="btn-read" onclick="openReader(<?php echo e($item->id); ?>)">Baca</button>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-news">
                    <i class="fas fa-newspaper"></i>
                    <h3>Belum Ada Berita</h3>
                    <p style="color: #999; margin-top: 10px;">Silakan tambah berita melalui panel admin.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- READER MODAL - FUNGSI BERITA TETAP -->
<div id="fullReader">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
    
    <div class="reader-nav">
        <div class="reader-logo">Geo<span>Toba</span></div>
        <button class="btn-close-circle" onclick="closeReader()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="reader-content-wrap">
        <div class="reader-header">
            <span class="reader-date" id="r-date"></span>
            <h1 id="r-title" class="reader-title-display"></h1>
            <div class="reader-divider"></div>
            <div class="reader-author">
                <i class="far fa-user"></i>
                <span id="r-author">Admin GeoToba</span>
            </div>
        </div>

        <img id="r-img" src="" class="reader-hero-img" alt="">

        <div id="r-content" class="reader-article-body"></div>

        <div class="reader-footer">
            <button class="btn-back" onclick="closeReader()">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </button>
        </div>
    </div>
</div>

<script>
    // Data berita dari server
    const newsData = <?php echo json_encode($berita->items(), 15, 512) ?>;

    function openReader(id) {
        const item = newsData.find(x => x.id === id);
        if(!item) return;

        // Handle gambar untuk reader
        let imgSrc = '<?php echo e(asset("image/default.jpg")); ?>';
        
        if (item.gambar && item.gambar.trim() !== '') {
            if (item.gambar.length > 500 && !item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else if (item.gambar) {
                imgSrc = '<?php echo e(asset("storage")); ?>/' + item.gambar;
            }
        }

        // Set content
        document.getElementById('r-title').innerText = item.judul;
        document.getElementById('r-content').innerHTML = item.konten;
        document.getElementById('r-img').src = imgSrc;
        document.getElementById('r-date').innerHTML = new Date(item.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('r-author').innerHTML = item.penulis || 'Admin GeoToba';

        // Aktifkan Reader
        const reader = document.getElementById('fullReader');
        reader.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Reset Scroll Progress
        const progressBar = document.getElementById("myBar");
        if (progressBar) {
            progressBar.style.width = "0%";
        }
        
        // Increment views via AJAX
        fetch(`/api/berita/${id}/view`, { 
            method: 'POST', 
            headers: { 
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json'
            } 
        }).catch(err => console.log('View increment error:', err));
    }

    function closeReader() {
        const reader = document.getElementById('fullReader');
        reader.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Progress Bar saat scroll
    const readerElement = document.getElementById('fullReader');
    if (readerElement) {
        readerElement.onscroll = function() {
            const winScroll = readerElement.scrollTop;
            const height = readerElement.scrollHeight - readerElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            const progressBar = document.getElementById("myBar");
            if (progressBar) {
                progressBar.style.width = scrolled + "%";
            }
        };
    }

    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const reader = document.getElementById('fullReader');
            if (reader && reader.classList.contains('active')) {
                closeReader();
            }
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/pages/berita.blade.php ENDPATH**/ ?>