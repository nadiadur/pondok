<?php
// app/Models/Registration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'tahun_masuk',
        'nama_ibu',
        'nama_ayah',
        'foto_kk',
        'akte',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}