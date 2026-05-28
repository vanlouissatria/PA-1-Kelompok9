@extends('layouts.admin')

@section('title', 'Kelola Warisan Alam dan Budaya')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Warisan Alam dan Budaya</h1>
        <a href="{{ route('admin.warisan.create') }}"
           class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
            + Tambah Item
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left">Jenis</th>
                    <th class="px-4 py-3 text-left">Urutan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $item->judul }}</td>
                    <td class="px-4 py-3">
                        @if($item->jenis == 'geodiversity')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Geodiversity</span>
                        @elseif($item->jenis == 'biodiversity')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Biodiversity</span>
                        @else
                            <span class="bg-amber-100 text-amber-800 px-2 py-1 rounded text-xs">Cultural Diversity</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $item->urutan }}</td>
                    <td class="px-4 py-3">
                        @if($item->status)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <button type="button" 
                                class="toggle-status-btn bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700" 
                                data-id="{{ $item->id }}"
                                data-status="{{ $item->status }}"
                                title="{{ $item->status ? 'Nonaktifkan' : 'Aktifkan' }}">
                            <i class="fas {{ $item->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-400">
                        Belum ada data. <a href="{{ route('admin.warisan.create') }}" class="text-blue-600">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="p-4">
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
            
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            fetch(`{{ url('/admin/warisan/toggle-status') }}/${itemId}`, {
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
                        button.className = 'toggle-status-btn bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700';
                        button.setAttribute('data-status', '1');
                        button.setAttribute('title', 'Nonaktifkan');
                        button.innerHTML = '<i class="fas fa-eye"></i>';
                    } else {
                        button.className = 'toggle-status-btn bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700';
                        button.setAttribute('data-status', '0');
                        button.setAttribute('title', 'Aktifkan');
                        button.innerHTML = '<i class="fas fa-eye-slash"></i>';
                    }

                    const row = button.closest('tr');
                    const statusCell = row.querySelector('td:nth-child(5)');
                    if (newStatus) {
                        statusCell.innerHTML = '<span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Aktif</span>';
                    } else {
                        statusCell.innerHTML = '<span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Nonaktif</span>';
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = currentStatus ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            })
            .finally(() => {
                button.disabled = false;
            });
        });
    });
});
</script>
@endsection