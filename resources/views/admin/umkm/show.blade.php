@extends('layouts.app')

@section('title', $umkm->nama_usaha)

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('umkm.index') }}">UMKM</a></li>
                    <li class="breadcrumb-item active">{{ $umkm->nama_usaha }}</li>
                </ol>
            </nav>
            
            <div class="card shadow-sm mb-4">
                @if($umkm->foto_utama)
                    <img src="{{ Storage::url($umkm->foto_utama) }}" class="card-img-top" alt="{{ $umkm->nama_usaha }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title h2 mb-3">{{ $umkm->nama_usaha }}</h1>
                    <span class="badge bg-primary mb-3">{{ $umkm->kategori }}</span>
                    <span class="badge bg-secondary mb-3"><i class="fas fa-eye"></i> {{ $umkm->views }} views</span>
                    
                    <h5>Deskripsi</h5>
                    <p>{{ $umkm->deskripsi }}</p>
                    
                    <hr>
                    
                    <h5>Informasi Kontak</h5>
                    <p><i class="fas fa-user"></i> Pemilik: {{ $umkm->pemilik }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> Alamat: {{ $umkm->alamat }}</p>
                    <p><i class="fas fa-phone"></i> Telepon: {{ $umkm->no_telepon }}</p>
                    @if($umkm->email)
                        <p><i class="fas fa-envelope"></i> Email: {{ $umkm->email }}</p>
                    @endif
                    @if($umkm->website)
                        <p><i class="fas fa-globe"></i> Website: <a href="{{ $umkm->website }}" target="_blank">{{ $umkm->website }}</a></p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Hubungi Kami</h5>
                </div>
                <div class="card-body">
                    <a href="https://wa.me/{{ $umkm->no_telepon }}" class="btn btn-success w-100 mb-2" target="_blank">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="tel:{{ $umkm->no_telepon }}" class="btn btn-info w-100">
                        <i class="fas fa-phone"></i> Telepon
                    </a>
                </div>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">UMKM Lainnya</h5>
                </div>
                <div class="card-body">
                    @foreach($umkmTerbaru as $item)
                        <div class="mb-3">
                            <a href="{{ route('umkm.show', $item->id) }}" class="text-decoration-none">
                                <h6>{{ $item->nama_usaha }}</h6>
                                <small class="text-muted">{{ $item->kategori }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection