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
    <div class="table-responsive" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <table class="table" style="width: 100%; vertical-align: middle;">
            <thead>
                <tr style="color: #8A92A6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; border-bottom: 2px solid #f0f2f5;">
                    <th width="5%">NO</th>
                    <th width="12%">GAMBAR</th>
                    <th width="35%">JUDUL</th>
                    <th width="20%">KATEGORI</th>
                    <th width="15%">STATUS</th>
                    <th width="13%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                <tr style="border-bottom: 1px solid #f0f2f5;">
                    <td style="font-weight: 600; color: #444;">{{ $galeris->firstItem() + $index }}</td>
                    <td>
                        @php
                            $gambar = $galeri->gambar;
                            $gambarAda = $gambar && file_exists(public_path($gambar));
                        @endphp
                        @if($gambarAda)
                            <img src="{{ asset($gambar) }}" alt="{{ $galeri->judul }}"
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
                        {{-- TOMBOL TOGGLE STATUS SAJA --}}
                        <div class="d-flex align-items-center gap-2">
                            {{-- Tombol Toggle Status (Icon Only) --}}
                            <button type="button" 
                                    class="btn btn-sm toggle-status-btn" 
                                    data-id="{{ $galeri->id }}"
                                    data-status="{{ $galeri->status }}"
                                    title="{{ $galeri->status ? 'Nonaktifkan galeri ini' : 'Aktifkan galeri ini' }}"
                                    style="font-weight: 600; padding: 5px 10px; border-radius: 6px; display: inline-flex; align-items: center; background-color: {{ $galeri->status ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem;">
                                <i class="fas {{ $galeri->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>
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
    <div class="d-flex justify-content-between align-items-center mt-4">
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
    .toggle-status-btn {
        transition: all 0.3s ease;
    }
    .toggle-status-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle toggle status button clicks
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const galeriId = this.getAttribute('data-id');
            const currentStatus = parseInt(this.getAttribute('data-status'));
            const button = this;

            // Show loading state
            const icon = button.querySelector('i');
            icon.className = 'fas fa-spinner fa-spin';
            button.disabled = true;

            // Send AJAX request
            fetch(`{{ url('/admin/galeri/toggle-status') }}/${galeriId}`, {
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
                    
                    // Update button appearance and icon
                    if (newStatus) {
                        // Status: Active
                        button.style.backgroundColor = '#28a745';
                        button.setAttribute('data-status', '1');
                        button.setAttribute('title', 'Nonaktifkan galeri ini');
                        icon.className = 'fas fa-eye';
                    } else {
                        // Status: Draft
                        button.style.backgroundColor = '#6c757d';
                        button.setAttribute('data-status', '0');
                        button.setAttribute('title', 'Aktifkan galeri ini');
                        icon.className = 'fas fa-eye-slash';
                    }

                    // Show success notification
                    const message = newStatus ? 'Galeri berhasil diaktifkan!' : 'Galeri berhasil dinonaktifkan!';
                    showNotification(message, 'success');

                    // Update the status badge in the same row
                    const row = button.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');
                    if (newStatus) {
                        statusCell.innerHTML = '<span class="badge bg-success" style="border-radius: 50px;">Aktif</span>';
                    } else {
                        statusCell.innerHTML = '<span class="badge bg-secondary" style="border-radius: 50px;">Draft</span>';
                    }
                } else {
                    showNotification('Gagal mengubah status', 'error');
                    // Restore original icon
                    icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan server', 'error');
                // Restore original icon
                icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
            })
            .finally(() => {
                button.disabled = false;
            });
        });
    });
});

// Function to show notification
function showNotification(message, type = 'info') {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert" style="margin-top: 20px;">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    const container = document.querySelector('.container-fluid');
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = alertHtml;
    container.insertBefore(tempDiv.firstElementChild, container.querySelector('.table-responsive'));
    
    // Auto dismiss after 3 seconds
    setTimeout(() => {
        const alert = container.querySelector('.alert:not(.table-responsive + *)');
        if (alert) {
            alert.remove();
        }
    }, 3000);
}
</script>
    `;
    
    const container = document.querySelector('.container-fluid');
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = alertHtml;
    container.insertBefore(tempDiv.firstElementChild, container.querySelector('.table-responsive'));
    
    // Auto dismiss after 3 seconds
    setTimeout(() => {
        const alert = container.querySelector('.alert:not(.table-responsive + *)');
        if (alert) {
            alert.remove();
        }
    }, 3000);
}
</script>
@endsection