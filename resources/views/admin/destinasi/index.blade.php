@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Destinasi</h1>
        <a href="{{ route('admin.destinasi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Destinasi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Destinasi</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" width="100" class="img-thumbnail">
                            </td>
                            <td>{{ $item->nama_destinasi }}</td>
                            <td>
                                <span class="badge badge-info">{{ ucfirst($item->kategori) }}</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" 
                                            class="btn btn-sm toggle-status-btn" 
                                            data-id="{{ $item->id }}"
                                            data-status="{{ $item->status ?? 0 }}"
                                            title="Toggle status"
                                            style="font-weight: 600; padding: 5px 10px; border-radius: 6px; display: inline-flex; align-items: center; background-color: {{ ($item->status ?? false) ? '#28a745' : '#6c757d' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem;">
                                        <i class="fas {{ ($item->status ?? false) ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data masih kosong.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $destinasi->links() }}
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const currentStatus = parseInt(this.getAttribute('data-status'));
            const button = this;
            const icon = button.querySelector('i');
            
            icon.className = 'fas fa-spinner fa-spin';
            button.disabled = true;

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
                        button.style.backgroundColor = '#28a745';
                        button.setAttribute('data-status', '1');
                    } else {
                        button.style.backgroundColor = '#6c757d';
                        button.setAttribute('data-status', '0');
                    }
                    icon.className = newStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                icon.className = currentStatus ? 'fas fa-eye' : 'fas fa-eye-slash';
            })
            .finally(() => {
                button.disabled = false;
            });
        });
    });
});
</script>
@endsection