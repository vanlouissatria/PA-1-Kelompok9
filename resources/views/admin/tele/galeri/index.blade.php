@extends('layouts.admin')

@section('title', 'Kelola Galeri - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Galeri Foto Tele</h3>
            <a href="{{ url('/admin/tele/galeri/create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                @forelse($galeri as $item)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="position-relative">
                            @if($item->gambar && file_exists(public_path($item->gambar)))
                                <img src="{{ asset($item->gambar) }}" class="card-img-top" style="height: 180px; width: 100%; object-fit: cover;">
                            @elseif($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 180px; width: 100%; object-fit: cover;">
                            @else
                                <div style="height: 180px; background: #f1f5f9; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                    <small class="d-block text-muted">No Image</small>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h6 class="card-title fw-bold">{{ Str::limit($item->judul, 40) }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($item->deskripsi, 60) }}</p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex gap-2">
                                <a href="{{ url('/admin/tele/galeri/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm flex-fill">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ url('/admin/tele/galeri/'.$item->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin hapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-5">
                        <i class="fas fa-images fa-3x mb-3 d-block"></i>
                        <h5>Belum ada foto galeri</h5>
                        <p>Silakan tambah foto baru dengan mengklik tombol "Tambah Foto"</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            @if($galeri->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $galeri->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection