<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('nama');
            $table->date('masa_aktif_mulai');
            $table->date('masa_aktif_selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('management');
    }
};