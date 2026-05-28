@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas Meat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🛠️ Fasilitas Meat</h5>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Fasilitas
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="80">Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th width="80">Urutan</th>
                        <th width="80">Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                                <img src="{{ $item->gambar }}" width="50" height="50" style="object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-secondary text-white text-center" style="width: 50px; height: 50px; line-height: 50px; border-radius: 8px;">
                                    <i class="fas fa-tools"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ $item->harga ?? 'Gratis' }}</td>
                        <td>{{ $item->urutan }}</td>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" 
                                        class="btn btn-sm toggle-status-btn" 
                                        data-id="{{ $item->id }}"
                                        data-status="{{ $item->status }}"
                                        title="{{ $item->status ? 'Nonaktifkan' : 'Aktifkan' }}"
                                        style="font-weight: 600; background-color: {{ $item->status ? '#28a745' : '#6c757d' }}; color: white; border: none;">
                                    <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-tools fa-2x text-muted mb-2 d-block"></i>
                                Belum ada data Fasilitas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $data->links() }}
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

            fetch(`{{ url('/admin/fasilitas/toggle-status') }}/${itemId}`, {
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
                        button.setAttribute('title', 'Nonaktifkan');
                        icon.className = 'fas fa-eye';
                    } else {
                        button.style.backgroundColor = '#6c757d';
                        button.setAttribute('data-status', '0');
                        button.setAttribute('title', 'Aktifkan');
                        icon.className = 'fas fa-eye-slash';
                    }

                    const row = button.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(6)');
                    if (newStatus) {
                        statusCell.innerHTML = '<span class="badge bg-success">Aktif</span>';
                    } else {
                        statusCell.innerHTML = '<span class="badge bg-danger">Tidak</span>';
                    }
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