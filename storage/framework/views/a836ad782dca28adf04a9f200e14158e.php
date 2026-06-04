<?php $__env->startSection('title', 'Edit Kontak'); ?>

<?php $__env->startSection('content'); ?>

<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
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
        padding: 1rem 1.5rem;
        border-bottom: 3px solid var(--bi-gold);
    }

    .card-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .card-header i {
        color: var(--bi-gold);
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
    }

    .required:after {
        content: " *";
        color: var(--bi-gold);
        font-weight: bold;
    }

    .form-control {
        border-radius: 8px;
        padding: 0.6rem 1rem;
    }

    .form-control:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 .2rem rgba(212,175,55,.25);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        color: white;
        border: none;
        padding: .6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
        color: white;
    }

    .btn-outline-bi {
        background: white;
        color: var(--bi-blue);
        border: 1px solid var(--bi-blue);
        padding: .6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-address-book me-2"></i>
            Edit Kontak
        </h5>
    </div>

<div class="card-body">

    <form action="<?php echo e(route('admin.kontak.update', $kontak->id)); ?>"
          method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label required">
                    Nama Kontak Person
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="<?php echo e(old('judul', $kontak->judul)); ?>"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Subjudul
                </label>

                <input type="text"
                       name="subjudul"
                       class="form-control"
                       value="<?php echo e(old('subjudul', $kontak->subjudul)); ?>"
                       placeholder="Posisi, jabatan, atau deskripsi singkat">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Telepon 1
                </label>

                <input type="text"
                       name="telepon1"
                       class="form-control"
                       value="<?php echo e(old('telepon1', $kontak->telepon1)); ?>">
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">
                    Alamat
                </label>

                <textarea name="alamat"
                          rows="4"
                          class="form-control"><?php echo e(old('alamat', $kontak->alamat)); ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Kode Pos
                </label>

                <input type="text"
                       name="kode_pos"
                       class="form-control"
                       value="<?php echo e(old('kode_pos', $kontak->kode_pos)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Instagram
                </label>

                <input type="text"
                       name="instagram"
                       class="form-control"
                       value="<?php echo e(old('instagram', $kontak->instagram)); ?>"
                       placeholder="contoh: @username atau link profil">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Facebook
                </label>

                <input type="text"
                       name="facebook"
                       class="form-control"
                       value="<?php echo e(old('facebook', $kontak->facebook)); ?>"
                       placeholder="Masukkan URL atau username Facebook">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    TikTok
                </label>

                <input type="text"
                       name="tiktok"
                       class="form-control"
                       value="<?php echo e(old('tiktok', $kontak->tiktok)); ?>"
                       placeholder="Masukkan URL atau username TikTok">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Twitter
                </label>

                <input type="text"
                       name="twitter"
                       class="form-control"
                       value="<?php echo e(old('twitter', $kontak->twitter)); ?>"
                       placeholder="Masukkan URL atau username Twitter">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    YouTube
                </label>

                <input type="text"
                       name="youtube"
                       class="form-control"
                       value="<?php echo e(old('youtube', $kontak->youtube)); ?>"
                       placeholder="Masukkan URL atau nama channel YouTube">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Telepon 2
                </label>

                <input type="text"
                       name="telepon2"
                       class="form-control"
                       value="<?php echo e(old('telepon2', $kontak->telepon2)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Telepon 3
                </label>

                <input type="text"
                       name="telepon3"
                       class="form-control"
                       value="<?php echo e(old('telepon3', $kontak->telepon3)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Email 1
                </label>

                <input type="email"
                       name="email1"
                       class="form-control"
                       value="<?php echo e(old('email1', $kontak->email1)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Email 2
                </label>

                <input type="email"
                       name="email2"
                       class="form-control"
                       value="<?php echo e(old('email2', $kontak->email2)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Email 3
                </label>

                <input type="email"
                       name="email3"
                       class="form-control"
                       value="<?php echo e(old('email3', $kontak->email3)); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Google Maps Embed URL
                </label>

                <textarea name="maps"
                          rows="3"
                          class="form-control" placeholder="Masukkan URL embed Google Maps, misal https://www.google.com/maps/embed?..."><?php echo e(old('maps', $kontak->maps)); ?></textarea>
            </div>
        </div>

        <hr>

        <div class="d-flex gap-2">
            <button type="submit"
                    class="btn-primary-bi">
                <i class="fas fa-save me-2"></i>
                Simpan Kontak
            </button>

            <a href="<?php echo e(route('admin.kontak.index')); ?>"
               class="btn-outline-bi">
                <i class="fas fa-arrow-left me-2"></i>
                Batal
            </a>
        </div>

    </form>

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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Geosite Tele-Efrata-Sihotang\resources\views/admin/kontak/edit.blade.php ENDPATH**/ ?>