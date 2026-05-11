{{-- resources/views/admin/berita/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
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
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                {{-- Judul Berita --}}
                <div class="col-md-8 mb-4">
                    <label class="form-label required">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           placeholder="Masukkan judul berita yang menarik" value="{{ old('judul') }}" required>
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Penulis --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Penulis / Author</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user-edit text-muted"></i></span>
                        <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin') }}">
                    </div>
                </div>

                {{-- Konten --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label required">Isi Konten Berita</label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" 
                              rows="10" placeholder="Tuliskan berita lengkap di sini..." required>{{ old('konten') }}</textarea>
                    @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Gambar --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">Gambar Utama Berita</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/*" id="imgInput" required>
                    <small class="text-muted d-block mt-1">Gunakan gambar landscape berkualitas tinggi (Maks. 2MB)</small>
                    
                    <div class="preview-container" id="imgPreviewContainer">
                        <img id="imgPreview" class="preview-image" alt="Preview Berita">
                    </div>
                    @error('gambar') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" name="status" id="statusSwitch" value="1" checked>
                        <label class="form-check-label fw-bold ms-2" for="statusSwitch" style="color: var(--bi-blue);">Tampilkan Berita di Publik</label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-3">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-paper-plane me-2"></i> Publikasikan Berita
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn-outline-bi">
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
@endsection