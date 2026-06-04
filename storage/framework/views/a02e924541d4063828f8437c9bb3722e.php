<?php $__env->startSection('title', 'Edit UMKM'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Styling BI-Style */
    .card-bi { border: none !important; border-radius: 12px !important; box-shadow: 0 4px 15px rgba(0,0,0,0.05) !important; background-color: #ffffff !important; }
    .card-header-bi { background: linear-gradient(135deg, #002F5F 0%, #003f77 100%) !important; color: #ffffff !important; border-radius: 12px 12px 0 0 !important; padding: 1.2rem 1.5rem !important; border-bottom: 3px solid #D4AF37 !important; }
    .card-header-bi h5 { color: #ffffff !important; font-weight: 700 !important; margin: 0 !important; }
    
    .form-label-bi { font-weight: 600 !important; color: #002F5F !important; margin-bottom: 0.5rem !important; }
    .form-control-bi { border-radius: 8px !important; border: 1px solid #ced4da !important; padding: 0.7rem 1rem !important; }
    .form-control-bi:focus { border-color: #D4AF37 !important; box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.2) !important; }
    
    .btn-bi-primary { background: #002F5F !important; color: #ffffff !important; padding: 0.7rem 1.8rem !important; border-radius: 8px !important; border: none !important; }
    .btn-bi-primary:hover { background: #001f3f !important; }
    
    .btn-bi-outline { background: #ffffff !important; border: 1px solid #002F5F !important; color: #002F5F !important; padding: 0.7rem 1.8rem !important; border-radius: 8px !important; text-decoration: none !important; }
    .btn-bi-outline:hover { background: #002F5F !important; color: #ffffff !important; }
    
    .preview-image { max-width: 220px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-top: 15px; }
</style>

<div class="card card-bi">
    <div class="card-header card-header-bi">
        <h5><i class="fas fa-edit me-2" style="color: #D4AF37;"></i> Edit UMKM: <?php echo e($umkm->nama_usaha); ?></h5>
    </div>

    <div class="card-body p-4">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger" style="border-radius: 8px !important;">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(url('/admin/geosite/'.$geosite.'/umkm/'.$umkm->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label-bi">Nama UMKM *</label>
                    <input type="text" name="nama_usaha" class="form-control form-control-bi" value="<?php echo e(old('nama_usaha', $umkm->nama_usaha)); ?>" required>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label class="form-label-bi">Pemilik *</label>
                    <input type="text" name="pemilik" class="form-control form-control-bi" value="<?php echo e(old('pemilik', $umkm->pemilik)); ?>" required>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label class="form-label-bi">No Telepon *</label>
                    <input type="text" name="no_telepon" class="form-control form-control-bi" value="<?php echo e(old('no_telepon', $umkm->no_telepon)); ?>" required>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label class="form-label-bi">Kategori *</label>
                    <select name="kategori" class="form-control form-control-bi" required>
                        <option value="Kuliner" <?php echo e(old('kategori', $umkm->kategori) == 'Kuliner' ? 'selected' : ''); ?>>Kuliner</option>
                        <option value="Fashion" <?php echo e(old('kategori', $umkm->kategori) == 'Fashion' ? 'selected' : ''); ?>>Fashion</option>
                        <option value="Kerajinan" <?php echo e(old('kategori', $umkm->kategori) == 'Kerajinan' ? 'selected' : ''); ?>>Kerajinan</option>
                        <option value="Pertanian" <?php echo e(old('kategori', $umkm->kategori) == 'Pertanian' ? 'selected' : ''); ?>>Pertanian</option>
                        <option value="Jasa" <?php echo e(old('kategori', $umkm->kategori) == 'Jasa' ? 'selected' : ''); ?>>Jasa</option>
                        <option value="Lainnya" <?php echo e(old('kategori', $umkm->kategori) == 'Lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                    </select>
                </div>
                
                <div class="col-md-12 mb-4">
                    <label class="form-label-bi">Alamat *</label>
                    <textarea name="alamat" class="form-control form-control-bi" rows="2" required><?php echo e(old('alamat', $umkm->alamat)); ?></textarea>
                </div>
                
                <div class="col-md-12 mb-4">
                    <label class="form-label-bi">Deskripsi *</label>
                    <textarea name="deskripsi" class="form-control form-control-bi" rows="3" required><?php echo e(old('deskripsi', $umkm->deskripsi)); ?></textarea>
                </div>
                
                <div class="col-md-12 mb-4">
                    <label class="form-label-bi">Foto Utama</label>
                    <input type="file" name="foto_utama" class="form-control form-control-bi" accept="image/*" id="imgInput">
                    <small class="text-muted d-block mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                    <div class="mt-2">
                        <small class="text-muted">Gambar Saat Ini:</small><br>
                        <img src="<?php echo e(image_url($umkm->foto_utama)); ?>" id="imgPreview" class="preview-image" alt="Preview">
                    </div>
                </div>
            </div>
            
            <hr>
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-bi-primary"><i class="fas fa-save me-2"></i> Update UMKM</button>
                <a href="<?php echo e(url('/admin/geosite/'.$geosite.'/umkm')); ?>" class="btn btn-bi-outline"><i class="fas fa-arrow-left me-2"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Perbaikan ID: disesuaikan dengan id="imgInput" pada input file
    document.getElementById('imgInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            const imgPreview = document.getElementById('imgPreview');
            reader.onload = e => {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Geosite-Tele-Efrata-Sihotang\resources\views/admin/tele/umkm/edit.blade.php ENDPATH**/ ?>