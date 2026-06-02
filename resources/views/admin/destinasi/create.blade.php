{{-- resources/views/admin/destinasi/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Destinasi')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
        --bi-gray: #F8FAFC;
    }

    .page-header-title {
        font-size: 2.25rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: #111827;
    }

    .form-card {
        max-width: 980px;
        margin: 0 auto;
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.08);
    }

    .form-card .card-header {
        background: linear-gradient(135deg, var(--bi-blue) 0%, #123b70 100%);
        color: white;
        padding: 1.5rem 2rem;
    }

    .form-card .card-header h5 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
    }

    .form-card .card-body {
        background: white;
        padding: 2rem;
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.75rem;
    }

    .required:after {
        content: " *";
        color: var(--bi-gold);
    }

    .form-control,
    .form-select {
        width: 100%;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        padding: 1rem 1.1rem;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--bi-blue);
        outline: none;
        box-shadow: 0 0 0 4px rgba(0, 47, 95, 0.08);
        background: white;
    }

    .custom-file-input {
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        padding: 0.85rem 1rem;
        background: white;
        width: 100%;
    }

    .status-row {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: #16a34a;
        color: white;
        border-radius: 12px;
        padding: 0.8rem 1rem;
        font-weight: 700;
        font-size: 0.92rem;
    }

    .status-pill i {
        font-size: 0.95rem;
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        border: none;
        color: white;
        padding: 0.95rem 2rem;
        border-radius: 14px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 16px 40px rgba(0, 47, 95, 0.12);
        transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .btn-primary-bi:hover {
        background: #061f44;
        transform: translateY(-1px);
    }

    .btn-outline-bi {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.95rem 2rem;
        border-radius: 14px;
        border: 1px solid #002f5f;
        color: #002f5f;
        background: white;
        font-weight: 700;
        text-decoration: none;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .btn-outline-bi:hover {
        background: #002f5f;
        color: white;
    }

    .text-muted {
        color: #6b7280;
        font-size: 0.9rem;
    }

    .preview-image {
        width: auto;
        max-height: 180px;
        border-radius: 16px;
        display: block;
        margin-top: 1rem;
        object-fit: cover;
    }
</style>

<div class="container-fluid">
    <h1 class="page-header-title">Tambah Destinasi</h1>

    <div class="card form-card">
        <div class="card-header">
            <h5><i class="fas fa-map-marked-alt"></i> Tambah Destinasi Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label required">Nama Destinasi</label>
                        <input type="text" name="nama_destinasi" value="{{ old('nama_destinasi') }}"
                               class="form-control @error('nama_destinasi') is-invalid @enderror"
                               placeholder="Masukkan nama destinasi" required>
                        @error('nama_destinasi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">Kategori Destinasi</label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="alam" {{ old('kategori') == 'alam' ? 'selected' : '' }}>Destinasi Alam</option>
                            <option value="buatan" {{ old('kategori') == 'buatan' ? 'selected' : '' }}>Destinasi Buatan</option>
                            <option value="budaya" {{ old('kategori') == 'budaya' ? 'selected' : '' }}>Destinasi Budaya</option>
                        </select>
                        @error('kategori')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label required">Lokasi / Alamat</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                               class="form-control @error('lokasi') is-invalid @enderror"
                               placeholder="Contoh: Desa Tele, Kec. Harian" required>
                        @error('lokasi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label required">Deskripsi Destinasi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Jelaskan destinasi wisata ini" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">Gambar Destinasi</label>
                        <input type="file" name="gambar" accept="image/jpeg,image/png,image/jpg"
                               class="custom-file-input @error('gambar') is-invalid @enderror">
                        <p class="text-muted mt-2">Format JPG, PNG, JPEG. Maksimal 2MB</p>
                        @error('gambar')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Tampilkan Destinasi</label>
                        <div class="status-row">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                                <label class="form-check-label" for="status">Aktifkan tampilan</label>
                            </div>
                            <span class="status-pill"><i class="fas fa-eye"></i> Aktif</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <button type="submit" class="btn-primary-bi">
                        <i class="fas fa-lock"></i>
                        Simpan Destinasi
                    </button>
                    <a href="{{ route('admin.destinasi.index') }}" class="btn-outline-bi">
                        <i class="fas fa-arrow-left"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection