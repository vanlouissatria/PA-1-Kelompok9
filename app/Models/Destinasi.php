<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasis';

    protected $fillable = [
        'created_by',
        'nama_destinasi',
        'kategori',
        'lokasi',
        'deskripsi',
        'gambar',
        'status',
    ];

    protected $attributes = [
        'status' => 1,
    ];

    // Relasi: destinasi dibuat oleh satu admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}