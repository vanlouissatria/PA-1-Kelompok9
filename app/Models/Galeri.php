<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'created_by',
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'kategori',
        'lokasi',
        'tanggal_foto',
        'status',
        'views',
    ];

    // Relasi: galeri dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}