<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeResponseFieldsNullable extends Migration
{
    public function up()
    {
        Schema::table('response', function (Blueprint $table) {
            $table->date('response_date')->nullable()->change();
            $table->text('response')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('response', function (Blueprint $table) {
            $table->date('response_date')->nullable(false)->change();
            $table->text('response')->nullable(false)->change();
        });
    }
}
