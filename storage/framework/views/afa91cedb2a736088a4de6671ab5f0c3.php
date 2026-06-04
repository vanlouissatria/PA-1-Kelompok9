<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Admin - GeoToba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f7fc;
            color: #1e293b;
            min-height: 100vh;
            line-height: 1.5;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100%;
            background: #ffffff;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.05);
            border-right: 1px solid #e9eef3;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        /* HEADER SIDEBAR - LOGO RAPI */
        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid #eef2f6;
            background: #ffffff;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .logo-item {
            display: flex;
            align-items: center;
        }

        .logo-item img {
            height: 38px;
            width: auto;
            object-fit: contain;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .logo-divider {
            width: 1px;
            height: 30px;
            background: linear-gradient(to bottom, transparent, #cbd5e1, transparent);
        }

        .sidebar-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: -0.3px;
            margin: 8px 0 4px;
            color: #0f3b2c;
        }

        .sidebar-header h3 span {
            color: #b78d2e;
        }

        .sidebar-header p {
            font-size: 0.7rem;
            color: #5b6e8c;
            font-weight: 400;
        }

        /* MENU SIDEBAR */
        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu .menu-title {
            padding: 12px 20px 6px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b78d2e;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            margin: 2px 12px;
            color: #334155;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 10px;
        }

        .sidebar-menu a:hover {
            background: #f1f5f9;
            color: #0f3b2c;
        }

        .sidebar-menu a.active {
            background: #eef2ff;
            color: #b78d2e;
        }

        .sidebar-menu a i {
            width: 22px;
            font-size: 1rem;
            text-align: center;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: 280px;
            padding: 24px 32px;
            min-height: 100vh;
            transition: margin-left 0.4s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* ========== TOP BAR ========== */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            padding: 8px 24px;
            border-radius: 60px;
            border: 1px solid #eef2f6;
        }

        .menu-toggle {
            display: none;
            background: transparent;
            border: 1px solid #e2e8f0;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            color: #b78d2e;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: #f8fafc;
        }

        .page-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #0f3b2c;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            font-size: 0.85rem;
            font-weight: 500;
            color: #475569;
        }

        .user-name i {
            color: #b78d2e;
            margin-right: 8px;
        }

        .logout-btn {
            background: #fee2e2;
            color: #b91c1c;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid #fecaca;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: white;
            border-color: transparent;
        }

        /* ========== STATISTICS CARDS ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            padding: 20px 16px;
            border-radius: 20px;
            transition: all 0.2s ease;
            border: 1px solid #edf2f7;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: #e2e8f0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #b78d2e;
        }

        .stat-label {
            font-size: 0.7rem;
            color: #5b6e8c;
            margin-top: 6px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========== TABLE CARD ========== */
        .card-table {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid #edf2f7;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .card-header h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #b78d2e;
            padding-left: 12px;
            border-left: 3px solid #b78d2e;
        }

        /* ========== BUTTONS ========== */
        .btn-primary {
            background: #ffffff;
            color: #b78d2e;
            padding: 8px 20px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #e2e8f0;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #fefce8;
            color: #a16207;
            border-color: #fde047;
        }

        .btn-submit {
            background: #b78d2e;
            color: #ffffff;
            padding: 10px 28px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background: #9a6e25;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(183, 141, 46, 0.2);
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            padding: 10px 28px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .btn-cancel:hover {
            background: #e6edf5;
            color: #1e293b;
        }

        /* ========== FORM STYLES ========== */
        .form-page {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 32px;
            border: 1px solid #edf2f7;
            box-shadow: 0 8px 20px rgba(0,0,0,0.02);
        }

        .form-card h2 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #b78d2e;
            margin-bottom: 8px;
        }

        .form-card p {
            color: #5b6e8c;
            font-size: 0.85rem;
            margin-bottom: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-group .required {
            color: #b91c1c;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            background: #ffffff;
            color: #1e293b;
        }

        .form-control:focus {
            outline: none;
            border-color: #b78d2e;
            box-shadow: 0 0 0 3px rgba(183, 141, 46, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #edf2f7;
        }

        /* ========== TABLE STYLES ========== */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 12px 12px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #b78d2e;
            background: #fafcff;
            border-bottom: 1px solid #eef2f8;
        }

        td {
            padding: 12px 12px;
            font-size: 0.85rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        tr:hover td {
            background: #fefce8;
        }

        /* ========== BADGES ========== */
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 500;
            display: inline-block;
        }

        .badge-success {
            background: #e6f7ec;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .badge-danger {
            background: #feeceb;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .btn-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: #eef2ff;
            color: #2563eb;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid #cbdffc;
        }

        .btn-edit:hover {
            background: #2563eb;
            color: white;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 500;
            border: 1px solid #fecaca;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
        }

        /* ========== IMAGE PREVIEW ========== */
        .img-preview {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* ========== PAGINATION ========== */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 8px;
            border-radius: 10px;
            background: #ffffff;
            color: #334155;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .pagination .page-link:hover {
            background: #fefce8;
            color: #b78d2e;
            border-color: #fde047;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 16px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .form-card {
                padding: 20px;
            }
            
            .page-title {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .top-bar {
                flex-direction: column;
                align-items: stretch;
                border-radius: 20px;
            }
            
            .user-menu {
                justify-content: space-between;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .main-content > * {
            animation: fadeIn 0.4s ease-out backwards;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <div class="logo-item">
                <img src="<?php echo e(asset('image/logo/logobankindonesia.jpg')); ?>" alt="Bank Indonesia">
            </div>
            <div class="logo-divider"></div>
            <div class="logo-item">
                <img src="<?php echo e(asset('image/logo/del.jpg')); ?>" alt="Institut Teknologi Del">
            </div>
        </div>
        <h3>GEO<span>TOBA</span></h3>
        <p>Panel Administrator</p>
    </div>
    <div class="sidebar-menu">
        <div class="menu-title">Menu Utama</div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>
        
        <?php if(Auth::user()->isSuperAdmin()): ?>
        <div class="menu-title">Manajemen</div>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="<?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
            <i class="fas fa-users-gear"></i> Kelola Admin
        </a>
        <?php endif; ?>

        <div class="menu-title">Konten</div>
        <a href="<?php echo e(route('admin.galeri.index')); ?>" class="<?php echo e(request()->routeIs('admin.galeri.*') ? 'active' : ''); ?>">
            <i class="fas fa-images"></i> Galeri
        </a>
        <a href="<?php echo e(route('admin.berita.index')); ?>" class="<?php echo e(request()->routeIs('admin.berita.*') ? 'active' : ''); ?>">
            <i class="fas fa-newspaper"></i> Berita
        </a>
        <a href="<?php echo e(route('admin.informasi.index')); ?>" class="<?php echo e(request()->routeIs('admin.informasi.*') ? 'active' : ''); ?>">
            <i class="fas fa-info-circle"></i> Informasi
        </a>
        <a href="<?php echo e(route('admin.destinasi.index')); ?>" class="<?php echo e(request()->routeIs('admin.destinasi.*') ? 'active' : ''); ?>">
            <i class="fas fa-map-marked-alt"></i> Destinasi
        </a>
        <a href="<?php echo e(route('admin.warisan.index')); ?>" class="<?php echo e(request()->routeIs('admin.warisan.*') ? 'active' : ''); ?>">
            <i class="fas fa-landmark"></i> Warisan Alam & Budaya
        </a>
        <a href="<?php echo e(route('admin.kontak.index')); ?>" class="<?php echo e(request()->routeIs('admin.kontak.*') ? 'active' : ''); ?>">
            <i class="fas fa-address-book"></i> Kontak
        </a>

        <?php
            $validGeosites = [
                'tele' => 'Tele',
                'efrata' => 'Efrata',
                'sihotang' => 'Sihotang',
                'sibea-bea' => 'Sibea Bea',
                'holbung' => 'Holbung',
            ];
            $currentGeosite = request()->segment(3) ?? 'tele';
            $currentGeosite = array_key_exists($currentGeosite, $validGeosites) ? $currentGeosite : 'tele';
            $currentGeositeTitle = $validGeosites[$currentGeosite];
        ?>

        <div class="menu-title">Situs Geosite</div>
        <?php $__currentLoopData = $validGeosites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $geoSlug => $geoLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('/admin/geosite/'.$geoSlug)); ?>" class="<?php echo e(request()->is('admin/geosite/'.$geoSlug) ? 'active' : ''); ?>">
                <i class="fas fa-mountain"></i> <?php echo e($geoLabel); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content" id="mainContent">
    <div class="top-bar">
        <div style="display: flex; align-items: center; gap: 16px;">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="page-title"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></div>
        </div>
        <div class="user-menu">
            <span class="user-name">
                <i class="fas fa-user-circle"></i>
                <?php echo e(Auth::user()->name ?? 'Admin'); ?>

                <?php if(Auth::user()->isSuperAdmin()): ?>
                    <span style="font-size:0.65rem;background:#fef3c7;color:#92400e;padding:1px 8px;border-radius:99px;margin-left:4px;font-weight:700;vertical-align:middle;">SUPER</span>
                <?php endif; ?>
            </span>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>
</div>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
        });
    }

    document.addEventListener('click', function(event) {
        const isMobile = window.innerWidth <= 768;
        if (isMobile && sidebar && !sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('open');
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/layouts/admin.blade.php ENDPATH**/ ?>