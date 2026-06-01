<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'harga', 'urutan', 'status', 'geosite'];

    // Default attributes to ensure a geosite and status when creating models
    protected $attributes = [
        'geosite' => 'tele',
        'status' => 1,
    ];
}