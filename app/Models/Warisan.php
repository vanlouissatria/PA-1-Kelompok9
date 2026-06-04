<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warisan extends Model
{
    protected $table = 'warisans';

    protected $fillable = [
        'created_by',
        'judul',
        'jenis',
        'deskripsi',
        'gambar',
        'urutan',
        'status',
    ];

    // Relasi: warisan dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getLabelJenisAttribute(): string
    {
        return match($this->jenis) {
            'geodiversity'       => 'Geodiversity',
            'biodiversity'       => 'Biodiversity',
            'cultural_diversity' => 'Cultural Diversity',
            default              => $this->jenis,
        };
    }
}