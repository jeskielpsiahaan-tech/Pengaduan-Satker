<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatkerTable extends Migration
{
    public function up()
    {
        Schema::create('satker', function (Blueprint $table) {
            $table->id();
            $table->string('kode_satker')->unique();
            $table->string('nama_satker');
            $table->string('nama_pelapor');
            $table->string('jabatan_pelapor')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('satker');
    }
}
