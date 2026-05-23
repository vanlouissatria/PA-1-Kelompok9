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
                        <a href="{{ route('admin.warisan.edit', $item->id) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">
                            Edit
                        </a>
                        <form action="{{ route('admin.warisan.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
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
@endsection