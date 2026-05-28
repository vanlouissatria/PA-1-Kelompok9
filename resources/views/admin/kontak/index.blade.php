@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Data Kontak
        </h2>

        <a href="{{ route('admin.kontak.create') }}"
           class="btn btn-primary">

            + Tambah Kontak

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Judul</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kontak as $item)

                    <tr>

                        <td>{{ $item->judul }}</td>

                        <td>
                            {{ \Illuminate\Support\Str::limit($item->alamat, 50) }}
                        </td>

                        <td>{{ $item->telepon1 }}</td>

                        <td>{{ $item->email1 }}</td>

                        <td>

                            <a href="{{ route('admin.kontak.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.kontak.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data kontak?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">
                            Data kontak belum ada
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection