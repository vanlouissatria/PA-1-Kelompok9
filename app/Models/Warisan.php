<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warisan extends Model
{
    protected $table = 'warisans';

    protected $fillable = [
        'judul',
        'jenis',
        'deskripsi',
        'gambar',
        'urutan',
        'status',
    ];

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