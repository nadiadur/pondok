<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'kategori',
        'nama_kegiatan',
        'tanggal',
        'gambar',
        'lokasi',
        'keterangan'
    ];
}