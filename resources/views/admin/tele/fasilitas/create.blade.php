@extends('layouts.admin')

@section('title')
    Tambah Fasilitas - {{ $geositeTitle }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Tambah Fasilitas Baru</h3></div>
        <div class="card-body">
            <form action="{{ url('/admin/geosite/'.$geosite.'/fasilitas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Destinasi <span class="text-danger">*</span></label>
                    <select name="geosite" class="form-control @error('geosite') is-invalid @enderror" required>
                        @foreach($geositeOptions as $value => $label)
                            <option value="{{ $value }}" {{ old('geosite', $geosite) == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('geosite')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3"><label>Nama Fasilitas <span class="text-danger">*</span></label><input type="text" name="nama" class="form-control" required></div>
                <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="3"></textarea></div>
                <div class="mb-3"><label>Harga (Opsional)</label><input type="number" name="harga" class="form-control" placeholder="0"></div>
                <div class="mb-3"><label>Gambar</label><input type="file" name="gambar" class="form-control" accept="image/*"></div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/admin/geosite/'.$geosite.'/fasilitas') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection