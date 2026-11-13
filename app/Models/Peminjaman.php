<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'lab_id',
        'lab_alternatif_id',
        'verified_by',
        'tipe_peminjaman',
        'tanggal_peminjaman',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status',
        'catatan_aslab',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_peminjaman' => 'date',
            'verified_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    public function labAlternatif()
    {
        return $this->belongsTo(Lab::class, 'lab_alternatif_id');
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function logKunci()
    {
        return $this->hasOne(LogKunci::class, 'peminjaman_id');
    }
}