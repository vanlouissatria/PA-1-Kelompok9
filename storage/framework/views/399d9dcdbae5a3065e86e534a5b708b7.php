<?php $__env->startSection('title', 'Tambah Informasi'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Tema Elegan (Blue & Gold) - Konsisten dengan Destinasi */
    :root {
        --bi-blue: #002F5F;      
        --bi-gold: #D4AF37;      
        --bi-gold-light: #E5C56B;
    }

    .preview-container {
        margin-top: 15px;
        display: none;
    }
    .preview-image {
        max-width: 180px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border: 2px solid #eee;
    }
    .required:after {
        content: " *";
        color: var(--bi-gold);
        font-weight: bold;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .card-header {
        background: linear-gradient(135deg, var(--bi-blue) 0%, #003f77 100%);
        color: white;
        border-radius: 12px 12px 0 0 !important;
        padding: 1.2rem 1.5rem;
        border-bottom: 3px solid var(--bi-gold);
    }
    .card-header h5 {
        color: white;
        font-weight: 700;
        margin-bottom: 0;
    }
    .card-header h5 i {
        color: var(--bi-gold) !important;
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 0.7rem 1rem;
    }
    .form-control:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
    }

    /* Tombol Custom */
    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.7rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-2px);
    }
    .btn-outline-bi {
        background: white;
        border: 1.5px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.7rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }
    .btn-outline-bi:hover {
        background: #f8f9fa;
        color: #001f3f;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-info-circle me-2"></i>
            Tambah Informasi Baru
        </h5>
    </div>
    <div class="card-body p-4">
        
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger border-0 shadow-sm mb-4">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><i class="fas fa-exclamation-triangle me-2"></i><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.informasi.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="kategori" value="informasi">
            
            <div class="row">
                
                <div class="col-md-9 mb-4">
                    <label class="form-label required">Judul Informasi</label>
                    <input type="text" name="judul" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           placeholder="Contoh: Jadwal Operasional Tele-Efrata" value="<?php echo e(old('judul')); ?>" required>
                </div>

                
                <div class="col-md-3 mb-4">
                    <label class="form-label required">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control <?php $__errorArgs = ['urutan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('urutan', 1)); ?>" required>
                </div>

                
                <div class="col-md-12 mb-4">
                    <label class="form-label">Gambar Informasi (Opsional)</label>
                    <input type="file" name="gambar" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                    <small class="text-muted d-block mt-1">Format: JPG, PNG. Maksimal 5MB</small>
                    
                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage" class="preview-image" alt="Preview">
                    </div>
                </div>

                
                <div class="col-12 mb-4">
                    <label class="form-label required">Isi Konten Informasi</label>
                    <textarea name="konten" class="form-control <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                              rows="10" placeholder="Tuliskan informasi detail di sini..." required><?php echo e(old('konten')); ?></textarea>
                </div>
            <hr class="my-4">

            <div class="d-flex gap-3">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i> Simpan Informasi
                </button>
                <a href="<?php echo e(route('admin.informasi.index')); ?>" class="btn-outline-bi">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview Gambar
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('previewImage');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Geosite-Tele-Efrata-Sihotang\resources\views/admin/informasi/create.blade.php ENDPATH**/ ?>