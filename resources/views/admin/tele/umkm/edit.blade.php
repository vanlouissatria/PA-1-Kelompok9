@extends('layouts.admin')

@section('title', 'Edit UMKM - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit UMKM</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/geosite/'.$geosite.'/umkm/'.$umkm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama UMKM <span class="text-danger">*</span></label>
                        <input type="text" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                        @error('nama_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label>Pemilik <span class="text-danger">*</span></label>
                        <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" value="{{ old('pemilik', $umkm->pemilik) }}" required>
                        @error('pemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $umkm->no_telepon) }}" required>
                        @error('no_telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                            <option value="Kuliner" {{ old('kategori', $umkm->kategori) == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                            <option value="Fashion" {{ old('kategori', $umkm->kategori) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="Kerajinan" {{ old('kategori', $umkm->kategori) == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                            <option value="Pertanian" {{ old('kategori', $umkm->kategori) == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                            <option value="Jasa" {{ old('kategori', $umkm->kategori) == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            <option value="Lainnya" {{ old('kategori', $umkm->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2">{{ old('alamat', $umkm->alamat) }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label>Foto Saat Ini</label><br>
                        @if($umkm->foto_utama)
                            @php
                                $fotoPath = $umkm->foto_utama;
                                if(str_starts_with($fotoPath, 'image/')) {
                                    $fotoUrl = asset($fotoPath);
                                } else {
                                    $fotoUrl = asset('storage/' . $fotoPath);
                                }
                            @endphp
                            <img src="{{ $fotoUrl }}" width="100" class="mb-2" style="border-radius: 8px;">
                            <br>
                        @endif
                        <label>Ganti Foto (Opsional)</label>
                        <input type="file" name="foto_utama" class="form-control @error('foto_utama') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                        @error('foto_utama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('/admin/geosite/'.$geosite.'/umkm') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection