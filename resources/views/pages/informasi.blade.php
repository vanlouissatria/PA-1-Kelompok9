@extends('layouts.app')

@section('content')
<style>
    /* CSS Anda tetap sama sesuai permintaan (tidak diubah) */
    .informasi-header {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), 
                    url('{{ asset('image/efrata/tobaa.jpg') }}'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 120px 0;
        text-align: center;
        color: white;
        margin-bottom: 50px;
    }
    
    .informasi-header h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 4.5rem;
        font-weight: 700;
        text-shadow: 3px 3px 15px rgba(0,0,0,0.7);
        letter-spacing: 1px;
    }

    .informasi-header p {
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 1rem;
        color: #c6a43b; 
        font-weight: 600;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    .header-line {
        width: 80px;
        height: 4px;
        background-color: #c6a43b;
        margin: 20px auto 0;
        border-radius: 10px;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        transition: all 0.4s ease;
        margin-bottom: 60px;
    }

    .info-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
    }

    .img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        background-color: #f1f1f1;
        height: 400px;
    }

    .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .info-card:hover .img-wrapper img {
        transform: scale(1.08);
    }

    .info-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 20px;
    }

    .content-text {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        color: #4a5568;
        line-height: 1.8;
        text-align: justify;
    }

    body {
        background-color: #f8fafc;
    }

    @media (max-width: 768px) {
        .img-wrapper { height: 250px; }
        .informasi-header h1 { font-size: 2.5rem; }
    }
</style>

<div class="informasi-header">
    <div class="container">
        <p>WARISAN GEOLOGI KELAS DUNIA</p>
        <h1>Terbentuknya Danau Toba</h1>
        <div class="header-line"></div>
    </div>
</div>

<div class="container">
    @foreach($informasi as $index => $info)
        <div class="info-card">
            <div class="row align-items-center">
                
                @if($index % 2 == 0)
                    {{-- Layout: Gambar Kiri --}}
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="img-wrapper">
                            @if($info->gambar && file_exists(public_path($info->gambar)))
                                <img src="{{ asset($info->gambar) }}" 
                                     alt="{{ $info->judul }}" 
                                     loading="lazy">
                            @else
                                <img src="https://placehold.co/800x600?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! nl2br(e($info->konten)) !!}
                        </div>
                    </div>
                @else
                    {{-- Layout: Gambar Kanan --}}
                    <div class="col-lg-6 order-2 order-lg-1 pe-lg-5">
                        <h2 class="info-title">{{ $info->judul }}</h2>
                        <div class="content-text">
                            {!! nl2br(e($info->konten)) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="img-wrapper">
                            @if($info->gambar && file_exists(public_path($info->gambar)))
                                <img src="{{ asset($info->gambar) }}" 
                                     alt="{{ $info->judul }}" 
                                     loading="lazy">
                            @else
                                <img src="https://placehold.co/800x600?text=GeoToba" alt="Placeholder">
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection