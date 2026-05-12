@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar UMKM</h3>
            <div class="card-tools">
                <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah UMKM
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Logo</th>
                        <th>Nama Usaha</th>
                        <th>Pemilik</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($umkms as $key => $umkm)
                    <tr>
                        <td>{{ $key + $umkms->firstItem() }}</td>
                        <td>
                            @if($umkm->logo)
                                <img src="{{ Storage::url($umkm->logo) }}" width="40" height="40" class="rounded-circle">
                            @else
                                <i class="fas fa-store fa-2x"></i>
                            @endif
                        </td>
                        <td>{{ $umkm->nama_usaha }}</td>
                        <td>{{ $umkm->pemilik }}</td>
                        <td>{{ $umkm->kategori }}</td>
                        <td>
                            <input type="checkbox" class="toggle-status" data-id="{{ $umkm->id }}" 
                                {{ $umkm->status ? 'checked' : '' }} data-toggle="toggle">
                        </td>
                        <td>{{ $umkm->views }}</td>
                        <td>
                            <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $umkms->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.toggle-status').change(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route("admin.umkm.toggle-status", "") }}/' + id,
                type: 'PATCH',
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    alert('Status berhasil diubah');
                }
            });
        });
    });
</script>
@endpush
@endsection