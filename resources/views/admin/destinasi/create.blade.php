{{-- resources/views/admin/destinasi/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Destinasi')

@section('content')
<style>
    /* Tema Elegan (Blue & Gold) */
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
        --bi-gold-light: #E5C56B;
        --bi-gray: #F5F7FA;
    }

    .preview-container {
        margin-top: 15px;
        display: none;
    }

    .preview-image {
        max-width: 220px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
        font-weight: 700;
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

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 0.7rem 1rem;
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
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .btn-outline-bi {
        background: white;
        border: 1px solid var(--bi-blue);
        color: var(--bi-blue);
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
    }

    hr {
        border: 0;
        height: 1px;
        background: #e9ecef;
        margin: 1.5rem 0;
    }

    .text-muted {
        color: #6c757d !important;
        font-size: 0.85rem;
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
            <i class="fas fa-map-marked-alt me-2"></i>
            Tambah Destinasi Baru
        </h5>
    </div>

    <div class="card-body p-4">

        <form action="{{ route('admin.destinasi.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                {{-- Nama Destinasi --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Nama Destinasi
                    </label>

                    <input type="text"
                           name="nama_destinasi"
                           class="form-control @error('nama_destinasi') is-invalid @enderror"
                           value="{{ old('nama_destinasi') }}"
                           required
                           placeholder="Masukkan nama destinasi">

                    @error('nama_destinasi')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Kategori Destinasi
                    </label>

                    <select name="kategori"
                            class="form-select @error('kategori') is-invalid @enderror"
                            required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="alam"
                            {{ old('kategori') == 'alam' ? 'selected' : '' }}>
                            Destinasi Alam
                        </option>

                        <option value="buatan"
                            {{ old('kategori') == 'buatan' ? 'selected' : '' }}>
                            Destinasi Buatan
                        </option>

                        <option value="budaya"
                            {{ old('kategori') == 'budaya' ? 'selected' : '' }}>
                            Destinasi Budaya
                        </option>

                    </select>

                    @error('kategori')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label required">
                        Lokasi / Alamat
                    </label>

                    <input type="text"
                           name="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi') }}"
                           required
                           placeholder="Contoh: Desa Tele, Kec. Harian">

                    @error('lokasi')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label required">
                        Deskripsi Destinasi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required
                              placeholder="Jelaskan destinasi wisata ini">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Upload Gambar --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label required">
                        Gambar Destinasi
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/jpg"
                           required
                           id="inputGambar">

                    <small class="text-muted d-block mt-1">
                        Format JPG, PNG, JPEG. Maksimal 2MB
                    </small>

                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage"
                             class="preview-image"
                             alt="Preview Gambar">
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Status Tampilkan Destinasi
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

            </div>

            <hr>

            <div class="d-flex gap-3">

                <button type="submit" class="btn-primary-bi">
                    <i class="fas fa-save me-2"></i>
                    Simpan Destinasi
                </button>

                <a href="{{ route('admin.destinasi.index') }}"
                   class="btn-outline-bi">
                    <i class="fas fa-arrow-left me-2"></i>
                    Batal
                </a>

            </div>

        </form>
    </div>
</div>

<script>
    // Preview gambar otomatis
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