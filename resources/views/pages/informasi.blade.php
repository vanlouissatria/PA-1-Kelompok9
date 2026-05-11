@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informasi</h1>

    @forelse($informasiList as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $item->judul }}</h5>
                <p>{{ $item->konten }}</p>
                <small>Urutan: {{ $item->urutan }}</small>
            </div>
        </div>
    @empty
        <p>Tidak ada informasi.</p>
    @endforelse
</div>
@endsection