<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nim_nip',
        'name',
        'email',
        'password',
        'no_wa',
        'kelas_jurusan',
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
            'password' => 'hashed',
        ];
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'user_id');
    }

    public function peminjamanDiverifikasi()
    {
        return $this->hasMany(Peminjaman::class, 'verified_by');
    }

    public function logKuncis()
    {
        return $this->hasMany(LogKunci::class, 'aslab_id');
    }
}