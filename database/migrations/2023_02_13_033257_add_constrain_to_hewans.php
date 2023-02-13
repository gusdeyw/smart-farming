<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstrainToHewans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hewans', function (Blueprint $table) {
            $table->bigInteger('id_group')->unsigned()->nullable();
            $table->foreign('id_group')->references('id')->on('group_hewans')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hewans', function (Blueprint $table) {
            $table->dropForeign(['id_group']);
            $table->dropColumn('id_group');
        });
    }
}