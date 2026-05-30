@extends('layouts.admin')

@section('title', 'Kelola UMKM - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data UMKM {{ ucfirst($geosite) }}</h3>
            <a href="{{ url('/admin/geosite/'.$geosite.'/umkm/create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah UMKM
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Usaha</th>
                            <th>Pemilik</th>
                            <th>Kategori</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($umkm as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                       <td class="text-center">
    @if($item->foto_utama && file_exists(public_path($item->foto_utama)))
        <img src="{{ asset($item->foto_utama) }}" width="50" height="50" style="object-fit: cover; border-radius: 8px;">
    @else
        <div style="width: 50px; height: 50px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
            <i class="fas fa-store text-muted"></i>
        </div>
    @endif
</td>
 <td>{{ $item->nama_usaha }}</td>
                            <td>{{ $item->pemilik }}</td>
                            <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>
                                <div class="btn-group" style="display: flex; gap: 5px;">
                                    <a href="{{ url('/admin/geosite/'.$geosite.'/umkm/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/admin/geosite/'.$geosite.'/umkm/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection