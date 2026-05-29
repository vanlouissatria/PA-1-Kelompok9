{{-- resources/views/admin/galeri/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

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

    .badge-kategori {
        background: #f8f9fa;
        color: #333;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid #e9ecef;
    }

    .galeri-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #eee;
    }

    .empty-image {
        width: 70px;
        height: 70px;
        background: #f1f1f1;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container-fluid">

    {{-- Judul --}}
    <h1 class="page-header-title">Manajemen Galeri</h1>

    {{-- Tombol Tambah --}}
    <a href="{{ route('admin.galeri.create') }}" class="btn-bi-tambah">
        <i class="fas fa-plus me-2" style="font-size: 0.8rem;"></i>
        Tambah Galeri
    </a>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table align-middle">

            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="12%">GAMBAR</th>
                    <th width="35%">JUDUL</th>
                    <th width="18%">KATEGORI</th>
                    <th width="15%">STATUS</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>

            <tbody>
                @forelse($galeris as $index => $galeri)
                <tr>

                    {{-- Nomor --}}
                    <td>
                        {{ $galeris->firstItem() + $index }}
                    </td>

                    {{-- Gambar --}}
                    <td>
                        @if($galeri->gambar)
                            <img src="{{ asset($galeri->gambar) }}"
                                 class="galeri-image"
                                 alt="Galeri">
                        @else
                            <div class="empty-image">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>

                    {{-- Judul --}}
                    <td>
                        <div style="font-weight: 600; color: #111;">
                            {{ $galeri->judul }}
                        </div>
                    </td>

                    {{-- Kategori --}}
                    <td>
                        <span class="badge-kategori">
                            {{ ucfirst($galeri->kategori) }}
                        </span>
                    </td>

                    {{-- Status --}}
                    <td>
                        <span class="badge {{ $galeri->status ? 'bg-success' : 'bg-danger' }} badge-status">
                            {{ $galeri->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>

                    {{-- Aksi --}}
                    <td>
                        <div class="d-flex gap-2">

                            {{-- Toggle --}}
                            <button type="button"
                                    class="btn btn-sm toggle-status-btn"
                                    data-id="{{ $galeri->id }}"
                                    data-status="{{ $galeri->status }}"
                                    title="{{ $galeri->status ? 'Nonaktifkan galeri ini' : 'Aktifkan galeri ini' }}"
                                    style="font-weight: 600; padding: 6px 12px; border-radius: 6px; display: inline-flex; align-items: center; background-color: {{ $galeri->status ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem;">

                                <i class="fas {{ $galeri->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </button>

                            {{-- Edit --}}
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                               class="btn btn-sm"
                               title="Edit galeri"
                               style="font-weight: 600; padding: 6px 12px; border-radius: 6px; display: inline-flex; align-items: center; background-color: #ffc107; color: #000; border: none; text-decoration: none; font-size: 0.85rem;">

                                <i class="fas fa-pen"></i>
                            </a>

                            {{-- Hapus --}}
                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');"
                                  style="display: inline; margin: 0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm"
                                        title="Hapus galeri"
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
                        Data galeri masih kosong.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $galeris->links() }}
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

            fetch(`{{ url('/admin/galeri/toggle-status') }}/${itemId}`, {
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
                        btn.setAttribute('title', 'Nonaktifkan galeri ini');

                        icon.className = 'fas fa-eye';

                    } else {

                        btn.style.backgroundColor = '#6c757d';
                        btn.setAttribute('data-status', '0');
                        btn.setAttribute('title', 'Aktifkan galeri ini');

                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = btn.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');

                    if (newStatus) {
                        statusCell.innerHTML =
                            '<span class="badge bg-success badge-status">Aktif</span>';
                    } else {
                        statusCell.innerHTML =
                            '<span class="badge bg-danger badge-status">Tidak</span>';
                    }
                }
            })

            .catch(error => {

                console.error('Error:', error);

                icon.className =
                    currentStatus
                    ? 'fas fa-eye'
                    : 'fas fa-eye-slash';
            })

            .finally(() => {
                btn.disabled = false;
            });

        });

    });

});
</script>
@endsection