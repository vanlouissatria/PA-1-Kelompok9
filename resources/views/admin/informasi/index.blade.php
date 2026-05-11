{{-- resources/views/admin/informasi/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Informasi')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
    }

    /* Judul Utama (Sesuai gaya Manajemen Destinasi) */
    .page-header-title {
        font-size: 2.5rem; 
        font-weight: 800;
        color: #000;
        margin-bottom: 10px;
        margin-top: 0;
    }

    /* Tombol Tambah di Bawah Judul */
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

    /* Table Header Style Abu-abu Modern */
    .table thead th {
        color: #8A92A6;
        font-size: 0.85rem;
        font-weight: 700;
        border-top: none;
        border-bottom: 1px solid #EEEEEE;
        text-transform: uppercase;
        padding-bottom: 15px;
        background-color: transparent !important;
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 600;
    }

    /* Hilangkan border berlebih pada tabel agar bersih */
    .table-bordered {
        border: none;
    }
</style>

<div class="container-fluid">
    {{-- 1. Judul Halaman --}}
    <h1 class="page-header-title">Manajemen Informasi</h1>

    {{-- 2. Tombol Tambah di Bawah Judul --}}
    <a href="{{ route('admin.informasi.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus me-2" style="font-size: 0.8rem;"></i> Tambah Informasi
    </a>

    {{-- 3. Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- 4. Area Tabel --}}
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="90">GAMBAR</th>
                    <th>INFORMASI</th>
                    <th width="100">URUTAN</th>
                    <th width="120">STATUS</th>
                    <th width="140">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                 width="60" height="60" 
                                 style="object-fit: cover; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        @else
                            <div class="bg-light text-muted d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px; border-radius: 8px;">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 700; color: #111; font-size: 1rem;">{{ $item->judul }}</div>
                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                    </td>
                    <td>
                        <span class="badge bg-primary px-3">#{{ $item->urutan }}</span>
                    </td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} badge-status">
                            {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="fas fa-database fa-2x mb-3 d-block"></i>
                        Belum ada data informasi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 5. Pagination --}}
    <div class="d-flex justify-content-end mt-4">
        {{ $informasi->links() }}
    </div>
</div>
@endsection