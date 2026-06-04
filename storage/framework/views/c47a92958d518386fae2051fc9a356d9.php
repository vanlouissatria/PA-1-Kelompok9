<?php $__env->startSection('title', 'Kontak - Geosite Danau Toba'); ?>

<?php $__env->startSection('content'); ?>
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
        --gradient-text-gold: linear-gradient(135deg, #f5e6b8, #c6a43b, #e8c96a);
        
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
       HERO SECTION - STUNNING WITH GOLD TEXT
       ============================================ */
    .kontak-hero {
        background: var(--gradient-hero);
        padding: 100px 0 70px;
        margin-top: 76px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Efek ornamen emas di hero */
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
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    /* Header Card */
    .kontak-person-card h4 {
        font-size: 1.5rem;
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
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #eef2f6;
        font-weight: 500;
    }

    /* Detail Group Layout */
    .kontak-details {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .kontak-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 12px;
    }

    .detail-group {
        background: #fafbfc;
        padding: 10px 12px;
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
        line-height: 1.5;
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

    .social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
    }

    .social-icons a {
        display: inline-flex;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #f8fafc;
        color: var(--primary);
        border: 1px solid #e2e8f0;
        text-decoration: none;
        transition: var(--transition);
    }

    .social-icons a:hover {
        background: var(--gradient-gold);
        color: #fff;
        border-color: var(--gold);
        transform: translateY(-3px);
    }

    /* ============================================
       ANIMATIONS & RESPONSIVE
       ============================================ */
    .kontak-person-card {
        animation: fadeInUp 0.5s ease backwards;
    }
    .kontak-person-card:nth-child(1) { animation-delay: 0.05s; }
    .kontak-person-card:nth-child(2) { animation-delay: 0.1s; }
    .kontak-person-card:nth-child(3) { animation-delay: 0.15s; }

    @media (max-width: 992px) {
        .kontak-section { padding: 50px 0 80px; }
    }

    @media (max-width: 768px) {
        .kontak-section { padding: 40px 0 60px; }
        .kontak-person-card { padding: 20px; }
        .kontak-person-card h4 { font-size: 1.3rem; }
    }

    @media (max-width: 480px) {
        .container { padding: 0 16px; }
        .kontak-person-card { padding: 18px; }
        .kontak-row { grid-template-columns: 1fr; }
    }

    /* Scrollbar */
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

        
        <div class="kontak-grid" data-aos="fade-up">
            <?php $__empty_1 = true; $__currentLoopData = $kontaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kontak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Helper untuk normalisasi link sosial media
                    $fbUrl = $kontak->facebook ? (!preg_match('/^https?:\/\//i', $kontak->facebook) ? "https://facebook.com/".trim($kontak->facebook) : $kontak->facebook) : "";
                    $igUrl = $kontak->instagram ? (!preg_match('/^https?:\/\//i', $kontak->instagram) ? "https://instagram.com/".ltrim(trim($kontak->instagram), "@") : $kontak->instagram) : "";
                    $twUrl = $kontak->twitter ? (!preg_match('/^https?:\/\//i', $kontak->twitter) ? "https://x.com/".ltrim(trim($kontak->twitter), "@") : $kontak->twitter) : "";
                    $ytUrl = $kontak->youtube ? (!preg_match('/^https?:\/\//i', $kontak->youtube) ? "https://youtube.com/".trim($kontak->youtube) : $kontak->youtube) : "";
                    $ttUrl = $kontak->tiktok ? (!preg_match('/^https?:\/\//i', $kontak->tiktok) ? "https://tiktok.com/@".ltrim(trim($kontak->tiktok), "@") : $kontak->tiktok) : "";
                ?>
                
                <div class="kontak-person-card">
                    <div>
                        <h4><?php echo e($kontak->judul); ?></h4>
                        <?php if($kontak->subjudul): ?>
                            <p class="card-subtitle"><?php echo e($kontak->subjudul); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="kontak-details">
                        
                        <?php if(!empty($kontak->alamat) || !empty($kontak->kode_pos)): ?>
                            <div class="kontak-row">
                                <?php if(!empty($kontak->alamat)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fas fa-map-marker-alt"></i> Alamat</strong>
                                        <p><?php echo nl2br(e($kontak->alamat)); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($kontak->kode_pos)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fas fa-mail-bulk"></i> Kode Pos</strong>
                                        <p><?php echo e($kontak->kode_pos); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($kontak->facebook) || !empty($kontak->instagram) || !empty($kontak->twitter)): ?>
                            <div class="kontak-row">
                                <?php if(!empty($kontak->facebook)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-facebook-f"></i> Facebook</strong>
                                        <a href="<?php echo e($fbUrl); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo e($kontak->facebook); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($kontak->instagram)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-instagram"></i> Instagram</strong>
                                        <a href="<?php echo e($igUrl); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo e($kontak->instagram); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($kontak->twitter)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-twitter"></i> Twitter</strong>
                                        <a href="<?php echo e($twUrl); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo e($kontak->twitter); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($kontak->youtube) || !empty($kontak->tiktok)): ?>
                            <div class="kontak-row">
                                <?php if(!empty($kontak->youtube)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-youtube"></i> YouTube</strong>
                                        <a href="<?php echo e($ytUrl); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo e($kontak->youtube); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($kontak->tiktok)): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-tiktok"></i> TikTok</strong>
                                        <a href="<?php echo e($ttUrl); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo e($kontak->tiktok); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($kontak->telepon1 || $kontak->telepon2 || $kontak->telepon3): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-phone"></i> Telepon</strong>
                                    <?php if($kontak->telepon1): ?>
                                        <p><a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $kontak->telepon1)); ?>"><?php echo e($kontak->telepon1); ?></a></p>
                                    <?php endif; ?>
                                    <?php if($kontak->telepon2): ?>
                                        <p><a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $kontak->telepon2)); ?>"><?php echo e($kontak->telepon2); ?></a></p>
                                    <?php endif; ?>
                                    <?php if($kontak->telepon3): ?>
                                        <p><a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $kontak->telepon3)); ?>"><?php echo e($kontak->telepon3); ?></a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($kontak->email1 || $kontak->email2 || $kontak->email3): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-envelope"></i> Email</strong>
                                    <?php if($kontak->email1): ?>
                                        <p><a href="mailto:<?php echo e($kontak->email1); ?>"><?php echo e($kontak->email1); ?></a></p>
                                    <?php endif; ?>
                                    <?php if($kontak->email2): ?>
                                        <p><a href="mailto:<?php echo e($kontak->email2); ?>"><?php echo e($kontak->email2); ?></a></p>
                                    <?php endif; ?>
                                    <?php if($kontak->email3): ?>
                                        <p><a href="mailto:<?php echo e($kontak->email3); ?>"><?php echo e($kontak->email3); ?></a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center text-muted">Belum ada data kontak.</p>
            <?php endif; ?>
        </div>

        <div class="kontak-map-card" data-aos="fade-up" data-aos-delay="100">
            <div class="map-wrapper">
                <iframe
                    id="kontak-map-iframe"
                    src="<?php echo e($initialSrc ?? ''); ?>"
                    loading="lazy"
                    allowfullscreen
                    style="<?php echo e(empty($initialSrc) ? 'display:none;' : ''); ?>">
                </iframe>
                <div class="map-unavailable" id="map-unavailable" style="<?php echo e(empty($initialSrc) ? 'display:flex;' : 'display:none;'); ?>">
                    <i class="fas fa-map-marker-slash"></i>
                    <span>Lokasi tidak tersedia untuk kontak ini</span>
                </div>
            </div>
            <div class="map-footer">
                <h4>Lokasi: <span id="map-active-label"><?php echo e($initialName ?? 'Pilih kontak'); ?></span></h4>
                <p>Klik kartu kontak di atas untuk melihat lokasinya di peta.</p>
                <div class="social-icons">
                    <!-- Ganti URL berikut dengan akun resmi Anda -->
                    <a href="" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    <a href="" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                    <a href="" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                    <a href="" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                    <a href="" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/pages/kontak.blade.php ENDPATH**/ ?>