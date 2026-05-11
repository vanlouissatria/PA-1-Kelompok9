@extends('layouts.app') {{-- Atau sesuaikan dengan nama layout Anda --}}

@section('content')
<div class="container">
    <h1>Daftar Informasi</h1>
    <hr>
    <div class="row">
        @foreach($informasiList as $info)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($info->gambar)
                        <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="{{ $info->judul }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->judul }}</h5>
                        <p class="card-text">{!! Str::limit($info->konten, 100) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection