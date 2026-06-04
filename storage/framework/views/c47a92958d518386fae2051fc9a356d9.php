<?php $__env->startSection('title', 'Kontak - Geosite Danau Toba'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* ============================================
       CSS LENGKAP (sama seperti jawaban sebelumnya)
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
        
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.03);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.06);
        --shadow-lg: 0 16px 36px rgba(0,0,0,0.1);
        --shadow-xl: 0 24px 48px rgba(0,0,0,0.12);
        --shadow-gold: 0 12px 28px rgba(198,164,59,0.2);
        
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-bounce: all 0.4s cubic-bezier(0.34, 1.2, 0.64, 1);
    }

    .kontak-hero {
        background: var(--gradient-hero);
        padding: 100px 0 70px;
        margin-top: 76px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .kontak-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff, var(--gold-light), #ffffff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: shimmer 3s linear infinite;
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }
    @keyframes shimmer {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .kontak-hero p {
        font-size: 0.9rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: white;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(12px);
        border-radius: 60px;
        padding: 8px 28px;
        display: inline-block;
        border: 1px solid rgba(255,215,0,0.4);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: var(--transition);
    }
    .kontak-hero p:hover {
        background: rgba(198,164,59,0.2);
        border-color: var(--gold);
        transform: scale(1.02);
    }
    @media (max-width: 768px) {
        .kontak-hero h1 { font-size: 2.2rem; }
        .kontak-hero { padding: 80px 0 50px; }
    }

    .kontak-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }
    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .kontak-grid {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        gap: 28px;
        overflow-x: auto !important;
        overflow-y: visible;
        padding-bottom: 20px;
        margin-bottom: 48px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }
    .kontak-grid::-webkit-scrollbar {
        height: 8px;
    }
    .kontak-grid::-webkit-scrollbar-track {
        background: #eef2f6;
        border-radius: 10px;
    }
    .kontak-grid::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary), var(--gold));
        border-radius: 10px;
    }

    .kontak-person-card {
        flex: 0 0 auto !important;
        width: 360px !important;
        background: var(--white);
        border-radius: 28px;
        padding: 28px;
        transition: var(--transition-bounce);
        border: 1px solid #eef2f6;
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        scroll-snap-align: start;
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
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(198,164,59,0.4);
    }
    .kontak-person-card h4 {
        font-size: 1.6rem;
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
        padding: 12px 14px;
        border-radius: 18px;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .kontak-person-card:hover .detail-group {
        background: #fef8e8;
        transform: translateY(-2px);
    }
    .detail-group strong {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    .detail-group strong i {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--gradient-gold);
        border-radius: 12px;
        font-size: 0.85rem;
        color: var(--primary-dark);
        transition: var(--transition);
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .detail-group:hover strong i {
        transform: scale(1.08);
        box-shadow: 0 0 12px rgba(198,164,59,0.5);
    }
    .detail-group p, .detail-group a {
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
        gap: 6px;
        font-weight: 500;
        transition: var(--transition);
    }
    .detail-group a:hover {
        color: var(--gold);
        transform: translateX(4px);
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
        box-shadow: var(--shadow-lg);
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
    .map-footer {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }
    .map-footer h4 {
        font-size: 1.1rem;
        margin: 0;
        color: var(--primary);
    }
    .social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
    }
    .social-icon {
        display: inline-flex;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: #f8fafc;
        color: var(--primary);
        border: 1px solid #e2e8f0;
    }
    .social-icons a {
        display: inline-flex;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: #f8fafc;
        color: var(--primary);
        border: 1px solid #e2e8f0;
        text-decoration: none;
        transition: var(--transition);
    }
    .social-icons a:hover {
        background: var(--gold);
        color: #fff;
        border-color: var(--gold);
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-gold);
    }

    .kontak-person-card {
        animation: fadeInUp 0.5s ease backwards;
    }
    .kontak-person-card:nth-child(1) { animation-delay: 0.05s; }
    .kontak-person-card:nth-child(2) { animation-delay: 0.1s; }
    .kontak-person-card:nth-child(3) { animation-delay: 0.15s; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 768px) {
        .kontak-section { padding: 40px 0 60px; }
        .kontak-person-card { width: 320px !important; padding: 20px; }
        .kontak-person-card h4 { font-size: 1.3rem; }
        .detail-group strong i { width: 24px; height: 24px; font-size: 0.75rem; }
    }
    @media (max-width: 480px) {
        .container { padding: 0 16px; }
        .kontak-person-card { width: 280px !important; padding: 18px; }
        .kontak-row { grid-template-columns: 1fr; }
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

        <div class="kontak-grid" data-aos="fade-up">
            <?php $__empty_1 = true; $__currentLoopData = $kontaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kontak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Fungsi membersihkan username: hapus @ di awal/akhir, hapus spasi, hapus garis miring
                    function bersihkan($str) {
                        if (empty($str)) return '';
                        $str = trim($str);
                        $str = ltrim($str, '@/ ');
                        $str = rtrim($str, '@/ ');
                        $str = preg_replace('/\s+/', '', $str);
                        return $str;
                    }

                    // Fungsi membuat URL sosial media
                    // $input: nilai dari database (bisa username atau URL)
                    // $domain: domain platform tanpa https://
                    // $useAt: apakah perlu menambahkan @ sebelum username (YouTube, TikTok)
                    function buatUrl($input, $domain, $useAt = false) {
                        $clean = bersihkan($input);
                        if (empty($clean)) return '';
                        // Jika sudah berupa URL lengkap
                        if (preg_match('/^https?:\/\//i', $clean)) {
                            return $clean;
                        }
                        // Jika menggunakan @ (YouTube/TikTok)
                        if ($useAt) {
                            // Pastikan tidak ada @ ganda
                            if (strpos($clean, '@') === 0) {
                                return "https://{$domain}/{$clean}";
                            }
                            return "https://{$domain}/@{$clean}";
                        }
                        // Platform lain (Facebook, Instagram, Twitter)
                        return "https://{$domain}/{$clean}";
                    }

                    $fbUrl = buatUrl($kontak->facebook, 'facebook.com');
                    $igUrl = buatUrl($kontak->instagram, 'instagram.com');
                    $twUrl = buatUrl($kontak->twitter, 'x.com'); // x.com lebih baru
                    $ytUrl = buatUrl($kontak->youtube, 'youtube.com', true);
                    $ttUrl = buatUrl($kontak->tiktok, 'tiktok.com', true);
                ?>
                
                <div class="kontak-person-card" data-map-src="<?php echo e($kontak->embed_maps); ?>" data-map-name="<?php echo e($kontak->judul); ?>">
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

                        
                        <?php if(!empty($fbUrl)): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fab fa-facebook-f"></i> Facebook</strong>
                                    <a href="<?php echo e($fbUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->facebook); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($igUrl)): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fab fa-instagram"></i> Instagram</strong>
                                    <a href="<?php echo e($igUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->instagram); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($twUrl)): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fab fa-twitter"></i> Twitter</strong>
                                    <a href="<?php echo e($twUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->twitter); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($ytUrl)): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fab fa-youtube"></i> YouTube</strong>
                                    <a href="<?php echo e($ytUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->youtube); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(!empty($ttUrl)): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fab fa-tiktok"></i> TikTok</strong>
                                    <a href="<?php echo e($ttUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->tiktok); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($kontak->telepon1 || $kontak->telepon2 || $kontak->telepon3): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-phone"></i> Telepon</strong>
                                    <?php $__currentLoopData = [$kontak->telepon1, $kontak->telepon2, $kontak->telepon3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tel): ?>
                                            <p><a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $tel)); ?>"><?php echo e($tel); ?></a></p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($kontak->email1 || $kontak->email2 || $kontak->email3): ?>
                            <div class="kontak-row">
                                <div class="detail-group">
                                    <strong><i class="fas fa-envelope"></i> Email</strong>
                                    <?php $__currentLoopData = [$kontak->email1, $kontak->email2, $kontak->email3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($email): ?>
                                            <p><a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-info">Belum ada data kontak.</div>
            <?php endif; ?>
        </div>

        <div class="kontak-map-card" data-aos="fade-up" data-aos-delay="100">
            <div class="map-wrapper">
                <iframe id="kontak-map-iframe" src="<?php echo e($initialSrc ?? ''); ?>" loading="lazy" allowfullscreen style="<?php echo e(empty($initialSrc) ? 'display:none;' : ''); ?>"></iframe>
                <div class="map-unavailable" id="map-unavailable" style="<?php echo e(empty($initialSrc) ? 'display:flex;' : 'display:none;'); ?>">
                    <i class="fas fa-map-marker-slash"></i>
                    <span>Lokasi tidak tersedia untuk kontak ini</span>
                </div>
            </div>
            <div class="map-footer">
                <h4>Lokasi: <span id="map-active-label"><?php echo e($initialName ?? 'Tidak tersedia'); ?></span></h4>
                <p>Klik kartu kontak di atas untuk melihat lokasinya di peta.</p>
                <div class="social-icons">
                    <?php if($socialFacebook ?? false): ?> <span class="social-icon"><i class="fab fa-facebook-f"></i></span> <?php endif; ?>
                    <?php if($socialInstagram ?? false): ?> <span class="social-icon"><i class="fab fa-instagram"></i></span> <?php endif; ?>
                    <?php if($socialTwitter ?? false): ?> <span class="social-icon"><i class="fab fa-twitter"></i></span> <?php endif; ?>
                    <?php if($socialYoutube ?? false): ?> <span class="social-icon"><i class="fab fa-youtube"></i></span> <?php endif; ?>
                    <?php if($socialTiktok ?? false): ?> <span class="social-icon"><i class="fab fa-tiktok"></i></span> <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const iframe = document.getElementById('kontak-map-iframe');
        const unavailable = document.getElementById('map-unavailable');
        const label = document.getElementById('map-active-label');
        document.querySelectorAll('.kontak-person-card').forEach(card => {
            card.addEventListener('click', function () {
                const src = this.dataset.mapSrc || '';
                const name = this.dataset.mapName || 'Tidak tersedia';
                if (src) {
                    iframe.src = src;
                    iframe.style.display = 'block';
                    unavailable.style.display = 'none';
                } else {
                    iframe.src = '';
                    iframe.style.display = 'none';
                    unavailable.style.display = 'flex';
                }
                label.textContent = name;
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/pages/kontak.blade.php ENDPATH**/ ?>