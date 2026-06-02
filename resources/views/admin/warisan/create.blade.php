@extends('layouts.admin')

@section('title', 'Tambah Warisan Alam dan Budaya')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
    }

    .page-header-title {
        font-size: 2rem;
        font-weight: 800;
        color: #000;
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .card-header {
        background: linear-gradient(135deg, var(--bi-blue) 0%, #003f77 100%);
        color: white;
        border-radius: 16px 16px 0 0;
        padding: 1rem 1.5rem;
        border-bottom: 3px solid var(--bi-gold);
    }

    .card-header h5 {
        margin-bottom: 0;
        font-weight: 700;
    }

    .card-body {
        padding: 1.8rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control,
    .form-select,
    .form-control-file {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        padding: 0.85rem 1rem;
        transition: all 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.2);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.85rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
    }

    .btn-outline-bi {
        background: white;
        border: 1px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.85rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }

    .text-muted {
        color: #6c757d !important;
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid">
    <h1 class="page-header-title">Tambah Warisan Alam dan Budaya</h1>

    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-landmark me-2"></i> Form Tambah Warisan</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.warisan.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="form-control @error('judul') is-invalid @enderror"
                               required>
                        @error('judul')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Jenis</label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="geodiversity" {{ old('jenis')=='geodiversity' ? 'selected' : '' }}>🪨 Geodiversity</option>
                            <option value="biodiversity" {{ old('jenis')=='biodiversity' ? 'selected' : '' }}>🌿 Biodiversity</option>
                            <option value="cultural_diversity" {{ old('jenis')=='cultural_diversity' ? 'selected' : '' }}>🏛️ Cultural Diversity</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label required">Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Gambar <span class="text-muted">(opsional, JPG/PNG max 4MB)</span></label>
                        <input type="file" name="gambar" accept="image/jpeg,image/png,image/jpg"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Urutan Tampil</label>
                        <input type="number" name="urutan" value="{{ old('urutan', 1) }}" min="1"
                               class="form-control @error('urutan') is-invalid @enderror" required>
                        @error('urutan')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
                    </div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                    <label class="form-check-label" for="status">Tampilkan di website</label>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn-primary-bi">Simpan</button>
                    <a href="{{ route('admin.warisan.index') }}" class="btn-outline-bi">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection