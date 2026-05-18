@extends('layouts.admin')

@section('title', 'Kelola Fasilitas - Tele')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Fasilitas Tele</h3>
            <a href="{{ route('admin.tele.fasilitas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Fasilitas
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>Gambar</th><th>Nama</th><th>Deskripsi</th><th>Harga</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @forelse($fasilitas as $key => $item)
                        <tr>
                            <td>{{ $fasilitas->firstItem() + $key }}</td>
                            <td>@if($item->gambar)<img src="{{ asset('storage/'.$item->gambar) }}" width="50">@else <i class="fas fa-image fa-2x"></i>@endif</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td>Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.tele.fasilitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.tele.fasilitas.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty<tr><td colspan="6" class="text-center">Belum ada data</td></tr>@endforelse
                    </tbody>
                </table>
            </div>
            {{ $fasilitas->links() }}
        </div>
    </div>
</div>
@endsection