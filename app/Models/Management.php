<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'jabatan',
        'nama',
        'masa_aktif_mulai',
        'masa_aktif_selesai'
    ];
}