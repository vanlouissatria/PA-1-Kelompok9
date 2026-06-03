{{-- resources/views/admin/tele/galeri/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
        --bi-blue-dark: #001f3f;
        --bi-yellow: #f59e0b;
        --bi-red: #ef4444;
        --text-heading: #111827;
        --text-muted: #6b7280;
        --surface-bg: #ffffff;
        --border-light: #e5e7eb;
    }

    .page-header-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: var(--text-heading);
        margin-bottom: 1rem;
        margin-top: 0;
    }

    .page-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.75rem;
        flex-wrap: wrap;
    }

    .btn-bi-tambah {
        background-color: var(--bi-blue) !important;
        color: white !important;
        border: none !important;
        padding: 0.95rem 1.4rem;
        border-radius: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none !important;
        box-shadow: 0 16px 32px rgba(0, 47, 95, 0.12);
        transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .btn-bi-tambah:hover {
        background-color: var(--bi-blue-dark) !important;
        transform: translateY(-1px);
    }

    .admin-card {
        background: transparent;
        border: none;
        box-shadow: none;
        padding: 0;
    }

    .table thead th {
        color: var(--text-muted);
        font-size: 0.78rem;
        font-weight: 700;
        border-top: none;
        border-bottom: 1px solid rgba(229, 231, 235, 0.9);
        text-transform: uppercase;
        padding: 1rem 0.75rem;
        background: transparent;
    }

    .table td {
        vertical-align: middle;
        padding: 1rem 0.75rem;
        border-color: rgba(229, 231, 235, 0.9);
    }

    .table tbody tr:hover {
        background: rgba(229, 231, 235, 0.3);
    }

    .thumbnail {
        width: 90px;
        height: 70px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
    }

    .placeholder-img {
        width: 90px;
        height: 70px;
        border-radius: 16px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 0.9rem;
    }

    .badge-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
        background: #f3f4f6;
        color: var(--text-heading);
        font-size: 0.82rem;
        font-weight: 600;
        border: 1px solid #e5e7eb;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .status-active {
        background: rgba(16, 185, 129, 0.12);
        color: #065f46;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }

    .status-inactive {
        background: rgba(107, 114, 128, 0.12);
        color: #374151;
        border: 1px solid rgba(107, 114, 128, 0.25);
    }

    .actions-group {
        display: flex !important;
        flex-direction: row !important;
        align-items: center;
        gap: 0.5rem;
    }

    .action-btn {
        width: 40px !important;
        height: 40px !important;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white !important;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, opacity 0.2s ease;
        text-decoration: none;
        font-size: 0.85rem;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        opacity: 0.95;
    }

    .btn-edit {
        background: #f59e0b !important;
        color: #000 !important;
    }

    .btn-delete {
        background: #ef4444 !important;
    }

    .text-secondary {
        color: var(--text-muted);
    }
</style>

{{-- Header Halaman --}}
<div class="page-actions">
    <div>
        <h1 class="page-header-title">Manajemen Galeri</h1>
    </div>
    <a href="{{ route('admin.geosite.galeri.create', ['geosite' => 'tele']) }}" class="btn-bi-tambah">
        <i class="fas fa-plus"></i>
        Tambah Galeri
    </a>
</div>

{{-- Alert Success --}}
@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">
        {{ session('success') }}
    </div>
@endif

{{-- Konten Utama --}}
<div class="admin-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="12%">GAMBAR</th>
                    <th width="40%">JUDUL</th>
                    <th width="18%">KATEGORI</th>
                    <th width="15%">STATUS</th>
                    <th width="10%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $index => $item)
                <tr>
                    {{-- Nomor --}}
                    <td>{{ $galeri->firstItem() + $index }}</td>
                    
                    {{-- Gambar --}}
                    <td>
                        @if($item->gambar)
                            {{-- Menggunakan asset($item->gambar) agar sama dengan halaman utama --}}
                            <img src="{{ asset($item->gambar) }}" alt="Galeri" class="thumbnail" onerror="this.onerror=null; this.src='{{ asset('storage/' . $item->gambar) }}';">
                        @else
                            <div class="placeholder-img">No Image</div>
                        @endif
                    </td>

                    {{-- Judul --}}
                    <td>
                        <div style="font-weight: 700; color: var(--text-heading);">{{ $item->judul }}</div>
                    </td>

                    {{-- Kategori --}}
                    <td>
                        <span class="badge-chip">
                            {{ ucfirst($item->kategori) }}
                        </span>
                    </td>

                    {{-- Status --}}
                    <td>
                        <span class="badge-status {{ $item->status ? 'status-active' : 'status-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    {{-- Aksi --}}
                    <td style="white-space: nowrap; width: 1%;">
                        <div class="actions-group">
                            {{-- Edit --}}
                            <a href="{{ route('admin.geosite.galeri.edit', ['geosite' => 'tele', 'id' => $item->id]) }}" 
                               class="action-btn btn-edit" 
                               title="Edit"
                               style="margin: 0;">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            {{-- Hapus --}}
                            <form action="{{ route('admin.geosite.galeri.destroy', ['geosite' => 'tele', 'id' => $item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');" class="d-inline-block" style="margin: 0; padding: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" title="Hapus" style="margin: 0;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-secondary">
                        Data galeri untuk Tele masih kosong. <a href="{{ route('admin.geosite.galeri.create', ['geosite' => 'tele']) }}" class="text-decoration-none" style="color: var(--bi-blue);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $galeri->links() }}
    </div>
</div>
@endsection