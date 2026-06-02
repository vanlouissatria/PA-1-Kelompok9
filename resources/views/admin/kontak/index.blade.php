@extends('layouts.admin')

@section('title', 'Manajemen Kontak')

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
    <h1 class="page-header-title">Data Kontak</h1>

    {{-- 2. Tombol Tambah di Bawah Judul --}}
    <a href="{{ route('admin.kontak.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus me-2" style="font-size: 0.8rem;"></i> Tambah Kontak
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
                    <th width="30%">JUDUL / EMAIL</th>
                    <th width="35%">ALAMAT</th>
                    <th width="15%">TELEPON</th>
                    <th width="10%">STATUS</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kontak as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight: 600; color: #111;">{{ $item->judul }}</div>
                        <small class="text-muted">{{ $item->email1 ?? '-' }}</small>
                    </td>
                    <td>
                        <div title="{{ $item->alamat }}">
                            {{ \Illuminate\Support\Str::limit($item->alamat, 60) }}
                        </div>
                    </td>
                    <td>{{ $item->telepon1 ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} badge-status">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex !important; flex-direction: row !important; align-items: center; gap: 8px; justify-content: flex-start;">
                            
                            {{-- 1. Tombol Toggle Aktif/Mata --}}
                            <button type="button" 
                                    class="btn btn-sm toggle-status-btn" 
                                    data-id="{{ $item->id }}"
                                    data-status="{{ $item->status }}"
                                    title="{{ $item->status ? 'Nonaktifkan kontak ini' : 'Aktifkan kontak ini' }}"
                                    style="font-weight: 600; padding: 6px; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; background-color: {{ $item->status ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem; height: 32px; width: 32px; margin: 0;">
                                <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>

                            {{-- 2. Tombol Edit Kuning --}}
                            <a href="{{ route('admin.kontak.edit', $item->id) }}" 
                            class="btn btn-sm" 
                            title="Edit kontak ini"
                            style="font-weight: 600; padding: 6px; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; background-color: #ffc107; color: #000; border: none; text-decoration: none; font-size: 0.85rem; height: 32px; width: 32px; margin: 0;">
                                <i class="fas fa-pen"></i>
                            </a>

                            {{-- 3. Tombol Hapus Merah --}}
                            <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?');" style="display: inline-block; margin: 0; padding: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm" 
                                        title="Hapus kontak ini"
                                        style="font-weight: 600; padding: 6px; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; background-color: #dc3545; color: white; border: none; cursor: pointer; font-size: 0.85rem; height: 32px; width: 32px; margin: 0;">
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
        {{ $kontak->links() }}
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

            const url = '{{ url('admin/kontak/toggle-status') }}' + '/' + itemId;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('HTTP error! status: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const newStatus = data.status;
                    
                    if (newStatus) {
                        btn.style.backgroundColor = '#28a745';
                        btn.setAttribute('data-status', '1');
                        btn.setAttribute('title', 'Nonaktifkan kontak ini');
                        icon.className = 'fas fa-eye';
                    } else {
                        btn.style.backgroundColor = '#6c757d';
                        btn.setAttribute('data-status', '0');
                        btn.setAttribute('title', 'Aktifkan kontak ini');
                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = btn.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');
                    if (newStatus) {
                        statusCell.innerHTML = '<span class="badge bg-success badge-status">Aktif</span>';
                    } else {
                        statusCell.innerHTML = '<span class="badge bg-danger badge-status">Tidak</span>';
                    }
                } else {
                    alert('Gagal memperbarui status');
                    icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan sistem atau rute tidak ditemukan.');
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