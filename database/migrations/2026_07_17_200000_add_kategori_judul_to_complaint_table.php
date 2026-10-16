<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriJudulToComplaintTable extends Migration
{
    public function up()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table->string('judul')->nullable()->after('nik');
            $table->string('kategori')->nullable()->after('judul');
            $table->string('photo')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table->dropColumn(['judul', 'kategori']);
        });
    }
}
