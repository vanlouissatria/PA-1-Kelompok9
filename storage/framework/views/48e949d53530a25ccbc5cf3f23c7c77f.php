<?php $__env->startSection('title', 'Galeri - GeoToba'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* HERO SECTION */
    .gallery-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .gallery-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .gallery-hero .container {
        position: relative;
        z-index: 2;
    }

    .gallery-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .gallery-hero p {
        color: rgba(255,255,255,0.8);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.85rem;
    }

    /* GALLERY SECTION */
    .gallery-section {
        padding: 70px 0 100px;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2f8 100%);
        min-height: 100vh;
    }

    .gallery-container {
        max-width: 1400px;
        margin: auto;
        padding: 0 24px;
    }

    /* STACK CONTAINER */
    .stack-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0;
        padding: 30px 0;
    }

    /* CARD */
    .slip-card {
        position: relative;
        width: 280px;
        background: white;
        border-radius: 18px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        margin-left: -60px;
        text-decoration: none;
        color: inherit;
    }

    .slip-card:first-child {
        margin-left: 0;
    }

    .slip-card:hover {
        transform: translateY(-15px) scale(1.02);
        z-index: 10;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .slip-card:hover ~ .slip-card {
        transform: translateX(20px);
    }

    /* IMAGE */
    .slip-image {
        position: relative;
        width: 100%;
        height: 320px;
        overflow: hidden;
        background: #ddd;
    }

    .slip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .slip-card:hover .slip-image img {
        transform: scale(1.06);
    }

    /* OVERLAY */
    .slip-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.75),
            rgba(0,0,0,0.1)
        );
        display: flex;
        align-items: flex-end;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .slip-card:hover .slip-overlay {
        opacity: 1;
    }

    .slip-overlay-content {
        color: white;
    }

    .slip-category {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .slip-overlay-title {
        font-size: 0.9rem;
        font-weight: 600;
        line-height: 1.4;
    }

    /* CARD INFO */
    .slip-info {
        padding: 18px;
        position: relative;
    }

    .slip-line {
        position: absolute;
        top: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background: linear-gradient(
            90deg,
            #c6a43b,
            #e8c45a,
            #c6a43b
        );
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .slip-card:hover .slip-line {
        transform: scaleX(1);
    }

    .slip-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .slip-location {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 0.8rem;
    }

    .slip-location i {
        color: #c6a43b;
    }

    /* EMPTY STATE */
    .empty-gallery {
        text-align: center;
        background: white;
        padding: 80px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .empty-gallery i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-gallery h5 {
        color: #1e293b;
        margin-bottom: 10px;
    }

    .empty-gallery p {
        color: #64748b;
    }

    /* PAGINATION */
    .pagination-wrapper {
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {

        .stack-container {
            gap: 20px;
        }

        .slip-card {
            margin-left: 0;
            width: 260px;
        }

        .slip-card:hover ~ .slip-card {
            transform: none;
        }
    }

    @media (max-width: 768px) {

        .gallery-hero h1 {
            font-size: 2.2rem;
        }

        .slip-card {
            width: calc(50% - 10px);
        }

        .slip-image {
            height: 260px;
        }
    }

    @media (max-width: 560px) {

        .slip-card {
            width: 100%;
        }

        .slip-image {
            height: 280px;
        }
    }
</style>

<!-- HERO -->
<section class="gallery-hero">
    <div class="container">
        <h1>Galeri Foto</h1>
        <p>Dokumentasi Keindahan Geopark Danau Toba</p>
    </div>
</section>

<!-- GALLERY -->
<section class="gallery-section">
    <div class="gallery-container">

        <div class="stack-container">

            <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <?php
                    $imgSrc = '';

                    if ($item->gambar) {

                        if (file_exists(public_path($item->gambar))) {
                            $imgSrc = image_url($item->gambar);

                        } elseif (file_exists(public_path('storage/' . $item->gambar))) {
                            $imgSrc = image_url($item->gambar);

                        } else {
                            $imgSrc = asset('image/default.jpg');
                        }

                    } else {
                        $imgSrc = asset('image/default.jpg');
                    }
                ?>

                <a href="<?php echo e(url('/galeri/' . $item->slug)); ?>"
                   class="slip-card">

                    <div class="slip-image">

                        <img src="<?php echo e($imgSrc); ?>"
                             alt="<?php echo e($item->judul); ?>">

                        <div class="slip-overlay">
                            <div class="slip-overlay-content">

                                <span class="slip-category">
                                    Galeri
                                </span>

                                <div class="slip-overlay-title">
                                    <?php echo e(Str::limit($item->judul, 40)); ?>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="slip-info">

                        <div class="slip-line"></div>

                        <h5 class="slip-title">
                            <?php echo e(Str::limit($item->judul, 50)); ?>

                        </h5>

                        <div class="slip-location">
                            <i class="fas fa-eye"></i>
                            <?php echo e($item->views ?? 0); ?> views
                        </div>

                    </div>

                </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-12">
                    <div class="empty-gallery">

                        <i class="fas fa-images"></i>

                        <h5>Belum ada foto galeri</h5>

                        <p>
                            Silakan cek kembali nanti
                        </p>

                    </div>
                </div>

            <?php endif; ?>

        </div>

        <?php if($galeri->hasPages()): ?>

            <div class="pagination-wrapper">
                <?php echo e($galeri->links()); ?>

            </div>

        <?php endif; ?>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/pages/galeri.blade.php ENDPATH**/ ?>