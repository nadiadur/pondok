<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nama',
        'tanggal_masuk',
        'alamat'
    ];
}