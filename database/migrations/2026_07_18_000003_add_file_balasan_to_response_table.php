<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileBalasanToResponseTable extends Migration
{
    public function up()
    {
        Schema::table('response', function (Blueprint $table) {
            $table->string('file_balasan')->nullable()->after('response');
        });
    }

    public function down()
    {
        Schema::table('response', function (Blueprint $table) {
            $table->dropColumn('file_balasan');
        });
    }
}
