<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'created_by',
        'nama',
        'nama_usaha',
        'pemilik',
        'no_telepon',
        'kategori',
        'geosite',
        'alamat',
        'deskripsi',
        'foto_utama',
        'status',
        'urutan',
    ];

    protected $attributes = [
        'geosite' => 'tele',
        'status'  => 1,
    ];

    // Relasi: umkm dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto_utama) {
            return asset('storage/' . $this->foto_utama);
        }
        return null;
    }

    public function getHalamanLabelAttribute()
    {
        $labels = [
            'tele'      => '📍 Tele',
            'efrata'    => '📍 Efrata',
            'sihotang'  => '📍 Sihotang',
        ];
        return $labels[$this->geosite] ?? $this->geosite;
    }

    public function getKategoriIconAttribute()
    {
        $icons = [
            'Kuliner'   => '🍔',
            'Fashion'   => '👕',
            'Kerajinan' => '🎨',
            'Pertanian' => '🌾',
            'Jasa'      => '📋',
            'Lainnya'   => '📌',
        ];
        return $icons[$this->kategori] ?? '🏪';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($umkm) {
            if (auth()->check() && empty($umkm->created_by)) {
                $umkm->created_by = auth()->id();
            }
        });
    }
}