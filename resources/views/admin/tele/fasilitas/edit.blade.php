@extends('layouts.admin')

@section('title')
    Edit Fasilitas - {{ $geositeTitle }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Edit Fasilitas</h3></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/admin/geosite/'.$geosite.'/fasilitas/'.$fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3"><label>Nama Fasilitas <span class="text-danger">*</span></label><input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $fasilitas->nama) }}" required>@error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>@error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $fasilitas->harga) }}">@error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    @if($fasilitas->gambar)
                        @if(\Illuminate\Support\Str::startsWith($fasilitas->gambar, 'data:'))
                            <img src="{{ $fasilitas->gambar }}" width="100" class="mb-2">
                        @else
                            <img src="{{ asset($fasilitas->gambar) }}" width="100" class="mb-2">
                        @endif
                    @endif
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('/admin/geosite/'.$geosite.'/fasilitas') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection