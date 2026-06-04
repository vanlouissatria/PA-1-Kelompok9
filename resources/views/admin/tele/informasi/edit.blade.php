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

    .preview-container { margin-top: 10px; }
    .preview-image { max-width: 220px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); object-fit: cover; }
    .required:after { content: " *"; color: var(--bi-gold); font-weight: bold; }
    
    .card { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .card-header { background: linear-gradient(135deg, var(--bi-blue) 0%, #003f77 100%); color: white; border-radius: 12px 12px 0 0 !important; padding: 1rem 1.5rem; border-bottom: 3px solid var(--bi-gold); }
    .card-header h5 { color: white; font-weight: 700; margin-bottom: 0; }
    .card-header h5 i { color: var(--bi-gold); }

    .form-label { font-weight: 600; color: var(--bi-blue); margin-bottom: 0.5rem; }
    .form-control { border-radius: 8px; border: 1px solid #dee2e6; padding: 0.7rem 1rem; }
    .form-control:focus { border-color: var(--bi-gold); box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.2); }

    .btn-primary-bi { background: var(--bi-blue); border: none; color: white; padding: 0.7rem 1.8rem; border-radius: 8px; font-weight: 600; transition: all 0.3s; }
    .btn-primary-bi:hover { background: #001f3f; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.15); }
    .btn-outline-bi { background: white; border: 1px solid var(--bi-blue); color: var(--bi-blue); padding: 0.7rem 1.8rem; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s; }
    .btn-outline-bi:hover { background: var(--bi-blue); color: white; }
</style>

<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-info-circle me-2"></i> Edit Informasi: {{ $informasi->judul }}</h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$informasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="form-label required">Judul Informasi</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $informasi->judul) }}" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label required">Isi Konten</label>
                <textarea name="isi" class="form-control" rows="10" required>{{ old('isi', $informasi->konten) }}</textarea>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Gambar Informasi</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" id="imgInput">
                <div class="preview-container">
                    <small class="text-muted d-block mb-2">Gambar Saat Ini:</small>
                        <img src="{{ image_url($informasi->gambar) }}" id="imgPreview" class="preview-image" alt="Preview">
                <button type="submit" class="btn-primary-bi"><i class="fas fa-save me-2"></i> Update Informasi</button>
                <a href="{{ url('/admin/geosite/'.$geosite.'/informasi') }}" class="btn-outline-bi"><i class="fas fa-arrow-left me-2"></i> Batal</a>
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
@endsection