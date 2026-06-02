@extends('layouts.admin')

@section('title')
Detail Informasi - {{ ucfirst($geosite) }}
@endsection

@section('content')

<div class="container-fluid">

<h1 class="mb-5">
    Detail Informasi - {{ ucfirst($geosite) }}
</h1>
<br></br>
<div class="mb-4">
    <label class="form-label fw-bold">Judul Informasi</label>
    <div class="form-control bg-light" style="min-height: 50px;">
        {{ $informasi->judul }}
    </div>
</div>
<br></br>
<div class="mb-4">
    <label class="form-label fw-bold">Isi Konten</label>
    <div class="form-control bg-light p-4"
         style="
            min-height: 300px;
            white-space: pre-line;
            text-align: justify;
            line-height: 1.8;
         ">
        {{ $informasi->konten }}
    </div>
</div>

@if($informasi->gambar)
<div class="mb-4">
    <label class="form-label fw-bold">Gambar</label>

    <div>
        <img src="{{ asset($informasi->gambar) }}"
             class="img-fluid rounded border"
             style="max-width: 500px;">
    </div>
</div>
@endif

<hr>

<div class="mt-4">
    <a href="{{ url('/admin/geosite/'.$geosite.'/informasi') }}"
        class="btn btn-primary">
        Kembali
    </a>
    <a href="{{ url('/admin/geosite/'.$geosite.'/informasi/'.$informasi->id.'/edit') }}"
       class="btn btn-primary">
        Edit
    </a>
</div>
</div>
@endsection
