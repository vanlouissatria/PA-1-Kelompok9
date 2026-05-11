@extends('layouts.app')

@section('content')
<div class="py-5 text-center" style="background-color: #f8f9fa;">
    <p class="text-uppercase mb-2" style="letter-spacing: 3px; font-size: 0.9rem; color: #6c757d;">WARISAN GEOLOGI KELAS DUNIA</p>
    <h1 class="display-5 fw-bold" style="color: #1a3a5f; font-family: 'Serif', 'Times New Roman';">Terbentuknya Danau Toba</h1>
    <div class="mx-auto" style="width: 50px; height: 2px; background-color: #d4a373; margin-top: 10px;"></div>
</div>

<div class="container py-5">
    @foreach($informasiList as $index => $info)
        <div class="row align-items-start mb-5 pb-4">
            {{-- Jika Index Genap: Teks di Kanan, Gambar di Kiri (Atau sebaliknya sesuai selera) --}}
            @if($index % 2 == 0)
                <div class="col-lg-6 mb-4">
                    @if($info->gambar)
                        <img src="{{ asset('storage/' . $info->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $info->judul }}" style="width: 100%; max-height: 400px; object-fit: cover;">
                        <p class="text-muted small mt-2 italic">~ {{ $info->judul }}</p>
                    @endif
                </div>
                <div class="col-lg-6 px-lg-4">
                    <div class="text-muted lh-lg fs-5" style="text-align: justify; color: #33475b !important;">
                        {!! $info->konten !!}
                    </div>
                </div>
            @else
                {{-- Index Ganjil: Kebalikan layout agar terlihat dinamis --}}
                <div class="col-lg-6 order-lg-2 mb-4">
                    @if($info->gambar)
                        <img src="{{ asset('storage/' . $info->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $info->judul }}" style="width: 100%; max-height: 400px; object-fit: cover;">
                        <p class="text-muted small mt-2 italic">~ {{ $info->judul }}</p>
                    @endif
                </div>
                <div class="col-lg-6 order-lg-1 px-lg-4">
                    <div class="text-muted lh-lg fs-5" style="text-align: justify; color: #33475b !important;">
                        {!! $info->konten !!}
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>

<style>
    /* Menyesuaikan font agar mirip dengan gaya Geosite */
    body {
        background-color: #ffffff;
    }
    h1 {
        font-family: 'Playfair Display', serif;
    }
    .text-muted {
        font-family: 'Inter', sans-serif;
    }
    /* Menghapus margin bawah pada paragraf terakhir dari konten agar spacing rapi */
    .text-muted p:last-child {
        margin-bottom: 0;
    }
</style>
@endsection