<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkms';
    
    protected $fillable = [
        'nama_usaha', 'pemilik', 'kategori', 'deskripsi', 'alamat',
        'no_telepon', 'email', 'website', 'logo', 'foto_utama',
        'latitude', 'longitude', 'status', 'views'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}