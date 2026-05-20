@extends('layouts.admin')

@section('title', 'Kelola Galeri - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        
        {{-- Header --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Galeri Tele</h3>

            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Galeri
            </a>
        </div>

        <div class="card-body">

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
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
                        @forelse($galeri as $key => $item)
                        <tr>

                            {{-- Nomor --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            {{-- Gambar --}}
                            <td class="text-center">
                                @if($item->gambar)
                                    <img 
                                        src="{{ $item->gambar }}" 
                                        width="80" 
                                        height="60"
                                        style="object-fit: cover; border-radius: 8px;"
                                    >
                                @else
                                    <div style="
                                        width:80px;
                                        height:60px;
                                        background:#f1f5f9;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        border-radius:8px;
                                    ">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- Judul --}}
                            <td>
                                {{ $item->judul }}
                            </td>

                            {{-- Kategori --}}
                            <td>
                                <span class="badge bg-info">
                                    {{ $item->kategori }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td>
                                @if($item->status)
                                    <span class="badge bg-success">
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td>
                                <div class="btn-group" style="display:flex; gap:5px;">

                                    {{-- Edit --}}
                                    <a 
                                        href="{{ route('admin.galeri.edit', $item->id) }}" 
                                        class="btn btn-warning btn-sm"
                                    >
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form 
                                        action="{{ route('admin.galeri.destroy', $item->id) }}" 
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin hapus?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data galeri
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $galeri->links() }}
            </div>

        </div>
    </div>
</div>
@endsection