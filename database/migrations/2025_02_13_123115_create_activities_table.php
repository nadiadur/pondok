<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->string('gambar');
            $table->string('lokasi');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
};