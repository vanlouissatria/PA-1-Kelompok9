{{-- resources/views/admin/informasi/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Informasi')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
        --bi-gold-light: #E5C56B;
        --bi-gray: #F5F7FA;
    }

    .preview-container {
        margin-top: 10px;
    }
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
    .form-control {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 0.6rem 1rem;
        transition: all 0.2s;
    }
    .form-control:focus {
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
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }
    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        color: white;
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
            <i class="fas fa-edit me-2"></i>
            Edit Informasi
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data" id="formInformasi">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $informasi->judul) }}" required placeholder="Masukkan judul informasi">
                    @error('judul')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Urutan</label>
                    <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" 
                           value="{{ old('urutan', $informasi->urutan) }}" required placeholder="Masukkan nomor urutan tampilan">
                    @error('urutan')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label required">Konten</label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" 
                              rows="10" required placeholder="Tuliskan isi konten informasi secara lengkap">{{ old('konten', $informasi->konten) }}</textarea>
                    @error('konten')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">File Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                    <small class="text-muted d-block mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                    
                    <div class="preview-container mt-3">
                        <small class="text-muted d-block mb-1" id="labelPreview">Gambar Saat Ini:</small>
                        {{-- PERBAIKAN: Menggunakan fungsi asset() karena file disimpan di folder public/uploads/informasi --}}
                        @if($informasi->gambar && file_exists(public_path($informasi->gambar)))
                            <img id="previewImage" class="preview-image" src="{{ asset($informasi->gambar) }}" alt="Preview Gambar">
                        @else
                            <img id="previewImage" class="preview-image" style="display:none;" alt="Preview Gambar">
                            <span id="noImageText" class="text-muted italic">Tidak ada gambar sebelumnya</span>
                        @endif
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Tampilkan Informasi</label>
                    <input type="hidden" name="status" value="0">
                    <div class="form-check p-0 m-0">
                        <input class="form-check-input d-none" type="checkbox" name="status" id="statusSwitch" value="1" {{ $informasi->status ? 'checked' : '' }}>
                        <label class="btn-toggle-status" for="statusSwitch">
                            <i class="fas {{ $informasi->status ? 'fa-eye' : 'fa-eye-slash' }}" id="statusIcon" style="font-size: 1.1rem;"></i>
                        </label>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i> Update
                </button>
                <a href="{{ route('admin.informasi.index') }}" class="btn-outline-bi">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewImage = document.getElementById('previewImage');
        const labelPreview = document.getElementById('labelPreview');
        const noImageText = document.getElementById('noImageText');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.style.display = 'block';
                labelPreview.textContent = "Pratinjau Gambar Baru:";
                if(noImageText) noImageText.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });

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