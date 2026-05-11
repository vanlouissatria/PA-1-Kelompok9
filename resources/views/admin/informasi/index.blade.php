@extends('layouts.admin')

@section('title', 'Manajemen Informasi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h5 class="mb-0">
        📄 Daftar Informasi
    </h5>

    <a href="{{ route('admin.informasi.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>

        Tambah Informasi

    </a>

</div>

<div class="card">

    <div class="card-body">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                <i class="fas fa-check-circle"></i>

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="50">
                            No
                        </th>

                        <th width="90">
                            Gambar
                        </th>

                        <th>
                            Informasi
                        </th>

                        <th width="100">
                            Urutan
                        </th>

                        <th width="100">
                            Status
                        </th>

                        <th width="140">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($informasi as $item)

                    <tr>

                        {{-- NO --}}
                        <td>
                            {{ $loop->iteration }}
                        </td>

                        {{-- GAMBAR --}}
                        <td>

                            @if($item->gambar)

                                <img 
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    width="60"
                                    height="60"
                                    style="object-fit: cover; border-radius: 8px;"
                                >

                            @else

                                <div class="bg-secondary text-white text-center"
                                     style="width: 60px;
                                            height: 60px;
                                            line-height: 60px;
                                            border-radius: 8px;">

                                    <i class="fas fa-image"></i>

                                </div>

                            @endif

                        </td>

                        {{-- JUDUL --}}
                        <td>

                            <strong>
                                {{ $item->judul }}
                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $item->created_at->format('d M Y') }}

                            </small>

                        </td>

                        {{-- URUTAN --}}
                        <td>

                            <span class="badge bg-primary">

                                {{ $item->urutan }}

                            </span>

                        </td>

                        {{-- STATUS --}}
                        <td>

                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">

                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}

                            </span>

                        </td>

                        {{-- AKSI --}}
                        <td>

                            <div class="btn-group" role="group">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.informasi.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="fas fa-edit"></i>

                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.informasi.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-4">

                            <i class="fas fa-database fa-2x text-muted mb-2 d-block"></i>

                            Belum ada data informasi.
                            Silakan tambah data baru.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-end mt-3">

            {{ $informasi->links() }}

        </div>

    </div>

</div>

@endsection