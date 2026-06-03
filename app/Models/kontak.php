<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'alamat',
        'kode_pos',
        'instagram',
        'maps',
        'telepon1',
        'telepon2',
        'telepon3',
        'email1',
        'email2',
        'email3'
    ];
}
