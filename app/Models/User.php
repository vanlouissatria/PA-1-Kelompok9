<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Relasi balik: satu admin bisa membuat banyak konten
    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'created_by');
    }

    public function umkms()
    {
        return $this->hasMany(Umkm::class, 'created_by');
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'created_by');
    }

    public function penginapans()
    {
        return $this->hasMany(Penginapan::class, 'created_by');
    }

    public function destinasis()
    {
        return $this->hasMany(Destinasi::class, 'created_by');
    }

    public function warisans()
    {
        return $this->hasMany(Warisan::class, 'created_by');
    }

    public function informasis()
    {
        return $this->hasMany(Informasi::class, 'created_by');
    }
}