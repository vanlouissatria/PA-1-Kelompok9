{{-- resources/views/admin/destinasi/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Destinasi')

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

    .toggle-status-btn {
        transition: all 0.3s ease;
    }

    .toggle-status-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .pagination {
        margin-bottom: 0;
    }

    .page-link {
        color: #002F5F;
        border-radius: 5px;
        margin: 0 2px;
    }

    .page-item.active .page-link {
        background-color: #002F5F;
        border-color: #002F5F;
    }
</style>

<div class="container-fluid">

    {{-- Judul --}}
    <h1 class="page-header-title">
        Manajemen Destinasi
    </h1>

    {{-- Tombol Tambah --}}
    <a href="{{ route('admin.destinasi.create') }}"
       class="btn-bi-tambah">

        <i class="fas fa-plus me-2"
           style="font-size: 0.8rem;"></i>

        Tambah Destinasi
    </a>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="12%">GAMBAR</th>
                    <th width="30%">NAMA DESTINASI</th>
                    <th width="18%">KATEGORI</th>
                    <th width="15%">STATUS</th>
                    <th width="20%">AKSI</th>
                </tr>
            </thead>

            <tbody>

                @forelse($destinasi as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    {{-- Gambar --}}
                    <td>

                        @if($item->gambar)

                            <img src="{{ asset($item->gambar) }}"
                                 width="100"
                                 height="70"
                                 style="object-fit: cover; border-radius: 8px;"
                                 alt="Gambar Destinasi">

                        @else

                            <div style="width:100px;
                                        height:70px;
                                        background:#eee;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        border-radius:8px;">

                                <i class="fas fa-image text-muted"></i>

                            </div>

                        @endif

                    </td>

                    {{-- Nama --}}
                    <td>
                        <div style="font-weight: 700; color: #111;">
                            {{ $item->nama_destinasi }}
                        </div>
                    </td>

                    {{-- Kategori --}}
                    <td>

                        <span class="badge bg-light text-dark"
                              style="padding: 6px 12px;
                                     border-radius: 50px;
                                     font-weight: 500;
                                     border: 1px solid #e2e8f0;">

                            {{ ucfirst($item->kategori) }}

                        </span>

                    </td>

                    {{-- Status --}}
                    <td>

                        @if($item->status)

                            <span class="badge bg-success badge-status">
                                Aktif
                            </span>

                        @else

                            <span class="badge bg-secondary badge-status">
                                Draft
                            </span>

                        @endif

                    </td>

                    {{-- Aksi --}}
                    <td>

                        <div class="d-flex gap-2">

                            {{-- Toggle --}}
                            <button type="button"
                                    class="btn btn-sm toggle-status-btn"
                                    data-id="{{ $item->id }}"
                                    data-status="{{ $item->status }}"
                                    title="{{ $item->status ? 'Nonaktifkan destinasi ini' : 'Aktifkan destinasi ini' }}"
                                    style="font-weight: 600;
                                           padding: 6px 12px;
                                           border-radius: 6px;
                                           display: inline-flex;
                                           align-items: center;
                                           background-color: {{ $item->status ? '#28a745' : '#6c757d' }};
                                           color: white;
                                           border: none;
                                           cursor: pointer;
                                           font-size: 0.85rem;">

                                <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>

                            </button>

                            {{-- Edit --}}
                            <a href="{{ route('admin.destinasi.edit', $item->id) }}"
                               class="btn btn-sm"
                               title="Edit destinasi"
                               style="font-weight: 600;
                                      padding: 6px 12px;
                                      border-radius: 6px;
                                      display: inline-flex;
                                      align-items: center;
                                      background-color: #ffc107;
                                      color: #000;
                                      border: none;
                                      text-decoration: none;
                                      font-size: 0.85rem;">

                                <i class="fas fa-pen"></i>

                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.destinasi.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?');"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm"
                                        title="Hapus destinasi"
                                        style="font-weight: 600;
                                               padding: 6px 12px;
                                               border-radius: 6px;
                                               display: inline-flex;
                                               align-items: center;
                                               background-color: #dc3545;
                                               color: white;
                                               border: none;
                                               cursor: pointer;
                                               font-size: 0.85rem;">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-5 text-muted">

                        Data destinasi masih kosong.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $destinasi->links() }}
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

            fetch(`{{ url('/admin/destinasi/toggle-status') }}/${itemId}`, {

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
                        btn.setAttribute('title', 'Nonaktifkan destinasi ini');

                        icon.className = 'fas fa-eye';

                    } else {

                        btn.style.backgroundColor = '#6c757d';
                        btn.setAttribute('data-status', '0');
                        btn.setAttribute('title', 'Aktifkan destinasi ini');

                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = btn.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');

                    if (newStatus) {

                        statusCell.innerHTML =
                            '<span class="badge bg-success badge-status">Aktif</span>';

                    } else {

                        statusCell.innerHTML =
                            '<span class="badge bg-secondary badge-status">Draft</span>';
                    }
                }

            })

            .catch(error => {

                console.error('Error:', error);

                icon.className =
                    currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';

            })

            .finally(() => {

                btn.disabled = false;

            });

        });

    });

});
</script>
@endsection