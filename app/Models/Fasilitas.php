<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';

    protected $fillable = [
        'created_by',
        'nama',
        'deskripsi',
        'gambar',
        'harga',
        'urutan',
        'geosite',
        'status',
    ];

    protected $attributes = [
        'geosite' => 'tele',
        'status'  => 1,
    ];

    // Relasi: fasilitas dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}