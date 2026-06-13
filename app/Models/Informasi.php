<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Informasi extends Model
{
    protected $table = 'informasi';

    protected $fillable = [
        'created_by',
        'judul',
        'slug',
        'konten',
        'gambar',
        'urutan',
        'kategori',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relasi: informasi dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);

            if (auth()->check() && empty($informasi->created_by)) {
                $informasi->created_by = auth()->id();
            }
        });

        static::updating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });
    }
}