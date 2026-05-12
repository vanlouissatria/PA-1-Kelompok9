<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmGalery extends Model
{
    protected $table = 'umkm_galeries';
    
    protected $fillable = ['umkm_id', 'foto', 'keterangan'];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}