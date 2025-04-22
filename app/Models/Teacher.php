<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nama',
        'pengampu',
        'alamat',
        'no_telpon',
        'gambar',
        'keterangan'
    ];
}