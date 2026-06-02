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
            background: linear-gradient(145deg, #0a0f1a 0%, #0f1625 50%, #0a0f1a 100%);
            color: #e2e8f0;
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
            background: linear-gradient(180deg, #0b1120 0%, #0a0f1a 100%);
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.5);
            border-right: 1px solid rgba(212, 175, 55, 0.15);
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.03);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #c6a43b;
            border-radius: 10px;
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        /* HEADER SIDEBAR - LOGO RAPI */
        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
            background: rgba(212, 175, 55, 0.02);
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
            background: linear-gradient(to bottom, transparent, rgba(212, 175, 55, 0.5), transparent);
        }

        .sidebar-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: -0.3px;
            margin: 8px 0 4px;
        }

        .sidebar-header h3 span {
            color: #c6a43b;
        }

        .sidebar-header p {
            font-size: 0.7rem;
            color: #94a3b8;
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
            color: #c6a43b;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            margin: 2px 12px;
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 10px;
        }

        .sidebar-menu a:hover {
            background: rgba(198, 164, 59, 0.1);
            color: #ffffff;
        }

        .sidebar-menu a.active {
            background: rgba(198, 164, 59, 0.15);
            color: #c6a43b;
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
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            padding: 8px 24px;
            border-radius: 60px;
            border: 1px solid rgba(212, 175, 55, 0.15);
        }

        .menu-toggle {
            display: none;
            background: transparent;
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            color: #c6a43b;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: rgba(198, 164, 59, 0.1);
        }

        .page-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #f1f5f9;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            font-size: 0.85rem;
            font-weight: 500;
            color: #cbd5e1;
        }

        .user-name i {
            color: #c6a43b;
            margin-right: 8px;
        }

        .logout-btn {
            background: rgba(220, 38, 38, 0.2);
            color: #f87171;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(220, 38, 38, 0.3);
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
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            padding: 20px 16px;
            border-radius: 20px;
            transition: all 0.2s ease;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(212, 175, 55, 0.3);
            background: rgba(15, 23, 42, 0.8);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fbbf24;
        }

        .stat-label {
            font-size: 0.7rem;
            color: #94a3b8;
            margin-top: 6px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========== TABLE CARD ========== */
        .card-table {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid rgba(212, 175, 55, 0.1);
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
            color: #fbbf24;
            padding-left: 12px;
            border-left: 3px solid #c6a43b;
        }

        /* ========== BUTTONS ========== */
        .btn-primary {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: #c6a43b;
            padding: 8px 20px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            cursor: pointer;
        }

        .btn-primary:hover {
            background: rgba(198, 164, 59, 0.15);
            color: #fbbf24;
            border-color: rgba(212, 175, 55, 0.5);
        }

        .btn-submit {
            background: linear-gradient(135deg, #c6a43b, #b8860b);
            color: #0f172a;
            padding: 10px 28px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(198, 164, 59, 0.3);
        }

        .btn-cancel {
            background: rgba(100, 116, 139, 0.2);
            color: #94a3b8;
            padding: 10px 28px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid rgba(100, 116, 139, 0.3);
        }

        .btn-cancel:hover {
            background: rgba(100, 116, 139, 0.3);
            color: #cbd5e1;
        }

        /* ========== FORM STYLES ========== */
        .form-page {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(212, 175, 55, 0.15);
        }

        .form-card h2 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #fbbf24;
            margin-bottom: 8px;
        }

        .form-card p {
            color: #94a3b8;
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
            color: #cbd5e1;
            margin-bottom: 6px;
        }

        .form-group .required {
            color: #f87171;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            background: rgba(0, 0, 0, 0.3);
            color: #e2e8f0;
        }

        .form-control:focus {
            outline: none;
            border-color: #c6a43b;
            box-shadow: 0 0 0 3px rgba(198, 164, 59, 0.1);
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
            border-top: 1px solid rgba(212, 175, 55, 0.1);
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
            color: #c6a43b;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        td {
            padding: 12px 12px;
            font-size: 0.85rem;
            color: #cbd5e1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }

        tr:hover td {
            background: rgba(198, 164, 59, 0.05);
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
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(74, 222, 128, 0.3);
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(248, 113, 113, 0.3);
        }

        .btn-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            background: #3b82f6;
            color: white;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 500;
            border: 1px solid rgba(239, 68, 68, 0.3);
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
            background: rgba(15, 23, 42, 0.8);
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .pagination .page-link:hover {
            background: rgba(198, 164, 59, 0.2);
            color: #fbbf24;
            border-color: rgba(212, 175, 55, 0.5);
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
    @stack('styles')
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <div class="logo-item">
                <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Bank Indonesia">
            </div>
            <div class="logo-divider"></div>
            <div class="logo-item">
                <img src="{{ asset('image/logo/del.jpg') }}" alt="Institut Teknologi Del">
            </div>
        </div>
        <h3>GEO<span>TOBA</span></h3>
        <p>Administrator Panel</p>
    </div>
    <div class="sidebar-menu">
        <div class="menu-title">Main Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>
        
        <div class="menu-title">Content</div>
        <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
            <i class="fas fa-images"></i> Gallery
        </a>
        <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> News
        </a>
        <a href="{{ route('admin.informasi.index') }}" class="{{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i> Information
        </a>
        <a href="{{ route('admin.destinasi.index') }}" class="{{ request()->routeIs('admin.destinasi.*') ? 'active' : '' }}">
            <i class="fas fa-map-marked-alt"></i> Destinations
        </a>
        <a href="{{ route('admin.warisan.index') }}" class="{{ request()->routeIs('admin.warisan.*') ? 'active' : '' }}">
            <i class="fas fa-landmark"></i> Heritage
        </a>
        <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
            <i class="fas fa-address-book"></i> Contacts
        </a>

        @php
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
        @endphp

        <div class="menu-title">Geosites</div>
        @foreach($validGeosites as $geoSlug => $geoLabel)
            <a href="{{ url('/admin/geosite/'.$geoSlug) }}" class="{{ request()->is('admin/geosite/'.$geoSlug) ? 'active' : '' }}">
                <i class="fas fa-mountain"></i> {{ $geoLabel }}
            </a>
        @endforeach

        <div class="menu-title">{{ $currentGeositeTitle }} Modules</div>
        <a href="{{ url('/admin/geosite/'.$currentGeosite.'/umkm') }}" class="{{ request()->is('admin/geosite/'.$currentGeosite.'/umkm*') ? 'active' : '' }}">
            <i class="fas fa-store"></i> UMKM
        </a>
        <a href="{{ url('/admin/geosite/'.$currentGeosite.'/fasilitas') }}" class="{{ request()->is('admin/geosite/'.$currentGeosite.'/fasilitas*') ? 'active' : '' }}">
            <i class="fas fa-tools"></i> Fasilitas
        </a>
        <a href="{{ url('/admin/geosite/'.$currentGeosite.'/penginapan') }}" class="{{ request()->is('admin/geosite/'.$currentGeosite.'/penginapan*') ? 'active' : '' }}">
            <i class="fas fa-hotel"></i> Penginapan
        </a>
        <a href="{{ url('/admin/geosite/'.$currentGeosite.'/galeri') }}" class="{{ request()->is('admin/geosite/'.$currentGeosite.'/galeri*') ? 'active' : '' }}">
            <i class="fas fa-images"></i> Galeri
        </a>
        <a href="{{ url('/admin/geosite/'.$currentGeosite.'/informasi') }}" class="{{ request()->is('admin/geosite/'.$currentGeosite.'/informasi*') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i> Informasi
        </a>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content" id="mainContent">
    <div class="top-bar">
        <div style="display: flex; align-items: center; gap: 16px;">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="page-title">@yield('title', 'Dashboard')</div>
        </div>
        <div class="user-menu">
            <span class="user-name"><i class="fas fa-user-circle"></i> {{ Auth::user()->name ?? 'Admin' }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    @yield('content')
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
@stack('scripts')
</body>
</html>