<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKunci extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'aslab_id',
        'nomor_identitas_ktm',
        'nama_penitip',
        'status_kunci',
        'waktu_diambil',
        'waktu_dikembalikan',
        'catatan_kondisi',
    ];

    protected function casts(): array
    {
        return [
            'waktu_diambil' => 'datetime',
            'waktu_dikembalikan' => 'datetime',
        ];
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    public function aslab()
    {
        return $this->belongsTo(User::class, 'aslab_id');
    }
}