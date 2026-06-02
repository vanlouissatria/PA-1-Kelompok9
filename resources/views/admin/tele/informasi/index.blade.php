@extends('layouts.admin')

@section('title')
    Kelola Informasi - {{ $geositeTitle }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Informasi {{ $geositeTitle }}</h3>
            <a href="{{ url('/admin/geosite/'.$geosite.'/informasi/create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Informasi
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($informasi as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->gambar && file_exists(public_path($item->gambar)))
                                    <img src="{{ asset($item->gambar) }}" width="50" height="50" style="object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                        <i class="fas fa-file-alt text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->judul }}</br><small class="text-muted">ID: {{ $item->id }}</small></td>
                            <td>
                                <span class="badge {{ $item->kategori == 'tele' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ $item->kategori ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status ? 'Aktif' : 'Draft' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" style="display:flex; gap:5px;">
                                    <a href="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$item->id) }}" class="btn btn-success btn-sm" title="Lihat"><i class="fas fa-eye"></i></a>
                                    <a href="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-database fa-2x mb-2 d-block text-muted"></i>
                                Belum ada data informasi. Silakan tambah data baru.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if(isset($informasi) && $informasi->hasPages())
            <div class="mt-3">
                {{ $informasi->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection