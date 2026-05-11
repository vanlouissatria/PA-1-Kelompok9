{{-- resources/views/admin/berita/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
    }

    /* Judul Utama yang sangat besar dan tebal */
    .page-header-title {
        font-size: 2.5rem; 
        font-weight: 800;
        color: #000;
        margin-bottom: 10px;
        margin-top: 0;
    }

    /* Tombol Tambah di bawah judul (Persis Destinasi) */
    .btn-bi-tambah {
        background-color: var(--bi-blue);
        color: white !important;
        border: none;
        padding: 8px 18px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        margin-bottom: 25px;
        font-size: 0.95rem;
        transition: all 0.2s;
    }

    .btn-bi-tambah:hover {
        background-color: #001f3f;
        transform: translateY(-1px);
    }

    /* Style Tabel Header Abu-abu Modern */
    .table thead th {
        color: #8A92A6;
        font-size: 0.85rem;
        font-weight: 700;
        border-top: none;
        border-bottom: 1px solid #EEEEEE;
        text-transform: uppercase;
        padding-bottom: 15px;
        background-color: transparent;
    }

    .card {
        border: none;
        box-shadow: none; /* Menghilangkan shadow agar bersih seperti destinasi */
        background: transparent;
    }

    .card-body {
        padding: 0; /* Mengeluarkan tabel dari padding card */
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 600;
    }
</style>

<div class="container-fluid">
    {{-- 1. Judul Halaman --}}
    <h1 class="page-header-title">Manajemen Berita</h1>

    {{-- 2. Tombol Tambah di Bawah Judul --}}
    <a href="{{ route('admin.berita.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus me-2" style="font-size: 0.8rem;"></i> Tambah Berita
    </a>

    {{-- 3. Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- 4. Area Tabel --}}
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="10%">GAMBAR</th>
                    <th width="40%">JUDUL</th>
                    <th width="15%">PENULIS</th>
                    <th width="10%">STATUS</th>
                    <th width="20%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" width="50" height="50" style="object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 50px; height: 50px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 4px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 600; color: #111;">{{ $item->judul }}</div>
                    </td>
                    <td>{{ $item->penulis ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} badge-status">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        Data masih kosong.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $berita->links() }}
    </div>
</div>
@endsection