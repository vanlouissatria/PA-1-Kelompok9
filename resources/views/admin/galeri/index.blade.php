@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- 1. Judul Besar Paling Atas --}}
    <h1 style="font-size: 2.5rem; font-weight: 800; color: #000; margin-bottom: 10px;">Manajemen Galeri</h1>

    {{-- 2. Tombol Tambah --}}
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.galeri.create') }}" 
           style="background-color: #002F5F; color: white !important; padding: 10px 20px; border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center;">
            <i class="fas fa-plus me-2"></i> Tambah Galeri
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 3. Tabel Manajemen --}}
    <div class="table-responsive" style="background: white; padding: 20px; border-radius: 10px; shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <table class="table" style="width: 100%; vertical-align: middle;">
            <thead>
                <tr style="color: #8A92A6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; border-bottom: 2px solid #f0f2f5;">
                    <th width="5%">NO</th>
                    <th width="15%">GAMBAR</th>
                    <th width="30%">JUDUL</th>
                    <th width="20%">KATEGORI</th>
                    <th width="15%">STATUS</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                <tr style="border-bottom: 1px solid #f0f2f5;">
                    <td style="font-weight: 600; color: #444;">{{ $galeris->firstItem() + $index }}</td>
                    <td>
                        @if($galeri->gambar)
                            <img src="{{ $galeri->gambar }}" alt="{{ $galeri->judul }}" 
                                 style="width: 100px; height: 70px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                        @else
                            <div style="width: 100px; height: 70px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: #2D3748;">{{ $galeri->judul }}</td>
                    <td>
                        <span class="badge bg-light text-dark" style="padding: 6px 12px; border-radius: 50px; font-weight: 500; border: 1px solid #e2e8f0;">
                            {{ strtoupper($galeri->kategori) }}
                        </span>
                    </td>
                    <td>
                        @if($galeri->status)
                            <span class="badge bg-success" style="border-radius: 50px;">Aktif</span>
                        @else
                            <span class="badge bg-secondary" style="border-radius: 50px;">Draft</span>
                        @endif
                    </td>
                    <td>
                        {{-- PEMBUNGKUS TOMBOL AGAR RAPI --}}
                        <div class="d-flex align-items: center; gap: 8px;">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" 
                               class="btn btn-sm btn-warning" 
                               style="color: white !important; font-weight: 600; padding: 6px 15px; border-radius: 6px; display: inline-flex; align-items: center;">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                  style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        style="font-weight: 600; padding: 6px 15px; border-radius: 6px; display: inline-flex; align-items: center;">
                                    <i class="fas fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 40px 0; color: #A0AEC0; text-align: center; font-style: italic;">
                        <i class="fas fa-folder-open d-block mb-2" style="font-size: 2rem;"></i>
                        Belum ada data galeri yang tersedia.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 4. Pagination --}}
    <div class="d-flex justify-content-between align-items: center; mt-4">
        <p class="text-muted small">Menampilkan {{ $galeris->firstItem() }} sampai {{ $galeris->lastItem() }} dari {{ $galeris->total() }} data</p>
        <div>
            {{ $galeris->links() }}
        </div>
    </div>
</div>

{{-- CSS Tambahan untuk merapikan pagination Laravel --}}
<style>
    .pagination { margin-bottom: 0; }
    .page-link { color: #002F5F; border-radius: 5px; margin: 0 2px; }
    .page-item.active .page-link { background-color: #002F5F; border-color: #002F5F; }
    .table thead th { border-top: none; }
    .btn:hover { opacity: 0.9; transform: translateY(-1px); transition: all 0.2s; }
</style>
@endsection