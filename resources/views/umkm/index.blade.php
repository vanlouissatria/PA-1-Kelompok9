@extends('layouts.app')

@section('title', 'Daftar UMKM')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-5 fw-bold">UMKM Lokal</h1>
            <p class="lead">Temukan berbagai produk dan jasa dari UMKM terbaik di sekitar Anda</p>
        </div>
        <div class="col-md-4">
            <form action="{{ route('umkm.filter') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari UMKM..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter Kategori</h5>
                    <form action="{{ route('umkm.filter') }}" method="GET">
                        <select name="kategori" class="form-select mb-2">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->kategori }}" {{ request('kategori') == $kat->kategori ? 'selected' : '' }}>
                                    {{ $kat->kategori }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="row">
                @forelse($umkms as $umkm)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($umkm->foto_utama)
                                <img src="{{ Storage::url($umkm->foto_utama) }}" class="card-img-top" alt="{{ $umkm->nama_usaha }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-store fa-4x"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $umkm->nama_usaha }}</h5>
                                <p class="text-muted small">{{ $umkm->kategori }}</p>
                                <p class="card-text">{{ Str::limit($umkm->deskripsi, 100) }}</p>
                                <p class="card-text">
                                    <i class="fas fa-map-marker-alt"></i> {{ Str::limit($umkm->alamat, 50) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('umkm.show', $umkm->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">Belum ada UMKM yang terdaftar.</div>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-4">
                {{ $umkms->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection