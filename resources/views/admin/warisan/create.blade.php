@extends('layouts.admin')

@section('title', 'Tambah Warisan Alam dan Budaya')

@section('content')
<div class="p-6 max-w-2xl">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Item Warisan Alam dan Budaya</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.warisan.store') }}" enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-6 space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Jenis <span class="text-red-500">*</span></label>
            <select name="jenis"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="">-- Pilih Jenis --</option>
                <option value="geodiversity"       {{ old('jenis')=='geodiversity' ? 'selected' : '' }}>🪨 Geodiversity</option>
                <option value="biodiversity"       {{ old('jenis')=='biodiversity' ? 'selected' : '' }}>🌿 Biodiversity</option>
                <option value="cultural_diversity" {{ old('jenis')=='cultural_diversity' ? 'selected' : '' }}>🏛️ Cultural Diversity</option>
            </select>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Gambar <span class="text-gray-400 text-sm">(maks 4MB, format JPG/PNG)</span></label>
            <input type="file" name="gambar" accept="image/jpeg,image/png,image/jpg"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Urutan Tampil <span class="text-red-500">*</span></label>
            <input type="number" name="urutan" value="{{ old('urutan', 1) }}" min="1"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <p class="text-xs text-gray-400 mt-1">Angka lebih kecil tampil lebih dulu</p>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="status" id="status" checked class="w-4 h-4">
            <label for="status" class="font-medium text-gray-700">Tampilkan di website</label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                    class="bg-blue-700 text-white px-6 py-2 rounded-lg hover:bg-blue-800">
                Simpan
            </button>
            <a href="{{ route('admin.warisan.index') }}"
               class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection