@extends('layouts.admin')

@section('title', 'Edit Destinasi')

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
        width: 100%;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        padding: 0.85rem 1rem;
        background: white;
    }

    .status-row {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-toggle-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        border-radius: 12px;
        padding: 0.8rem 1.2rem;
        font-weight: 700;
        font-size: 0.92rem;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .status-active-btn {
        background: #16a34a;
        color: white;
    }

    .status-inactive-btn {
        background: #6b7280;
        color: white;
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
    <h1 class="page-header-title">Edit Destinasi</h1>

    <div class="card form-card">
        <div class="card-header">
            <h5><i class="fas fa-edit"></i> Edit Destinasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Nama Destinasi --}}
                    <div class="col-md-6">
                        <label class="form-label required">Nama Destinasi</label>
                        <input type="text" name="nama_destinasi" value="{{ old('nama_destinasi', $destinasi->nama_destinasi) }}"
                               class="form-control @error('nama_destinasi') is-invalid @enderror" required>
                        @error('nama_destinasi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori Destinasi --}}
                    <div class="col-md-6">
                        <label class="form-label required">Kategori Destinasi</label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="alam" {{ old('kategori', $destinasi->kategori) == 'alam' ? 'selected' : '' }}>Destinasi Alam</option>
                            <option value="buatan" {{ old('kategori', $destinasi->kategori) == 'buatan' ? 'selected' : '' }}>Destinasi Buatan</option>
                            <option value="budaya" {{ old('kategori', $destinasi->kategori) == 'budaya' ? 'selected' : '' }}>Destinasi Budaya</option>
                        </select>
                        @error('kategori')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Lokasi / Alamat --}}
                    <div class="col-12">
                        <label class="form-label required">Lokasi / Alamat</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $destinasi->lokasi) }}"
                               class="form-control @error('lokasi') is-invalid @enderror" required>
                        @error('lokasi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi Destinasi --}}
                    <div class="col-12">
                        <label class="form-label required">Deskripsi Destinasi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar Destinasi --}}
                    <div class="col-md-6">
                        <label class="form-label">Gambar Destinasi</label>
                        <input type="file" id="inputGambar" name="gambar" accept="image/jpeg,image/png,image/jpg"
                               class="custom-file-input @error('gambar') is-invalid @enderror">
                        <small class="text-muted d-block mt-2" id="labelPreview">
                            {{ $destinasi->gambar ? 'Gambar Saat Ini:' : 'Kosongkan jika tidak ingin mengganti gambar.' }}
                        </small>
                        
                        @error('gambar')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror

                        <div class="preview-container">
                            @if($destinasi->gambar)
                                @php
                                    $preview = $destinasi->gambar;
                                    if (!\Illuminate\Support\Str::startsWith($preview, ['http://', 'https://', 'data:'])) {
                                        $preview = asset('storage/' . ltrim($preview, '/'));
                                    }
                                @endphp
                                <img id="previewImage" src="{{ $preview }}" alt="Preview Gambar" class="preview-image">
                            @else
                                <img id="previewImage" src="#" alt="Preview Gambar" class="preview-image" style="display: none;">
                            @endif
                        </div>
                    </div>

                    {{-- Status Tampilkan Destinasi --}}
                    <div class="col-md-6">
                        <label class="form-label">Status Tampilkan Destinasi</label>
                        <div class="status-row mt-2">
                            <input type="hidden" name="status" value="0">
                            <div class="form-check form-switch p-0 m-0">
                                <input class="form-check-input d-none" type="checkbox" id="statusSwitch" name="status" value="1" {{ $destinasi->status ? 'checked' : '' }}>
                                <label class="btn-toggle-status {{ $destinasi->status ? 'status-active-btn' : 'status-inactive-btn' }}" for="statusSwitch" id="labelStatusSwitch">
                                    <i class="fas {{ $destinasi->status ? 'fa-eye' : 'fa-eye-slash' }}" id="statusIcon"></i>
                                    <span id="statusText">{{ $destinasi->status ? 'Aktif' : 'Nonaktif' }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Utama --}}
                <div class="d-flex flex-wrap gap-3 mt-5 pt-3 border-top">
                    <button type="submit" class="btn-primary-bi">
                        <i class="fas fa-save"></i>
                        Update Destinasi
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

<script>
    // Live Preview Gambar Baru
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewImage = document.getElementById('previewImage');
        const labelPreview = document.getElementById('labelPreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.style.display = 'block';
                labelPreview.innerText = 'Preview Gambar Baru:';
            }
            reader.readAsDataURL(file);
        }
    });

    // Toggle Tampilan Tombol Status (Eye Icon)
    document.getElementById('statusSwitch').addEventListener('change', function() {
        const icon = document.getElementById('statusIcon');
        const text = document.getElementById('statusText');
        const labelBtn = document.getElementById('labelStatusSwitch');

        if (this.checked) {
            icon.className = 'fas fa-eye';
            text.innerText = 'Aktif';
            labelBtn.className = 'btn-toggle-status status-active-btn';
        } else {
            icon.className = 'fas fa-eye-slash';
            text.innerText = 'Nonaktif';
            labelBtn.className = 'btn-toggle-status status-inactive-btn';
        }
    });
</script>
@endsection