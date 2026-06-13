<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'slug',
        'kategori',
        'views',
        'created_by'
    ];

    // Relasi: galeri dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            if (auth()->check() && empty($galeri->created_by)) {
                $galeri->created_by = auth()->id();
            }
        });
    }
}