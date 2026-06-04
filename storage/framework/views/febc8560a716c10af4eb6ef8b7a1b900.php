<?php $__env->startSection('title', 'Manajemen Destinasi'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-blue-dark: #001f3f;
        --bi-yellow: #f59e0b;
        --bi-red: #ef4444;
        --text-heading: #111827;
        --text-muted: #6b7280;
        --surface-bg: #ffffff;
        --border-light: #e5e7eb;
    }

    /* Ukuran Judul disamakan: 2.75rem */
    .page-header-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: var(--text-heading);
        margin-bottom: 1rem;
        margin-top: 0;
    }

    .page-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.75rem;
        flex-wrap: wrap;
    }

    .btn-bi-tambah {
        background-color: var(--bi-blue) !important;
        color: white !important;
        border: none !important;
        padding: 0.95rem 1.4rem;
        border-radius: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none !important;
        box-shadow: 0 16px 32px rgba(0, 47, 95, 0.12);
        transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .btn-bi-tambah:hover {
        background-color: var(--bi-blue-dark) !important;
        transform: translateY(-1px);
    }

    /* Transparan tanpa background card putih bawaan bootstrap */
    .admin-card {
        background: transparent;
        border: none;
        box-shadow: none;
        padding: 0;
    }

    .table thead th {
        color: var(--text-muted);
        font-size: 0.78rem;
        font-weight: 700;
        border-top: none;
        border-bottom: 1px solid rgba(229, 231, 235, 0.9);
        text-transform: uppercase;
        padding: 1rem 0.75rem;
        background: transparent;
    }

    .table td {
        vertical-align: middle;
        padding: 1rem 0.75rem;
        border-color: rgba(229, 231, 235, 0.9);
    }

    .table tbody tr:hover {
        background: rgba(229, 231, 235, 0.3);
    }

    .thumbnail {
        width: 90px;
        height: 70px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
    }

    .placeholder-img {
        width: 90px;
        height: 70px;
        border-radius: 16px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 0.9rem;
    }

    .badge-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
        background: #f3f4f6;
        color: var(--text-heading);
        font-size: 0.82rem;
        font-weight: 600;
        border: 1px solid #e5e7eb;
    }

    /* Kunci Flexbox: Memaksa deretan tombol menyamping horizontal */
    .actions-group {
        display: flex !important;
        flex-direction: row !important;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: nowrap !important;
    }

    /* Ukuran Tombol Aksi Kotak Presisi 40px x 40px */
    .action-btn {
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        min-height: 40px !important;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, opacity 0.2s ease;
        text-decoration: none;
        font-size: 0.85rem;
        margin: 0 !important;
        padding: 0 !important;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        opacity: 0.95;
    }

    .btn-edit {
        background: #f59e0b;
        color: #000;
    }

    .btn-delete {
        background: #ef4444;
    }

    .text-secondary {
        color: var(--text-muted);
    }
</style>


<div class="page-actions">
    <div>
        <h1 class="page-header-title">Manajemen Destinasi</h1>
    </div>
    <a href="<?php echo e(route('admin.destinasi.create')); ?>" class="btn-bi-tambah">
        <i class="fas fa-plus"></i>
        Tambah Destinasi
    </a>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success border-0 shadow-sm mb-4">
        <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<div class="admin-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="12%">GAMBAR</th>
                    <th width="35%">NAMA DESTINASI</th>
                    <th width="18%">KATEGORI</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $destinasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    
                    
                    <td>
                        <?php if($item->gambar): ?>
                            <?php
                                $gambarPath = $item->gambar;
                                if (!\Illuminate\Support\Str::startsWith($gambarPath, ['http://', 'https://', 'data:'])) {
                                    $gambarPath = image_url($gambarPath);
                                }
                            ?>
                            <img src="<?php echo e($gambarPath); ?>" alt="Gambar Destinasi" class="thumbnail">
                        <?php else: ?>
                            <div class="placeholder-img">
                                <i class="fas fa-image"></i>
                            </div>
                        <?php endif; ?>
                    </td>

                    
                    <td>
                        <div style="font-weight: 700; color: var(--text-heading); font-size: 1rem;">
                            <?php echo e($item->nama_destinasi); ?>

                        </div>
                    </td>

                    
                    <td>
                        <span class="badge-chip">
                            <?php echo e(ucfirst($item->kategori)); ?>

                        </span>
                    </td>

                    
                    <td style="white-space: nowrap; width: 1%;">
                        <div class="actions-group">                 
                            
                            <a href="<?php echo e(route('admin.destinasi.edit', $item->id)); ?>" class="action-btn btn-edit" title="Edit destinasi">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            
                            <form action="<?php echo e(route('admin.destinasi.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?');" style="display:inline-block; margin: 0; padding: 0;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="action-btn btn-delete" title="Hapus destinasi">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5 text-secondary">
                        <i class="fas fa-database fa-2x mb-3 d-block" style="color: var(--text-muted); opacity: 0.5;"></i>
                        Data destinasi masih kosong. <a href="<?php echo e(route('admin.destinasi.create')); ?>" class="text-decoration-none" style="color: var(--bi-blue);">Tambah sekarang</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="d-flex justify-content-end mt-4">
        <?php echo e($destinasi->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/admin/destinasi/index.blade.php ENDPATH**/ ?>