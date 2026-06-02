@extends('layouts.admin')



@section('title')
    Kelola Penginapan - {{ $geositeTitle }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Penginapan {{ $geositeTitle }}</h3>
            <a href="{{ url('/admin/geosite/'.$geosite.'/penginapan/create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penginapan
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th width="80">Gambar</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Harga</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penginapan as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($item->gambar && file_exists(public_path($item->gambar)))
                                        <img src="{{ asset($item->gambar) }}" width="50" height="50" style="object-fit: cover; border-radius: 8px;">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                            <i class="fas fa-hotel text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ Str::limit($item->alamat, 50) ?? '-' }}</td>
                                <td>{{ $item->no_telepon ?? '-' }}</td>
                                <td>Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group" style="display:flex; gap:5px;">
                                        <a href="{{ url('/admin/geosite/'.$geosite.'/penginapan/'.$item->id) }}" class="btn btn-success btn-sm" title="Lihat"><i class="fas fa-eye"></i></a>
                                        <a href="{{ url('/admin/geosite/'.$geosite.'/penginapan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ url('/admin/geosite/'.$geosite.'/penginapan/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data penginapan. Silakan tambah data baru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @if($penginapan->hasPages())
            <div class="mt-3">
                {{ $penginapan->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection