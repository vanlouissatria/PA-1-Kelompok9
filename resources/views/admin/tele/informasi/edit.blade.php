@extends('layouts.admin')

@section('title', 'Edit Informasi - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Informasi</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$informasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label>Judul Informasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $informasi->judul) }}" required>
                </div>
                
                <div class="mb-3">
                    <label>Isi Konten <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control" rows="10" required>{{ old('isi', $informasi->isi) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    @if($informasi->gambar && file_exists(public_path($informasi->gambar)))
                        <img src="{{ asset($informasi->gambar) }}" width="150" class="mb-2">
                        <br>
                    @endif
                    <label>Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('/admin/geosite/'.$geosite.'/informasi') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection