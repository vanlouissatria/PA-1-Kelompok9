@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- 1. Judul Besar Paling Atas --}}
    <h1 style="font-size: 2.5rem; font-weight: 800; color: #000; margin-bottom: 10px;">Manajemen Galeri</h1>

    {{-- 2. Tombol di bawahnya (Persis Destinasi) --}}
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.galeri.create') }}" 
           style="background-color: #002F5F; color: white !important; padding: 10px 20px; border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center;">
            <i class="fas fa-plus me-2"></i> Tambah Galeri
        </a>
    </div>

    {{-- 3. Tabel Langsung di Bawah Tombol --}}
    <div class="table-responsive">
        <table class="table" style="width: 100%;">
            <thead>
                <tr style="color: #8A92A6; font-size: 0.85rem; font-weight: 700; text-transform: uppercase;">
                    <th width="5%">NO</th>
                    <th width="20%">GAMBAR</th>
                    <th width="35%">JUDUL</th>
                    <th width="25%">KATEGORI</th>
                    <th width="15%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" style="padding: 20px 0; color: #666;">Data masih kosong.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection