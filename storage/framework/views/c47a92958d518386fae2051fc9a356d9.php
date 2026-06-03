

<?php $__env->startSection('title', 'Kontak - Geosite Danau Toba'); ?>

<?php $__env->startSection('content'); ?>
<style>
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
        --gradient-hero: linear-gradient(135deg, #003366 0%, #1a4a7a 40%, #002244 100%);
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
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 28px;
    }

    @media (max-width: 768px) {
        .kontak-grid { grid-template-columns: 1fr; gap: 24px; }
    }

    .kontak-person-card {
        background: var(--white);
        border-radius: 24px;
        padding: 24px;
        transition: var(--transition-bounce);
        border: 1px solid #eef2f6;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .kontak-person-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.12);
        border-color: rgba(198,164,59,0.3);
    }

    .kontak-person-card h4 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 6px;
    }

    .kontak-person-card .card-subtitle {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #eef2f6;
    }

    .kontak-details {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .kontak-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 14px;
    }

    .detail-group {
        background: #fafbfc;
        padding: 14px 16px;
        border-radius: 16px;
    }

    .detail-group strong {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .detail-group p,
    .detail-group a {
        margin: 0;
        font-size: 0.9rem;
        color: #475569;
        line-height: 1.6;
        word-break: break-word;
    }

    .detail-group a {
        color: var(--primary);
        text-decoration: none;
    }

    .shortcut-row {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }

    .shortcut-label {
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .shortcut-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .shortcut-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border-radius: 14px;
        border: 1px solid rgba(15, 23, 42, 0.08);
        background: #fff;
        color: var(--primary);
        text-decoration: none;
        font-size: 0.82rem;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .shortcut-btn i {
        font-size: 0.95rem;
    }

    .shortcut-btn:hover {
        background: var(--gold);
        color: #fff;
        border-color: var(--gold);
        transform: translateY(-2px);
    }

    .shortcut-btn.facebook { border-color: #1877f2; }
    .shortcut-btn.twitter { border-color: #1da1f2; }
    .shortcut-btn.youtube { border-color: #ff0000; }
    .shortcut-btn.instagram { border-color: #c32aa3; }
    .shortcut-btn.tiktok { border-color: #000; }

    @media (max-width: 768px) {
        .kontak-person-card { padding: 20px; }
        .kontak-row { grid-template-columns: 1fr; }
    }
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
                    $fbUrl = $kontak->facebook ? (!preg_match('/^https?:\/\//i', $kontak->facebook) ? 'https://facebook.com/'.trim($kontak->facebook) : $kontak->facebook) : '';
                    $igUrl = $kontak->instagram ? (!preg_match('/^https?:\/\//i', $kontak->instagram) ? 'https://instagram.com/'.ltrim(trim($kontak->instagram), '@') : $kontak->instagram) : '';
                    $twUrl = $kontak->twitter ? (!preg_match('/^https?:\/\//i', $kontak->twitter) ? 'https://x.com/'.ltrim(trim($kontak->twitter), '@') : $kontak->twitter) : '';
                    $ytUrl = $kontak->youtube ? (!preg_match('/^https?:\/\//i', $kontak->youtube) ? 'https://youtube.com/'.trim($kontak->youtube) : $kontak->youtube) : '';
                    $ttUrl = $kontak->tiktok ? (!preg_match('/^https?:\/\//i', $kontak->tiktok) ? 'https://tiktok.com/@'.ltrim(trim($kontak->tiktok), '@') : $kontak->tiktok) : '';
                ?>

                <div class="kontak-person-card">
                    <div>
                        <h4><?php echo e($kontak->judul); ?></h4>
                        <?php if($kontak->subjudul): ?>
                            <p class="card-subtitle"><?php echo e($kontak->subjudul); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="kontak-details">
                        <?php if($kontak->alamat || $kontak->kode_pos): ?>
                            <div class="kontak-row">
                                <?php if($kontak->alamat): ?>
                                    <div class="detail-group">
                                        <strong><i class="fas fa-map-marker-alt"></i> Alamat</strong>
                                        <p><?php echo nl2br(e($kontak->alamat)); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if($kontak->kode_pos): ?>
                                    <div class="detail-group">
                                        <strong><i class="fas fa-mail-bulk"></i> Kode Pos</strong>
                                        <p><?php echo e($kontak->kode_pos); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($kontak->facebook || $kontak->instagram || $kontak->twitter): ?>
                            <div class="kontak-row">
                                <?php if($kontak->facebook): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-facebook-f"></i> Facebook</strong>
                                        <a href="<?php echo e($fbUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->facebook); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if($kontak->instagram): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-instagram"></i> Instagram</strong>
                                        <a href="<?php echo e($igUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->instagram); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if($kontak->twitter): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-twitter"></i> Twitter</strong>
                                        <a href="<?php echo e($twUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->twitter); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($kontak->youtube || $kontak->tiktok): ?>
                            <div class="kontak-row">
                                <?php if($kontak->youtube): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-youtube"></i> YouTube</strong>
                                        <a href="<?php echo e($ytUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->youtube); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if($kontak->tiktok): ?>
                                    <div class="detail-group">
                                        <strong><i class="fab fa-tiktok"></i> TikTok</strong>
                                        <a href="<?php echo e($ttUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($kontak->tiktok); ?></a>
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

                        <?php if($fbUrl || $igUrl || $twUrl || $ytUrl || $ttUrl): ?>
                            <div class="shortcut-row">
                                <span class="shortcut-label">✨ Media Sosial</span>
                                <div class="shortcut-buttons">
                                    <?php if($fbUrl): ?>
                                        <a href="<?php echo e($fbUrl); ?>" target="_blank" rel="noopener noreferrer" class="shortcut-btn facebook">
                                            <i class="fab fa-facebook-f"></i> Facebook
                                        </a>
                                    <?php endif; ?>
                                    <?php if($igUrl): ?>
                                        <a href="<?php echo e($igUrl); ?>" target="_blank" rel="noopener noreferrer" class="shortcut-btn instagram">
                                            <i class="fab fa-instagram"></i> Instagram
                                        </a>
                                    <?php endif; ?>
                                    <?php if($twUrl): ?>
                                        <a href="<?php echo e($twUrl); ?>" target="_blank" rel="noopener noreferrer" class="shortcut-btn twitter">
                                            <i class="fab fa-twitter"></i> Twitter
                                        </a>
                                    <?php endif; ?>
                                    <?php if($ytUrl): ?>
                                        <a href="<?php echo e($ytUrl); ?>" target="_blank" rel="noopener noreferrer" class="shortcut-btn youtube">
                                            <i class="fab fa-youtube"></i> YouTube
                                        </a>
                                    <?php endif; ?>
                                    <?php if($ttUrl): ?>
                                        <a href="<?php echo e($ttUrl); ?>" target="_blank" rel="noopener noreferrer" class="shortcut-btn tiktok">
                                            <i class="fab fa-tiktok"></i> TikTok
                                        </a>
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
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/pages/kontak.blade.php ENDPATH**/ ?>