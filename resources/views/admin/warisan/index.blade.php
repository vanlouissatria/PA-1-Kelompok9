@extends('layouts.admin')

@section('title', 'Manajemen Warisan Alam dan Budaya')

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

    /* Background putih, border, dan shadow dilepas agar tabel menyatu dengan background dasar */
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
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .action-btn {
        min-width: 40px;
        min-height: 40px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
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
        background: #f59e0b;
        color: #000;
    }

    .btn-delete {
        background: #ef4444;
    }

    .text-secondary {
        color: var(--text-muted);
    }
</style>

{{-- Header Halaman --}}
<div class="page-actions">
    <div>
        <h1 class="page-header-title">Manajemen Warisan Alam dan Budaya</h1>
    </div>
    <a href="{{ route('admin.warisan.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus"></i>
        Tambah Warisan
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
                    <th>NAMA WARISAN</th>
                    <th>JENIS</th>
                    <th>URUTAN</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @php
                            $warisanImage = $item->gambar;
                            if ($warisanImage && !\Illuminate\Support\Str::startsWith($warisanImage, ['http://', 'https://', 'data:'])) {
                                $warisanImage = asset('storage/' . ltrim($warisanImage, '/'));
                            }
                        @endphp
                        @if($item->gambar)
                            <img src="{{ $warisanImage }}" alt="{{ $item->judul }}" class="thumbnail">
                        @else
                            <div class="placeholder-img">No Image</div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 700; color: var(--text-heading);">{{ $item->judul }}</div>
                    </td>
                    <td>
                        <span class="badge-chip">
                            @if($item->jenis == 'geodiversity')
                                Geodiversity
                            @elseif($item->jenis == 'biodiversity')
                                Biodiversity
                            @else
                                Cultural Diversity
                            @endif
                        </span>
                    </td>
                    <td class="text-secondary">{{ $item->urutan }}</td>
                    <td>
                        <span class="badge-status {{ $item->status ? 'status-active' : 'status-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions-group">
                            {{-- Toggle Status --}}
                            <button type="button"
                                    class="action-btn toggle-status-btn"
                                    data-id="{{ $item->id }}"
                                    data-status="{{ $item->status }}"
                                    title="{{ $item->status ? 'Nonaktifkan' : 'Aktifkan' }}"
                                    style="background-color: {{ $item->status ? '#16a34a' : '#6b7280' }};">
                                <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>
                            
                            {{-- Edit --}}
                            <a href="{{ route('admin.warisan.edit', $item->id) }}" class="action-btn btn-edit" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            {{-- Delete --}}
                            <form action="{{ route('admin.warisan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus warisan ini?');" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-secondary">
                        Belum ada data warisan. <a href="{{ route('admin.warisan.create') }}" class="text-decoration-none" style="color: var(--bi-blue);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

<script>
(function() {
    function initWarisanToggleButtons(){
        const toggleButtons = document.querySelectorAll('.toggle-status-btn');

        toggleButtons.forEach(button => {
            if (button.__toggleBound) return;
            button.__toggleBound = true;

            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                const currentStatus = parseInt(this.getAttribute('data-status'));
                const btn = this;
                const icon = btn.querySelector('i');

                console.debug('Toggle click:', { id: itemId, status: currentStatus });

                if (icon) {
                    icon.className = 'fas fa-spinner fa-spin';
                }
                btn.disabled = true;

                // Menggunakan route named Laravel dengan format dash (toggle-status)
                const baseUrl = "{{ route('admin.warisan.toggle-status', ':id') }}";
                const finalUrl = baseUrl.replace(':id', itemId);

                fetch(finalUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => {
                    console.debug('Toggle response status:', response.status);
                    if (!response.ok) {
                        if (response.status === 419) {
                            throw new Error('CSRF token mismatch (419). Silakan refresh halaman dan coba lagi.');
                        }
                        return response.text().then(txt => { throw new Error('HTTP ' + response.status + ': ' + txt); });
                    }
                    return response.json().catch(err => { throw new Error('Invalid JSON response'); });
                })
                .then(data => {
                    console.debug('Toggle data:', data);

                    if (data && data.success) {
                        const newStatus = data.status;

                        if (newStatus) {
                            btn.style.backgroundColor = '#16a34a';
                            btn.setAttribute('data-status', '1');
                            btn.setAttribute('title', 'Nonaktifkan');
                            if (icon) icon.className = 'fas fa-eye';
                        } else {
                            btn.style.backgroundColor = '#6b7280';
                            btn.setAttribute('data-status', '0');
                            btn.setAttribute('title', 'Aktifkan');
                            if (icon) icon.className = 'fas fa-eye-slash';
                        }

                        const row = btn.closest('tr');
                        const statusCell = row.querySelector('td:nth-child(6)');

                        if (newStatus) {
                            statusCell.innerHTML = '<span class="badge-status status-active">Aktif</span>';
                        } else {
                            statusCell.innerHTML = '<span class="badge-status status-inactive">Nonaktif</span>';
                        }
                    } else {
                        throw new Error('Struktur respon tidak sesuai');
                    }
                })
                .catch(error => {
                    console.error('Toggle Error:', error);
                    try { window.alert('Gagal mengubah status: ' + error.message); } catch(e){}

                    if (icon) {
                        icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
                    }
                })
                .finally(() => {
                    btn.disabled = false;
                });
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWarisanToggleButtons);
    } else {
        initWarisanToggleButtons();
    }

    window.initWarisanToggle = initWarisanToggleButtons;
})();
</script>
@endsection