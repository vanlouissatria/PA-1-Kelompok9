{{-- resources/views/admin/destinasi/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Destinasi')

@section('content')
<style>
    /* Tema Elegan (Blue & Gold) */
    :root {
        --bi-blue: #002F5F;      /* Biru tua */
        --bi-gold: #D4AF37;      /* Emas */
        --bi-gold-light: #E5C56B;
        --bi-gray: #F5F7FA;
    }

    .preview-container {
        margin-top: 10px;
        display: none;
    }
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
        font-weight: 600;
        margin-bottom: 0;
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
        padding: 0.6rem 1rem;
        transition: all 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
        cursor: pointer;
    }
    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-outline-bi {
        background: white;
        border: 1px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }
    hr {
        background-color: #e9ecef;
        margin: 1.5rem 0;
        border: 0;
        height: 1px;
    }
    .text-muted {
        color: #6c757d !important;
        font-size: 0.8rem;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-map-marked-alt me-2"></i>
            Tambah Destinasi Baru
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data" id="formDestinasi">
            @csrf
            
            <div class="row">
                {{-- Nama Destinasi --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Nama Destinasi</label>
                    <input type="text" name="nama_destinasi" class="form-control @error('nama_destinasi') is-invalid @enderror" 
                           value="{{ old('nama_destinasi') }}" required placeholder="Masukkan nama tempat wisata">
                    @error('nama_destinasi')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Kategori --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori Destinasi</label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="alam" {{ old('kategori') == 'alam' ? 'selected' : '' }}>Destinasi Alam</option>
                        <option value="buatan" {{ old('kategori') == 'buatan' ? 'selected' : '' }}>Destinasi Buatan</option>
                        <option value="budaya" {{ old('kategori') == 'budaya' ? 'selected' : '' }}>Destinasi Budaya</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Lokasi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Lokasi / Alamat</label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" 
                           value="{{ old('lokasi') }}" required placeholder="Contoh: Desa Tele, Kec. Harian">
                    @error('lokasi')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi Destinasi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="5" required placeholder="Jelaskan keindahan dan fasilitas destinasi ini">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Upload Gambar --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Gambar Destinasi</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" required id="inputGambar">
                    <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                    
                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage" class="preview-image" alt="Preview Gambar">
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i> Simpan Destinasi
                </button>
                <a href="{{ route('admin.destinasi.index') }}" class="btn-outline-bi">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar sebelum upload (Sama seperti Galeri)
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection