<?php $__env->startSection('title', 'Manajemen Kontak'); ?>

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

    /* Keselarasan Ukuran Judul: 2.75rem */
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

    /* Kunci Flexbox: Menjaga deretan tombol aksi tetap menyamping */
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
        <h1 class="page-header-title">Data Kontak</h1>
    </div>
    <a href="<?php echo e(route('admin.kontak.create')); ?>" class="btn-bi-tambah">
        <i class="fas fa-plus"></i>
        Tambah Kontak
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
                    <th width="28%">JUDUL / EMAIL</th>
                    <th width="32%">ALAMAT</th>
                    <th width="15%">TELEPON</th>
                    <th width="10%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $kontak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    
                    
                    <td>
                        <div style="font-weight: 700; color: var(--text-heading); font-size: 1rem;">
                            <?php echo e($item->judul); ?>

                        </div>
                        <small class="text-secondary" style="font-weight: 500;">
                            <?php echo e($item->email1 ?? '-'); ?>

                        </small>
                    </td>

                    
                    <td>
                        <div title="<?php echo e($item->alamat); ?>" style="color: var(--text-heading); font-weight: 500;">
                            <?php echo e(\Illuminate\Support\Str::limit($item->alamat, 60)); ?>

                        </div>
                    </td>

                    
                    <td>
                        <span class="badge-chip" style="font-weight: 700;">
                            <?php echo e($item->telepon1 ?? '-'); ?>

                        </span>
                    </td>

                    
                    <td style="white-space: nowrap; width: 1%;">
                        <div class="actions-group">
                            
                            <a href="<?php echo e(route('admin.kontak.edit', $item->id)); ?>" class="action-btn btn-edit" title="Edit kontak ini">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            
                            <form action="<?php echo e(route('admin.kontak.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?');" style="display:inline-block; margin: 0; padding: 0;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="action-btn btn-delete" title="Hapus kontak ini">
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
                        Data masih kosong. <a href="<?php echo e(route('admin.kontak.create')); ?>" class="text-decoration-none" style="color: var(--bi-blue);">Tambah sekarang</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="d-flex justify-content-end mt-4">
        <?php echo e($kontak->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/admin/kontak/index.blade.php ENDPATH**/ ?>