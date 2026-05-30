{{-- resources/views/admin/informasi/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Informasi')

@section('content')
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

    /* Toggle status */
    .btn-toggle-status {
        background-color: #28a745;
        color: white;
        padding: 0.6rem 2rem;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: none;
        transition: background-color 0.2s;
    }

    .form-check-input:not(:checked) + .btn-toggle-status {
        background-color: #6c757d;
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
        
        {{-- Pesan Error Validation --}}
        @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-triangle me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="kategori" value="informasi">
            
            <div class="row">
                {{-- Judul Informasi --}}
                <div class="col-md-9 mb-4">
                    <label class="form-label required">Judul Informasi</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           placeholder="Contoh: Jadwal Operasional Tele-Efrata" value="{{ old('judul') }}" required>
                </div>

                {{-- Urutan Tampil --}}
                <div class="col-md-3 mb-4">
                    <label class="form-label required">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" 
                           value="{{ old('urutan', 1) }}" required>
                </div>

                {{-- Upload Gambar --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label">Gambar Informasi (Opsional)</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                    <small class="text-muted d-block mt-1">Format: JPG, PNG. Maksimal 5MB</small>
                    
                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage" class="preview-image" alt="Preview">
                    </div>
                </div>

                {{-- Isi Konten --}}
                <div class="col-12 mb-4">
                    <label class="form-label required">Isi Konten Informasi</label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" 
                              rows="10" placeholder="Tuliskan informasi detail di sini..." required>{{ old('konten') }}</textarea>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Status Tampilkan Galeri
                    </label>

                    <input type="hidden" name="status" value="0">

                    <div class="form-check p-0 m-0">

                        <input class="form-check-input d-none"
                            type="checkbox"
                            name="status"
                            id="statusSwitch"
                            value="1"
                            checked>

                        <label class="btn-toggle-status" for="statusSwitch">
                            <i class="fas fa-eye"
                            id="statusIcon"
                            style="font-size: 1.1rem;"></i>
                        </label>

                    </div>
                </div>

            <hr class="my-4">

            <div class="d-flex gap-3">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i> Simpan Informasi
                </button>
                <a href="{{ route('admin.informasi.index') }}" class="btn-outline-bi">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview Gambar Otomatis
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const container = document.getElementById('previewContainer');
        const img = document.getElementById('previewImage');
        
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

    // Toggle icon mata
    document.getElementById('statusSwitch').addEventListener('change', function() {

        const icon = document.getElementById('statusIcon');

        if (this.checked) {
            icon.className = 'fas fa-eye';
        } else {
            icon.className = 'fas fa-eye-slash';
        }
    });
</script>
@endsection