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
                                    <a href="{{ route('admin.destinasi.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.destinasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
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
@endsection