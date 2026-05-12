@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 style="font-weight: 800; color: #000;">Edit Galeri</h1>
    <hr>
    
    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $galeri->kategori }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ $galeri->gambar }}" style="width: 150px; border-radius: 8px; margin-bottom: 10px;">
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $galeri->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Galeri</button>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection