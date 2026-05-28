@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Tambah Kontak
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.kontak.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Judul
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              rows="4"
                              class="form-control"
                              required></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Telepon 1
                    </label>

                    <input type="text"
                           name="telepon1"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Telepon 2
                    </label>

                    <input type="text"
                           name="telepon2"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email 1
                    </label>

                    <input type="email"
                           name="email1"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email 2
                    </label>

                    <input type="email"
                           name="email2"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Google Maps
                    </label>

                    <textarea name="maps"
                              rows="3"
                              class="form-control"></textarea>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan

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