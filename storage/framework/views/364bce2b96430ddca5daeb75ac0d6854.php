<?php $__env->startSection('title'); ?>
    Dashboard <?php echo e($geositeTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* CSS Kustom untuk Dashboard Geosite - Style Icon Only */
    .dashboard-geosite {
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Header */
    .dashboard-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
        margin-bottom: 5px;
    }
    
    .dashboard-header p {
        color: #6c757d;
        border-left: 3px solid #D4AF37;
        padding-left: 15px;
        margin-bottom: 30px;
    }
    
    /* Grid Icon Cards */
    .icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }
    
    /* Icon Card */
    .icon-card {
        background: white;
        border-radius: 20px;
        padding: 25px 15px;
        text-align: center;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        cursor: pointer;
        text-decoration: none;
        display: block;
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }
    
    .icon-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.1);
        border-color: transparent;
    }
    
    /* Warna berbeda untuk setiap icon */
    .icon-card.umkm {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .icon-card.fasilitas {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .icon-card.penginapan {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    .icon-card.galeri {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    .icon-card.informasi {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    
    /* Icon besar */
    .icon-card i {
        font-size: 3.5rem;
        color: white;
        margin-bottom: 12px;
        display: inline-block;
        transition: transform 0.3s ease;
    }
    
    .icon-card:hover i {
        transform: scale(1.1);
    }
    
    /* Angka */
    .icon-card .count {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin: 10px 0 5px;
        line-height: 1;
    }
    
    /* Label */
    .icon-card .label {
        font-size: 0.7rem;
        font-weight: 500;
        color: rgba(255,255,255,0.9);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .icon-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .icon-card i {
            font-size: 2.5rem;
        }
        
        .icon-card .count {
            font-size: 1.5rem;
        }
        
        .dashboard-header h1 {
            font-size: 1.4rem;
        }
    }
    
    @media (max-width: 480px) {
        .icon-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid dashboard-geosite">
    <div class="dashboard-header">
        <h1><i class="fas fa-tower-cell" style="color: #D4AF37;"></i> Dashboard <?php echo e($geositeTitle); ?></h1>
        <p>Kelola konten untuk halaman <?php echo e($geositeTitle); ?></p>
    </div>
    
    <div class="icon-grid">
        <!-- UMKM -->
        <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/umkm')); ?>" class="icon-card umkm">
            <i class="fas fa-store"></i>
            <div class="count"><?php echo e($umkmCount ?? 0); ?></div>
            <div class="label">UMKM</div>
        </a>
        
        <!-- Fasilitas -->
        <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/fasilitas')); ?>" class="icon-card fasilitas">
            <i class="fas fa-concierge-bell"></i>
            <div class="count"><?php echo e($fasilitasCount ?? 0); ?></div>
            <div class="label">Fasilitas</div>
        </a>
        
        <!-- Penginapan -->
        <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/penginapan')); ?>" class="icon-card penginapan">
            <i class="fas fa-hotel"></i>
            <div class="count"><?php echo e($penginapanCount ?? 0); ?></div>
            <div class="label">Penginapan</div>
        </a>
        
        <!-- Galeri -->
        <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/galeri')); ?>" class="icon-card galeri">
            <i class="fas fa-images"></i>
            <div class="count"><?php echo e($galeriCount ?? 0); ?></div>
            <div class="label">Galeri</div>
        </a>
        
        <!-- Informasi -->
        <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/informasi')); ?>" class="icon-card informasi">
            <i class="fas fa-info-circle"></i>
            <div class="count"><?php echo e($informasiCount ?? 0); ?></div>
            <div class="label">Informasi</div>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/admin/tele/index.blade.php ENDPATH**/ ?>