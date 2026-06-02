{{-- resources/views/admin/kontak/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('content')

<style>
    :root {
        --bi-blue: #002F5F;
        --bi-gold: #D4AF37;
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
        margin: 0;
        font-weight: 600;
    }

    .card-header i {
        color: var(--bi-gold);
    }

    .form-label {
        font-weight: 600;
        color: var(--bi-blue);
    }

    .required:after {
        content: " *";
        color: var(--bi-gold);
        font-weight: bold;
    }

    .form-control {
        border-radius: 8px;
        padding: 0.6rem 1rem;
    }

    .form-control:focus {
        border-color: var(--bi-gold);
        box-shadow: 0 0 0 .2rem rgba(212,175,55,.25);
    }

    .btn-primary-bi {
        background: var(--bi-blue);
        color: white;
        border: none;
        padding: .6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-primary-bi:hover {
        background: #001f3f;
        color: white;
    }

    .btn-outline-bi {
        background: white;
        color: var(--bi-blue);
        border: 1px solid var(--bi-blue);
        padding: .6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-outline-bi:hover {
        background: var(--bi-blue);
        color: white;
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
        transition: .2s;
    }

    .form-check-input:not(:checked) + .btn-toggle-status {
        background-color: #6c757d;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-address-book me-2"></i>
            Edit Kontak
        </h5>
    </div>

```
<div class="card-body">

    <form action="{{ route('admin.kontak.update', $kontak->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label required">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $kontak->judul) }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label required">
                    Telepon 1
                </label>

                <input type="text"
                       name="telepon1"
                       class="form-control"
                       value="{{ old('telepon1', $kontak->telepon1) }}"
                       required>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label required">
                    Alamat
                </label>

                <textarea name="alamat"
                          rows="4"
                          class="form-control"
                          required>{{ old('alamat', $kontak->alamat) }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Telepon 2
                </label>

                <input type="text"
                       name="telepon2"
                       class="form-control"
                       value="{{ old('telepon2', $kontak->telepon2) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label required">
                    Email 1
                </label>

                <input type="email"
                       name="email1"
                       class="form-control"
                       value="{{ old('email1', $kontak->email1) }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Email 2
                </label>

                <input type="email"
                       name="email2"
                       class="form-control"
                       value="{{ old('email2', $kontak->email2) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Google Maps
                </label>

                <textarea name="maps"
                          rows="3"
                          class="form-control">{{ old('maps', $kontak->maps) }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    Status Tampilkan Kontak
                </label>

                <input type="hidden" name="status" value="0">

                <div class="form-check p-0 m-0">
                    <input
                        class="form-check-input d-none"
                        type="checkbox"
                        name="status"
                        id="statusSwitch"
                        value="1"
                        {{ $kontak->status ? 'checked' : '' }}>

                    <label class="btn-toggle-status"
                           for="statusSwitch">

                        <i class="fas {{ $kontak->status ? 'fa-eye' : 'fa-eye-slash' }}"
                           id="statusIcon"></i>

                    </label>
                </div>
            </div>

        </div>

        <hr>

        <div class="d-flex gap-2">
            <button type="submit"
                    class="btn-primary-bi">
                <i class="fas fa-save me-2"></i>
                Simpan Kontak
            </button>

            <a href="{{ route('admin.kontak.index') }}"
               class="btn-outline-bi">
                <i class="fas fa-arrow-left me-2"></i>
                Batal
            </a>
        </div>

    </form>

</div>
```

</div>

<script>
document.getElementById('statusSwitch').addEventListener('change', function() {

    const icon = document.getElementById('statusIcon');

    if(this.checked){
        icon.className = 'fas fa-eye';
    }else{
        icon.className = 'fas fa-eye-slash';
    }

});
</script>

@endsection
