<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false; // entah kenapa error kalau kt tdk tambah ini anjay

    protected $fillable = ['nama_role'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}