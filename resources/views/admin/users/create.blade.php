@extends('layouts.admin')

@section('title', 'Tambah Admin Baru')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-blue-dark: #001f3f;
        --bi-yellow: #b78d2e;
        --text-heading: #111827;
        --text-muted: #6b7280;
        --border-light: #e5e7eb;
    }

    .page-header-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: var(--text-heading);
        margin-bottom: 0.25rem;
        margin-top: 0;
    }

    .page-header-sub {
        color: var(--text-muted);
        font-size: 0.92rem;
        margin: 0 0 2rem;
    }

    .form-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 36px 40px;
        box-shadow: 0 8px 32px rgba(15, 44, 69, 0.07);
        border: 1px solid var(--border-light);
        max-width: 680px;
    }

    .form-section-title {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: var(--bi-yellow);
        margin: 0 0 18px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-light);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label-custom {
        display: block;
        font-weight: 600;
        font-size: 0.88rem;
        color: var(--text-heading);
        margin-bottom: 8px;
    }

    .form-label-custom .required {
        color: #ef4444;
        margin-left: 3px;
    }

    .form-hint {
        font-size: 0.78rem;
        color: var(--text-muted);
        margin-top: 5px;
    }

    .form-control-custom {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid var(--border-light);
        border-radius: 10px;
        font-size: 0.92rem;
        color: var(--text-heading);
        background: #fafafa;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        font-family: 'Inter', sans-serif;
        outline: none;
    }

    .form-control-custom:focus {
        border-color: var(--bi-blue);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(0, 47, 95, 0.08);
    }

    .form-control-custom.is-invalid {
        border-color: #ef4444;
        background: #fff5f5;
    }

    .invalid-feedback-custom {
        font-size: 0.8rem;
        color: #ef4444;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-muted);
        cursor: pointer;
        padding: 4px;
        font-size: 0.9rem;
        transition: color 0.2s;
    }

    .password-toggle:hover {
        color: var(--bi-blue);
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid var(--border-light);
    }

    .btn-simpan {
        background: var(--bi-blue);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.92rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background 0.2s ease, transform 0.2s ease;
        box-shadow: 0 8px 20px rgba(0, 47, 95, 0.15);
    }

    .btn-simpan:hover {
        background: var(--bi-blue-dark);
        transform: translateY(-1px);
    }

    .btn-batal {
        background: #f1f5f9;
        color: var(--text-heading);
        border: none;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.92rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background 0.2s ease;
    }

    .btn-batal:hover {
        background: #e2e8f0;
        color: var(--text-heading);
        text-decoration: none;
    }

    .password-strength {
        margin-top: 8px;
        font-size: 0.78rem;
    }

    .strength-bar {
        height: 4px;
        border-radius: 99px;
        background: var(--border-light);
        margin-bottom: 4px;
        overflow: hidden;
    }

    .strength-fill {
        height: 100%;
        border-radius: 99px;
        width: 0%;
        transition: width 0.3s ease, background 0.3s ease;
    }
</style>

<h1 class="page-header-title">Tambah Admin Baru</h1>
<p class="page-header-sub">Buat akun baru untuk admin yang akan mengelola konten website.</p>

<div class="form-card">
    <form action="{{ route('admin.users.store') }}" method="POST" id="formTambahAdmin">
        @csrf

        <p class="form-section-title">Informasi Akun</p>

        {{-- Nama --}}
        <div class="form-group">
            <label class="form-label-custom" for="name">
                Nama Lengkap <span class="required">*</span>
            </label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control-custom {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}"
                placeholder="cth: Budi Santoso"
                maxlength="100"
                autocomplete="off"
                required
            >
            @error('name')
                <div class="invalid-feedback-custom">
                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                </div>
            @enderror
            <p class="form-hint">Maksimal 100 karakter.</p>
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label class="form-label-custom" for="email">
                Email <span class="required">*</span>
            </label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control-custom {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ old('email') }}"
                placeholder="cth: budi@email.com"
                maxlength="150"
                autocomplete="off"
                required
            >
            @error('email')
                <div class="invalid-feedback-custom">
                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                </div>
            @enderror
            <p class="form-hint">
                Email ini digunakan untuk login. Maksimal 150 karakter.
                (Alamat email normal tidak pernah melebihi 254 karakter menurut standar RFC 5321,
                tapi 150 sudah sangat cukup untuk praktik sehari-hari.)
            </p>
        </div>

        <p class="form-section-title" style="margin-top: 28px;">Password</p>

        {{-- Password --}}
        <div class="form-group">
            <label class="form-label-custom" for="password">
                Password <span class="required">*</span>
            </label>
            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control-custom {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    placeholder="Min. 8 karakter"
                    autocomplete="new-password"
                    required
                    oninput="checkStrength(this.value)"
                >
                <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="password-strength" id="strengthBox" style="display:none;">
                <div class="strength-bar">
                    <div class="strength-fill" id="strengthFill"></div>
                </div>
                <span id="strengthLabel" style="color: var(--text-muted);"></span>
            </div>
            @error('password')
                <div class="invalid-feedback-custom">
                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                </div>
            @enderror
            <p class="form-hint">Minimal 8 karakter, harus ada huruf besar, huruf kecil, dan angka.</p>
        </div>

        {{-- Konfirmasi Password --}}
        <div class="form-group">
            <label class="form-label-custom" for="password_confirmation">
                Konfirmasi Password <span class="required">*</span>
            </label>
            <div class="password-wrapper">
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-control-custom"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required
                >
                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="form-actions">
            <button type="submit" class="btn-simpan">
                <i class="fas fa-user-plus"></i>
                Buat Akun Admin
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn-batal">
                <i class="fas fa-arrow-left"></i>
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    function togglePassword(fieldId, btn) {
        const field = document.getElementById(fieldId);
        const icon  = btn.querySelector('i');
        if (field.type === 'password') {
            field.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            field.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }

    function checkStrength(val) {
        const box   = document.getElementById('strengthBox');
        const fill  = document.getElementById('strengthFill');
        const label = document.getElementById('strengthLabel');

        if (!val) { box.style.display = 'none'; return; }
        box.style.display = 'block';

        let score = 0;
        if (val.length >= 8)           score++;
        if (/[A-Z]/.test(val))         score++;
        if (/[a-z]/.test(val))         score++;
        if (/[0-9]/.test(val))         score++;
        if (/[^A-Za-z0-9]/.test(val))  score++;

        const levels = [
            { pct: '20%', color: '#ef4444', text: 'Sangat lemah' },
            { pct: '40%', color: '#f97316', text: 'Lemah' },
            { pct: '60%', color: '#eab308', text: 'Cukup' },
            { pct: '80%', color: '#22c55e', text: 'Kuat' },
            { pct: '100%', color: '#16a34a', text: 'Sangat kuat' },
        ];

        const lvl = levels[Math.max(0, score - 1)];
        fill.style.width      = lvl.pct;
        fill.style.background = lvl.color;
        label.textContent     = lvl.text;
        label.style.color     = lvl.color;
    }
</script>
@endsection