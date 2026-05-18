@extends('layouts.admin')

@section('title', 'Edit Fasilitas - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Edit Fasilitas</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.tele.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3"><label>Nama Fasilitas <span class="text-danger">*</span></label><input type="text" name="nama" class="form-control" value="{{ $fasilitas->nama }}" required></div>
                <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="3">{{ $fasilitas->deskripsi }}</textarea></div>
                <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" value="{{ $fasilitas->harga }}"></div>
                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    @if($fasilitas->gambar)<img src="{{ asset('storage/'.$fasilitas->gambar) }}" width="100" class="mb-2">@endif
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.tele.fasilitas') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection