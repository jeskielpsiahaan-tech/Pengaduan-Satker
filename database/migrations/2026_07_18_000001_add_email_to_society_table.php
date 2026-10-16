<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToSocietyTable extends Migration
{
    public function up()
    {
        Schema::table('society', function (Blueprint $table) {
            if (!Schema::hasColumn('society', 'email')) {
                $table->string('email')->nullable()->after('username');
            }
        });
    }

    public function down()
    {
        Schema::table('society', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
