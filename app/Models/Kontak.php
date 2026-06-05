<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'alamat',
        'kode_pos',
        'instagram',
        'facebook',
        'tiktok',
        'twitter',
        'youtube',
        'maps',
        'telepon1',
        'telepon2',
        'telepon3',
        'email1',
        'email2',
        'email3'
    ];
}
