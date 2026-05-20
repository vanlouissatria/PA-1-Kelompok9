@extends('layouts.app')

@section('title', 'Warisan Alam dan Budaya')

@section('content')

{{-- HERO --}}
<section class="py-16 bg-gradient-to-b from-blue-900 to-blue-700 text-white text-center">
    <h1 class="text-4xl font-bold mb-3">Warisan Alam dan Budaya</h1>
    <p class="text-lg opacity-80">Keragaman Geologi, Hayati, dan Budaya Geosite Tele-Efrata-Sihotang</p>
</section>

{{-- KONTEN --}}
<section class="py-12 px-6 max-w-7xl mx-auto">

    {{-- GEODIVERSITY --}}
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-blue-900 border-b-4 border-yellow-500 pb-2 mb-6">
            🪨 Geodiversity
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($geodiversity as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-blue-900 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic">Belum ada data geodiversity.</p>
            @endforelse
        </div>
    </div>

    {{-- BIODIVERSITY --}}
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-green-800 border-b-4 border-green-500 pb-2 mb-6">
            🌿 Biodiversity
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($biodiversity as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic">Belum ada data biodiversity.</p>
            @endforelse
        </div>
    </div>

    {{-- CULTURAL DIVERSITY --}}
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-amber-800 border-b-4 border-amber-500 pb-2 mb-6">
            🏛️ Cultural Diversity
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($cultural_diversity as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-amber-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic">Belum ada data cultural diversity.</p>
            @endforelse
        </div>
    </div>

</section>

@endsection