<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $table = 'umkms';

=======
    protected $table = 'umkm';
    
>>>>>>> 6f4c4da98609a1f536bf8249cfb9af9417f21bd8
    protected $fillable = [
        'nama_usaha',
        'pemilik',
        'no_telepon',
        'kategori',
        'geosite',
        'alamat',
        'deskripsi',
        'foto_utama',
        'status'
    ];

    // Accessor untuk mendapatkan URL foto lengkap
    public function getFotoUrlAttribute()
    {
        if ($this->foto_utama) {
            return asset('storage/' . $this->foto_utama);
        }
        return null;
    }

    // Accessor untuk label halaman (menggunakan geosite)
    public function getHalamanLabelAttribute()
    {
        $labels = [
            'tele' => '📍 Tele',
            'efrata' => '📍 Efrata',
            'sihotang' => '📍 Sihotang'
        ];
        return $labels[$this->geosite] ?? $this->geosite;
    }

    // Accessor untuk icon kategori
    public function getKategoriIconAttribute()
    {
        $icons = [
            'Kuliner' => '🍔',
            'Fashion' => '👕',
            'Kerajinan' => '🎨',
            'Pertanian' => '🌾',
            'Jasa' => '📋',
            'Lainnya' => '📌'
        ];
        return $icons[$this->kategori] ?? '🏪';
    }
}