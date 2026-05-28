@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Edit Kontak
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.kontak.update', $kontak->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ $kontak->judul }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              rows="4"
                              class="form-control"
                              required>{{ $kontak->alamat }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Telepon 1
                    </label>

                    <input type="text"
                           name="telepon1"
                           class="form-control"
                           value="{{ $kontak->telepon1 }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Telepon 2
                    </label>

                    <input type="text"
                           name="telepon2"
                           class="form-control"
                           value="{{ $kontak->telepon2 }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email 1
                    </label>

                    <input type="email"
                           name="email1"
                           class="form-control"
                           value="{{ $kontak->email1 }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email 2
                    </label>

                    <input type="email"
                           name="email2"
                           class="form-control"
                           value="{{ $kontak->email2 }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Google Maps
                    </label>

                    <textarea name="maps"
                              rows="3"
                              class="form-control">{{ $kontak->maps }}</textarea>

                </div>

                <button type="submit"
                        class="btn btn-warning">

                    Update

                </button>

                <a href="{{ route('admin.kontak.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection