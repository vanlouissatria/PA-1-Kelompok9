<?php $__env->startSection('title', 'Tambah Berita'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Tema Elegan (Sesuai Destinasi & Galeri) */
    :root {
        --bi-blue: #002F5F;      /* Biru tua */
        --bi-gold: #D4AF37;      /* Emas */
        --bi-gold-light: #E5C56B;
    }

    .preview-container {
        margin-top: 15px;
        display: none;
    }
    .preview-image {
        max-width: 250px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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
        letter-spacing: 0.5px;
    }
    .card-header h5 i {
        color: var(--bi-gold) !important;
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 0.7rem 1rem;
    }
    .form-control:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
    }

    /* Styling Checkbox Custom */
    .form-check-input:checked {
        background-color: var(--bi-blue);
        border-color: var(--bi-blue);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.7rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        transition: all 0.3s;
    }
    .btn-outline-bi:hover {
        background: #f8f9fa;
        color: #001f3f;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-newspaper me-2"></i>
            Tulis Berita Baru
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.berita.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="row">
                
                <div class="col-md-8 mb-4">
                    <label class="form-label required">Judul Berita</label>
                    <input type="text" name="judul" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           placeholder="Masukkan judul berita yang menarik" value="<?php echo e(old('judul')); ?>" required>
                    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-md-4 mb-4">
                    <label class="form-label">Penulis / Author</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user-edit text-muted"></i></span>
                        <input type="text" name="penulis" class="form-control" value="<?php echo e(old('penulis', 'Admin')); ?>">
                    </div>
                </div>

                
                <div class="col-md-12 mb-4">
                    <label class="form-label required">Isi Konten Berita</label>
                    <textarea name="konten" class="form-control <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                              rows="10" placeholder="Tuliskan berita lengkap di sini..." required><?php echo e(old('konten')); ?></textarea>
                    <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-md-6 mb-4">
                    <label class="form-label required">Gambar Utama Berita</label>
                    <input type="file" name="gambar" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           accept="image/*" id="imgInput" required>
                    <small class="text-muted d-block mt-1">Gunakan gambar landscape berkualitas tinggi (Maks. 2MB)</small>
                    
                    <div class="preview-container" id="imgPreviewContainer">
                        <img id="imgPreview" class="preview-image" alt="Preview Berita">
                    </div>
                    <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-3">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-paper-plane me-2"></i> Publikasikan Berita
                </button>
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn-outline-bi">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview Gambar Otomatis
    document.getElementById('imgInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const container = document.getElementById('imgPreviewContainer');
        const img = document.getElementById('imgPreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                img.src = event.target.result;
                container.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            container.style.display = 'none';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PA 1\Geosite-Tele-Efrata-Sihotang\resources\views/admin/berita/create.blade.php ENDPATH**/ ?>