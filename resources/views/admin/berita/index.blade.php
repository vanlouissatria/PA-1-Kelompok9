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

    /* Tombol Tambah di bawah judul (Memastikan berbentuk tombol kotak biru solid) */
    .btn-bi-tambah {
        background-color: var(--bi-blue) !important;
        color: white !important;
        border: none !important;
        padding: 8px 18px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        margin-bottom: 25px;
        font-size: 0.95rem;
        transition: all 0.2s;
    }

    .btn-bi-tambah:hover {
        background-color: #001f3f !important;
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
        box-shadow: none;
        background: transparent;
    }

    .card-body {
        padding: 0;
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
                    <th width="15%">STATUS</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{-- Langsung panggil string Base64 tanpa embel-embel asset atau storage --}}
                        @if($item->gambar)
                            <img src="{{ $item->gambar }}" 
                                width="50" 
                                height="50" 
                                style="object-fit: cover; border-radius: 4px;" 
                                alt="Gambar Berita">
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
                            {{-- Tombol Toggle Aktif/Mata Berfungsi Kembali --}}
                            <button type="button" 
                                    class="btn btn-sm toggle-status-btn" 
                                    data-id="{{ $item->id }}"
                                    data-status="{{ $item->status }}"
                                    title="{{ $item->status ? 'Nonaktifkan berita ini' : 'Aktifkan berita ini' }}"
                                    style="font-weight: 600; padding: 6px 12px; border-radius: 6px; display: inline-flex; align-items: center; background-color: {{ $item->status ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem;">
                                <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>

                            {{-- Tombol Edit Kuning --}}
                            <a href="{{ route('admin.berita.edit', $item->id) }}" 
                               class="btn btn-sm" 
                               title="Edit berita ini"
                               style="font-weight: 600; padding: 6px 12px; border-radius: 6px; display: inline-flex; align-items: center; background-color: #ffc107; color: #000; border: none; text-decoration: none; font-size: 0.85rem;">
                                 <i class="fas fa-pen"></i>
                            </a>

                            {{-- Tombol Hapus Merah Berbentuk Rapi --}}
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');" style="display: inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm" 
                                        title="Hapus berita ini"
                                        style="font-weight: 600; padding: 6px 12px; border-radius: 6px; display: inline-flex; align-items: center; background-color: #dc3545; color: white; border: none; cursor: pointer; font-size: 0.85rem;">
                                    <i class="fas fa-trash"></i>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const currentStatus = parseInt(this.getAttribute('data-status'));
            const btn = this;
            const icon = btn.querySelector('i');
            
            icon.className = 'fas fa-spinner fa-spin';
            btn.disabled = true;

            fetch(`{{ url('/admin/berita/toggle-status') }}/${itemId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const newStatus = data.status;
                    
                    if (newStatus) {
                        btn.style.backgroundColor = '#28a745';
                        btn.setAttribute('data-status', '1');
                        btn.setAttribute('title', 'Nonaktifkan berita ini');
                        icon.className = 'fas fa-eye';
                    } else {
                        btn.style.backgroundColor = '#6c757d';
                        btn.setAttribute('data-status', '0');
                        btn.setAttribute('title', 'Aktifkan berita ini');
                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = btn.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');
                    if (newStatus) {
                        statusCell.innerHTML = '<span class="badge bg-success badge-status">Aktif</span>';
                    } else {
                        statusCell.innerHTML = '<span class="badge bg-danger badge-status">Tidak</span>';
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
            })
            .finally(() => {
                btn.disabled = false;
            });
        });
    });
});
</script>
@endsection