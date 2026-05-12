@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit UMKM: {{ $umkm->nama_usaha }}</h3>
        </div>
        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" name="nama_usaha" class="form-control" value="{{ $umkm->nama_usaha }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Pemilik</label>
                            <input type="text" name="pemilik" class="form-control" value="{{ $umkm->pemilik }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="Makanan & Minuman" {{ $umkm->kategori == 'Makanan & Minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                                <option value="Fashion" {{ $umkm->kategori == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="Kerajinan" {{ $umkm->kategori == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                <option value="Jasa" {{ $umkm->kategori == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                <option value="Elektronik" {{ $umkm->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" value="{{ $umkm->no_telepon }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $umkm->email }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            @if($umkm->logo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($umkm->logo) }}" width="100">
                                </div>
                            @endif
                            <input type="file" name="logo" class="form-control-file" accept="image/*">
                        </div>
                        
                        <div class="form-group">
                            <label>Foto Utama</label>
                            @if($umkm->foto_utama)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($umkm->foto_utama) }}" width="200">
                                </div>
                            @endif
                            <input type="file" name="foto_utama" class="form-control-file" accept="image/*">
                        </div>
                        
                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" name="website" class="form-control" value="{{ $umkm->website }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" value="{{ $umkm->latitude }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" value="{{ $umkm->longitude }}">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $umkm->alamat }}</textarea>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required>{{ $umkm->deskripsi }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection