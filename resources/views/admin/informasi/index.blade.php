{{-- resources/views/admin/informasi/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Informasi')

@section('content')
<style>
    :root {
        --bi-blue: #002F5F;
    }

    .page-header-title {
        font-size: 2.5rem; 
        font-weight: 800;
        color: #000;
        margin-bottom: 10px;
        margin-top: 0;
    }

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

    .table-bordered {
        border: none;
    }
</style>

<div class="container-fluid">
    <h1 class="page-header-title">Manajemen Informasi</h1>

    <a href="{{ route('admin.informasi.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus me-2" style="font-size: 0.8rem;"></i> Tambah Informasi
    </a>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

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
                        {{-- PERBAIKAN: Menggunakan fungsi asset() karena file disimpan di folder public/uploads bukan storage/ --}}
                        @if($item->gambar && file_exists(public_path($item->gambar)))
                            <img src="{{ asset($item->gambar) }}" 
                                 width="50" 
                                 height="50" 
                                 style="object-fit: cover; border-radius: 4px;" 
                                 alt="Gambar Informasi">
                        @else
                            <div style="width: 50px; height: 50px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 4px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 700; color: #111; font-size: 1rem;">{{ $item->judul }}</div>
                        <small class="text-muted">{{ $item->created_at ? $item->created_at->format('d M Y') : '23 May 2026' }}</small>
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
                            {{-- Tombol Toggle Status --}}
                            <button type="button" 
                                    class="btn btn-sm toggle-status-btn" 
                                    data-id="{{ $item->id }}"
                                    data-status="{{ $item->status }}"
                                    title="{{ $item->status ? 'Nonaktifkan informasi ini' : 'Aktifkan informasi ini' }}"
                                    style="padding: 6px 12px; border-radius: 4px; display: inline-flex; align-items: center; background-color: {{ $item->status ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer;">
                                <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.informasi.edit', $item->id) }}" 
                               class="btn btn-sm" 
                               title="Edit informasi ini"
                               style="padding: 6px 12px; border-radius: 4px; display: inline-flex; align-items: center; background-color: #ffc107; color: black; border: none; text-decoration: none;">
                                <i class="fas fa-pen"></i>
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');" style="display: inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm" 
                                        title="Hapus informasi ini"
                                        style="padding: 6px 12px; border-radius: 4px; display: inline-flex; align-items: center; background-color: #dc3545; color: white; border: none; cursor: pointer;">
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

    <div class="d-flex justify-content-end mt-4">
        {{ $informasi->links() }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const btn = this;
            const icon = btn.querySelector('i');
            
            icon.className = 'fas fa-spinner fa-spin';
            btn.disabled = true;

            fetch(`{{ url('/admin/informasi/toggle-status') }}/${itemId}`, {
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
                    
                    btn.setAttribute('data-status', newStatus ? '1' : '0');

                    if (newStatus) {
                        btn.style.backgroundColor = '#28a745';
                        btn.setAttribute('title', 'Nonaktifkan informasi ini');
                        icon.className = 'fas fa-eye';
                    } else {
                        btn.style.backgroundColor = '#6c757d';
                        btn.setAttribute('title', 'Aktifkan informasi ini');
                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = btn.closest('tr');
                    const statusCell = row.querySelector('.badge-status');
                    if (statusCell) {
                        if (newStatus) {
                            statusCell.className = 'badge bg-success badge-status';
                            statusCell.textContent = 'Aktif';
                        } else {
                            statusCell.className = 'badge bg-danger badge-status';
                            statusCell.textContent = 'Tidak Aktif';
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                btn.disabled = false;
            });
        });
    });
});
</script>
@endsection