@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<style>
    /* Desain BI-Style */
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
        <h5><i class="fas fa-edit me-2" style="color: #D4AF37;"></i> Edit Foto Galeri: {{ $galeri->judul }}</h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ url('/admin/geosite/'.$geosite.'/galeri/'.$galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="form-label-bi">Judul Foto *</label>
                <input type="text" name="judul" class="form-control form-control-bi" value="{{ old('judul', $galeri->judul) }}" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label-bi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control form-control-bi" rows="3">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>
            
            <div class="mb-4">
                <label class="form-label-bi">Ganti Gambar</label>
                <input type="file" name="gambar" class="form-control form-control-bi" accept="image/*" id="imgInput">
                <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengubah gambar.</small>
                
                <div class="mt-3">
                    <small class="text-muted">Gambar Saat Ini:</small><br>
                    <img src="{{ image_url($galeri->gambar) }}" id="imgPreview" class="preview-image" alt="Preview">
                </div>

            <hr>
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="btn-bi-primary"><i class="fas fa-save me-2"></i> Update Galeri</button>
                <a href="{{ url('/admin/geosite/'.$geosite.'/galeri') }}" class="btn-bi-outline"><i class="fas fa-arrow-left me-2"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview Gambar
    document.getElementById('imgInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('imgPreview');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection