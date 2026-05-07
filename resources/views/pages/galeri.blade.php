@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* ... semua style Anda tetap sama ... */
    /* Saya tidak mengubah style, hanya bagian PHP dan img */
</style>

<!-- Audio Background -->
<audio id="bgMusic" loop preload="auto">
    <source src="{{ asset('audio/GONDANG.mp4') }}" type="audio/mpeg">
</audio>

<!-- Music Control Button -->
<div class="music-control" id="musicControl">
    <i class="fas fa-music" id="musicIcon"></i>
</div>

<div class="gallery-wrapper">
    <h1 style="font-family: serif; font-size: 3.5rem;">Explore...</h1>

    <div class="stack-area">
        @forelse($galeriByKategori as $kategori => $items)
            @foreach($items as $item)
                {{-- 
                    Gunakan route gambar untuk data binary
                    Jika suatu saat Anda beralih ke storage, fallback ke asset
                --}}
                @php
                    // Cek apakah kolom gambar berisi binary (biasanya tidak dimulai dengan 'http' atau 'storage/')
                    $isBinary = !is_string($item->gambar) || (strpos($item->gambar, 'storage/') === false && strpos($item->gambar, 'http') === false);
                @endphp

                <div class="card-item" 
                     onclick="openPhoto('{{ route('galeri.gambar', $item->id) }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->deskripsi) }}', '{{ strtoupper($kategori) }}')">
                    <img src="{{ route('galeri.gambar', $item->id) }}" 
                         alt="{{ $item->judul }}"
                         loading="lazy"
                         onerror="this.src='https://via.placeholder.com/300x500?text=Gambar+Error'">
                </div>
            @endforeach
        @empty
            <div class="alert alert-info">Belum ada galeri. Silakan upload melalui admin.</div>
        @endforelse
    </div>
</div>

<!-- Modal (sama seperti sebelumnya, tidak perlu diubah) -->
<div id="pModal" class="modal-overlay" onclick="closePhoto()">
    <div class="close-btn">&times;</div>
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-img-part"><img src="" id="mImg"></div>
        <div class="modal-text-part">
            <small id="mTag" style="color: #c6a43b; letter-spacing: 2px;"></small>
            <h2 id="mTitle" style="font-size: 2rem; margin: 10px 0;"></h2>
            <p id="mDesc" style="color: #bbb; line-height: 1.6;"></p>
        </div>
    </div>
</div>

<script>
    // ========== MODAL FUNCTIONS (tidak perlu diubah) ==========
    function openPhoto(src, title, desc, tag) {
        // ... fungsi Anda tetap sama (tanpa memutar musik otomatis, atau biarkan)
        document.getElementById('mImg').src = src;
        document.getElementById('mTitle').innerText = title;
        document.getElementById('mTag').innerText = tag;
        document.getElementById('mDesc').innerText = desc || 'Tidak ada deskripsi.';
        document.getElementById('pModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closePhoto() {
        document.getElementById('pModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // ... sisanya tetap (audio control, dll)
</script>
@endsection