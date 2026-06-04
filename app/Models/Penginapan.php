<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $table = 'penginapan';

    protected $fillable = [
        'created_by',
        'nama',
        'deskripsi',
        'alamat',
        'no_telepon',
        'harga',
        'gambar',
        'geosite',
        'status',
        'urutan',
    ];

    // Relasi: penginapan dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}