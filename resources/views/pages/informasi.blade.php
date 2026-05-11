@extends('layouts.app')

@section('content')
<style>
    /* 1. Header dengan Background Gambar */
    .informasi-header {
        /* GANTI 'nama-foto-anda.jpg' dengan nama file foto terbentuknya danau toba yang Anda punya */
        background: linear-gradient(rgba(0, 20, 40, 0.65), rgba(0, 20, 40, 0.65)), 
                    url('{{ asset('images/bg-toba.jpg') }}'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Memberikan efek parallax saat di-scroll */
        padding: 100px 0;
        text-align: center;
        color: white;
        margin-bottom: 50px;
    }
    
    .informasi-header p {
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 15px;
        color: #c6a43b; /* Warna emas agar kontras dengan foto */
    }
    
    .informasi-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.8rem;
        font-weight: 700;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5); /* Agar teks tetap terbaca meski background terang */
    }

    .header-line {
        width: 80px;
        height: 4px;
        background-color: #c6a43b;
        margin: 20px auto 0;
        border-radius: 2px;
    }

    /* ... sisanya (info-card, img-wrapper, dll) tetap sama seperti sebelumnya ... */
</style>

<div class="informasi-header">
    <div class="container">
        <p>WARISAN GEOLOGI KELAS DUNIA</p>
        <h1>Terbentuknya Danau Toba</h1>
        <div class="header-line"></div>
    </div>
</div>

<div class="container py-4">
    @foreach($informasiList as $index => $info)
        <div class="info-card mb-5">
            <div class="row align-items-center">
                @if($index % 2 == 0)
                    <div class="col-lg-5">
                        <div class="img-wrapper">
                            @if($info->gambar)
                                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}">
                            @else
                                <img src="https://placehold.co/600x400?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                        <p class="text-muted small mt-3 text-center italic">~ {{ $info->judul }}</p>
                    </div>
                    <div class="col-lg-7 ps-lg-5">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! $info->konten !!}
                        </div>
                    </div>
                @else
                    <div class="col-lg-7 pe-lg-5 order-2 order-lg-1">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! $info->konten !!}
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <div class="img-wrapper">
                            @if($info->gambar)
                                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}">
                            @else
                                <img src="https://placehold.co/600x400?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                        <p class="text-muted small mt-3 text-center italic">~ {{ $info->judul }}</p>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection