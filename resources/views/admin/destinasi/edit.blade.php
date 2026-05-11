@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="form-page">
    <a href="{{ route('admin.destinasi.index') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>

    <div class="form-card">
        <h2>Edit Destinasi</h2>
        <p>Silakan perbarui data destinasi wisata di bawah ini.</p>

        <form action="{{ route('admin.destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Destinasi <span class="required">*</span></label>
                <input type="text" name="nama_destinasi" class="form-control" value="{{ $destinasi->nama_destinasi }}" required>
            </div>

            <div class="form-group">
                <label>Kategori <span class="required">*</span></label>
                <select name="kategori" class="form-control" required>
                    {{-- Sesuaikan value dengan yang ada di database (huruf kecil) --}}
                    <option value="alam" {{ $destinasi->kategori == 'alam' ? 'selected' : '' }}>Destinasi Alam</option>
                    <option value="buatan" {{ $destinasi->kategori == 'buatan' ? 'selected' : '' }}>Destinasi Buatan</option>
                    <option value="budaya" {{ $destinasi->kategori == 'budaya' ? 'selected' : '' }}>Destinasi Budaya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi <span class="required">*</span></label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ $destinasi->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Gambar Destinasi</label>
                <input type="file" name="gambar" class="form-control mb-2">
                <small class="text-muted">Kosongkan jika tidak ingin ganti. Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $destinasi->gambar) }}" width="200" style="border-radius: 10px; border: 1px solid #e2e8f0; margin-top: 8px;">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('admin.destinasi.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection