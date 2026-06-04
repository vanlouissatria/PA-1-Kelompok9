{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
        --bi-gold-light: #E5C56B;
        --bi-gray: #F5F7FA;
    }

    .preview-container {
        margin-top: 15px;
        display: none;
    }

    .preview-image {
        max-width: 220px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        object-fit: cover;
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
        padding: 1rem 1.5rem;
        border-bottom: 3px solid var(--bi-gold);
    }

    .card-header h5 {
        color: white;
        font-weight: 700;
        margin-bottom: 0;
    }

    .card-header h5 i {
        color: var(--bi-gold);
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 0.7rem 1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.2);
    }

    .form-check-input:checked {
        background-color: var(--bi-blue);
        border-color: var(--bi-blue);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .btn-outline-bi {
        background: white;
        border: 1px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }

    hr {
        border: 0;
        height: 1px;
        background: #e9ecef;
        margin: 1.5rem 0;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-images me-2"></i>
            Tambah Galeri Baru
        </h5>
    </div>

    <div class="card-body p-4">

        <form action="{{ route('admin.galeri.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                {{-- Judul --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Judul Galeri
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           placeholder="Masukkan judul galeri"
                           required>

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Kategori Galeri
                    </label>

                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="alam" {{ old('kategori') == 'alam' ? 'selected' : '' }}>Alam</option>
                        <option value="budaya" {{ old('kategori') == 'budaya' ? 'selected' : '' }}>Budaya</option>
                        <option value="wisata" {{ old('kategori') == 'wisata' ? 'selected' : '' }}>Wisata</option>
                    </select>
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi galeri">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Upload Gambar --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Gambar Galeri
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*"
                           id="imgInput"
                           required>

                    <small class="text-muted d-block mt-1">
                        Format JPG, PNG, JPEG. Maksimal 2MB
                    </small>

                    <div class="preview-container" id="previewContainer">
                        <img id="imgPreview"
                             class="preview-image"
                             alt="Preview Gambar">
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            <hr>

            <div class="d-flex gap-3">

                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i>
                    Simpan Galeri
                </button>

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn-outline-bi">
                    <i class="fas fa-arrow-left me-2"></i>
                    Batal
                </a>

            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar otomatis
    document.getElementById('imgInput').addEventListener('change', function(e) {

        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const imgPreview = document.getElementById('imgPreview');

        if (file) {

            const reader = new FileReader();

            reader.onload = function(event) {
                imgPreview.src = event.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(file);

        } else {

            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection