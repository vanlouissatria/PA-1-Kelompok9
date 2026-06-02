@extends('layouts.admin')

@section('title', 'Detail Informasi')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3>{{ $informasi->judul }}</h3>
        </div>

        <div class="card-body">

            @if($informasi->gambar)
                <img src="{{ asset($informasi->gambar) }}"
                     class="img-fluid mb-3"
                     style="max-height:300px;">
            @endif

            <div>
                {!! nl2br(e($informasi->konten)) !!}
            </div>

            <hr>

            <a href="{{ url('/admin/geosite/'.$geosite.'/informasi') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection