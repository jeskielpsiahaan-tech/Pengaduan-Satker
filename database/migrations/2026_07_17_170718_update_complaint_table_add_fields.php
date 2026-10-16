<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComplaintTableAddFields extends Migration
{
    public function up()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table->string('tipe_pengadu')->default('masyarakat')->after('society_id');
            $table->unsignedBigInteger('satker_id')->nullable()->after('tipe_pengadu');
            $table->string('photo')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table->dropColumn(['tipe_pengadu', 'satker_id']);
        });
    }
}
