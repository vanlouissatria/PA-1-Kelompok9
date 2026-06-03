{{-- resources/views/admin/destinasi/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
    }

    .card { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .card-header { 
        background: linear-gradient(135deg, var(--bi-blue) 0%, #003f77 100%); 
        color: white; border-radius: 12px 12px 0 0 !important; padding: 1rem 1.5rem; 
        border-bottom: 3px solid var(--bi-gold);
    }
    .card-header h5 { color: white; font-weight: 600; margin-bottom: 0; }
    .card-header h5 i { color: var(--bi-gold) !important; }

    .form-label { font-weight: 600; color: var(--bi-blue); margin-bottom: 0.5rem; }
    .form-control, .form-select { border-radius: 8px; border: 1px solid #dee2e6; padding: 0.6rem 1rem; }
    .form-control:focus { border-color: var(--bi-gold); box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25); }

    .preview-container { margin-top: 10px; }
    .preview-image { max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); object-fit: cover; }
    
    .btn-primary-bi { background: var(--bi-blue); color: white; padding: 0.6rem 1.5rem; border-radius: 8px; border: none; transition: 0.2s; }
    .btn-primary-bi:hover { background: #001f3f; color: white; }
</style>

<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-edit me-2"></i> Edit Destinasi</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Destinasi</label>
                    <input type="text" name="nama_destinasi" class="form-control" value="{{ old('nama_destinasi', $destinasi->nama_destinasi) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="alam" {{ $destinasi->kategori == 'alam' ? 'selected' : '' }}>Destinasi Alam</option>
                        <option value="buatan" {{ $destinasi->kategori == 'buatan' ? 'selected' : '' }}>Destinasi Buatan</option>
                        <option value="budaya" {{ $destinasi->kategori == 'budaya' ? 'selected' : '' }}>Destinasi Budaya</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $destinasi->lokasi) }}" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">File Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="inputGambar" accept="image/*">
                    <small class="text-muted">Maksimal 2MB</small>
                    <div class="preview-container">
                        <img id="previewImage" class="preview-image" src="{{ $destinasi->gambar ? asset('storage/'.$destinasi->gambar) : '#' }}" 
                             style="{{ $destinasi->gambar ? '' : 'display:none;' }}">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn-primary-bi"><i class="fas fa-save me-2"></i> Simpan</button>
                <a href="{{ route('admin.destinasi.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i> Batal</a>
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