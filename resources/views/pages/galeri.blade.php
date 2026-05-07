@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5" style="font-family: serif;">Galeri Foto</h1>
    
    <div class="row">
        @forelse($galeriByKategori as $kategori => $items)
            @foreach($items as $item)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ route('galeri.gambar', $item->id) }}" 
                         class="card-img-top" 
                         alt="{{ $item->judul }}"
                         style="height: 250px; object-fit: cover;"
                         onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=Gagal+Memuat'">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">{{ $item->kategori }}</p>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada galeri yang diupload.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection