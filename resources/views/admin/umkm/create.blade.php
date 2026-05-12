@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah UMKM Baru</h3>
        </div>
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Usaha <span class="text-danger">*</span></label>
                            <input type="text" name="nama_usaha" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Pemilik <span class="text-danger">*</span></label>
                            <input type="text" name="pemilik" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Makanan & Minuman">Makanan & Minuman</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Kerajinan">Kerajinan</option>
                                <option value="Jasa">Jasa</option>
                                <option value="Elektronik">Elektronik</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>No. Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="no_telepon" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control-file" accept="image/*">
                        </div>
                        
                        <div class="form-group">
                            <label>Foto Utama</label>
                            <input type="file" name="foto_utama" class="form-control-file" accept="image/*">
                        </div>
                        
                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" name="website" class="form-control" placeholder="https://">
                        </div>
                        
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="-6.200000">
                        </div>
                        
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="106.816666">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection