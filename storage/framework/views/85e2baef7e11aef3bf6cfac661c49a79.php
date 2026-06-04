<?php $__env->startSection('title', 'Tambah Warisan Alam dan Budaya'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
    }

    .page-header-title {
        font-size: 2rem;
        font-weight: 800;
        color: #000;
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .card-header {
        background: linear-gradient(135deg, var(--bi-blue) 0%, #003f77 100%);
        color: white;
        border-radius: 16px 16px 0 0;
        padding: 1rem 1.5rem;
        border-bottom: 3px solid var(--bi-gold);
    }

    .card-header h5 {
        margin-bottom: 0;
        font-weight: 700;
    }

    .card-body {
        padding: 1.8rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control,
    .form-select,
    .form-control-file {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        padding: 0.85rem 1rem;
        transition: all 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.2);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.85rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
    }

    .btn-outline-bi {
        background: white;
        border: 1px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.85rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }

    .text-muted {
        color: #6c757d !important;
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid">
    <h1 class="page-header-title">Tambah Warisan Alam dan Budaya</h1>

    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-landmark me-2"></i> Form Tambah Warisan</h5>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.warisan.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Judul</label>
                        <input type="text" name="judul" value="<?php echo e(old('judul')); ?>"
                               class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               required>
                        <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Jenis</label>
                        <select name="jenis" class="form-select <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="geodiversity" <?php echo e(old('jenis')=='geodiversity' ? 'selected' : ''); ?>>🪨 Geodiversity</option>
                            <option value="biodiversity" <?php echo e(old('jenis')=='biodiversity' ? 'selected' : ''); ?>>🌿 Biodiversity</option>
                            <option value="cultural_diversity" <?php echo e(old('jenis')=='cultural_diversity' ? 'selected' : ''); ?>>🏛️ Cultural Diversity</option>
                        </select>
                        <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label required">Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                  required><?php echo e(old('deskripsi')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Gambar <span class="text-muted">(opsional, JPG/PNG max 4MB)</span></label>
                        <input type="file" name="gambar" accept="image/jpeg,image/png,image/jpg"
                               class="form-control">
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn-primary-bi">Simpan</button>
                    <a href="<?php echo e(route('admin.warisan.index')); ?>" class="btn-outline-bi">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/admin/warisan/create.blade.php ENDPATH**/ ?>