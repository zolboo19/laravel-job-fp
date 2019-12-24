<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('number_of_vacancy')->after('last_date')->nullable();
            $table->string('experience')->after('number_of_vacancy')->nullable();
            $table->string('gender')->after('experience')->nullable();
            $table->string('salary')->after('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('number_of_vacancy');
            $table->dropColumn('experience');
            $table->dropColumn('gender');
            $table->dropColumn('salary');
        });
    }
}
