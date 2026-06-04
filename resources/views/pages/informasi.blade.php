@extends('layouts.app')

@section('title', 'Terbentuknya Danau Toba - GeoToba')

@section('content')
<style>
    /* MAIN WRAPPER FOR FOOTER PUSH */
    .page-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* HERO SECTION */
    .information-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .information-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .information-hero .container {
        position: relative;
        z-index: 2;
    }

    .information-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 2px;
    }

    .information-hero p {
        color: #c6a43b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* MAIN CONTENT SECTION */
    .info-showcase-section {
        padding: 80px 0 100px;
        background: #f4f8fb;
        flex: 1;
    }

    .info-showcase-container {
        max-width: 1200px;
        margin: auto;
        padding: 0 24px;
    }

    /* TATA LETAK ROW BARIS */
    .info-showcase-row {
        display: flex;
        align-items: flex-start; /* Menggunakan flex-start agar saat gambar mengecil, baris teks tetap rapi */
        gap: 60px;
        margin-bottom: 100px;
    }

    /* Efek Selang-seling Layout (Genap: Gambar Kanan, Teks Kiri) */
    .info-showcase-row:nth-child(even) {
        flex-direction: row-reverse;
    }

    /* BLOK GAMBAR BARIS */
    .info-image-block {
        flex: 1;
        width: 100%;
    }

    .info-image-wrapper {
        width: 100%;
        height: auto; /* MENGUBAH JADI AUTO: Menghapus sisa ruang kosong di atas/bawah */
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 31, 63, 0.08);
        background: transparent; /* Menghilangkan latar putih agar tidak ada sisa kotak bingkai */
    }

    .info-image-wrapper img {
        width: 100%;
        height: auto; /* Memastikan gambar melebar penuh mengikuti kolom secara proporsional */
        display: block;
        object-fit: cover; /* Memaksa komponen visual mengisi ruang tanpa distorsi gepeng */
        border-radius: 20px;
    }

    /* BLOK TEKS & DETAIL */
    .info-content-block {
        flex: 1.3;
        width: 100%;
    }

    /* Label Urutan Atas */
    .info-meta-index {
        font-size: 0.9rem;
        font-weight: 700;
        color: #c6a43b;
        letter-spacing: 2px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-meta-index::after {
        content: '';
        display: inline-block;
        width: 40px;
        height: 1px;
        background-color: #c6a43b;
    }

    /* Judul Informasi */
    .info-showcase-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    /* Sub-informasi Kategori */
    .info-sub-label {
        font-size: 0.75rem;
        color: #7a8b9e;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 25px;
        font-weight: 600;
    }

    /* Deskripsi / Full Konten Teks Informasi */
    .info-full-content {
        font-size: 1.05rem;
        color: #334155;
        line-height: 1.8;
        text-align: justify;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }

    .info-full-content p {
        margin-bottom: 1.5rem;
    }

    /* EMPTY STATE */
    .empty-info-box {
        text-align: center;
        background: white;
        padding: 80px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        width: 100%;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .info-showcase-row, .info-showcase-row:nth-child(even) {
            flex-direction: column;
            gap: 35px;
            margin-bottom: 70px;
        }
        .info-showcase-title {
            font-size: 1.8rem;
        }
    }
</style>

<div class="page-wrapper">
    <section class="information-hero">
        <div class="container">
            <p>WARISAN GEOLOGI KELAS DUNIA</p>
            <h1>Terbentuknya Danau Toba</h1>
        </div>
    </section>

    <section class="info-showcase-section">
        <div class="info-showcase-container">
            
            @forelse($informasi as $index => $info)
                <div class="info-showcase-row">
                    
                    <div class="info-image-block">
                        <div class="info-image-wrapper">
                            @if($info->gambar && file_exists(public_path($info->gambar)))
                                <img src="{{ image_url($info->gambar) }}" alt="{{ $info->judul }}" loading="lazy">
                            @else
                                <img src="https://placehold.co/800x600?text=GeoToba+Informasi" alt="Placeholder">
                            @endif
                        </div>
                    </div>

                    <div class="info-content-block">
                        <div class="info-meta-index">
                            {{ sprintf('%02d', ($index + 1)) }} — INFORMASI
                        </div>
                        
                        <h2 class="info-showcase-title">{{ $info->judul }}</h2>
                        
                        <div class="info-sub-label">
                            <i class="fas fa-history"></i> Sejarah Toba
                            <span class="mx-2">|</span>
                            <i class="fas fa-graduation-cap"></i> Edukasi
                        </div>

                        <div class="info-full-content">
                            {!! $info->konten !!}
                        </div>
                    </div>

                </div>
            @empty
                <div class="empty-info-box">
                    <i class="fas fa-file-alt fa-3x text-muted d-block mb-3"></i>
                    <h5>Belum Ada Informasi</h5>
                    <p class="text-muted">Data mengenai edukasi pembentukan Danau Toba belum tersedia saat ini.</p>
                </div>
            @endforelse

            @if(method_exists($informasi, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $informasi->links() }}
                </div>
            @endif

        </div>
    </section>
</div>
@endsection