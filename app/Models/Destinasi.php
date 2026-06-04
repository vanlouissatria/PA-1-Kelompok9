<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasis'; 

    // Sesuaikan dengan input yang ada di Controller & Migration
    protected $fillable = [
        'nama_destinasi', 
        'kategori', 
        'lokasi', 
        'deskripsi', 
        'gambar'
    ];
    protected $attributes = [
        'status' => 1,
    ];
}