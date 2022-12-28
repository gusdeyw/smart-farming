<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hewans', function (Blueprint $table) {
            $table->bigInteger('id_pemodal')->unsigned()->nullable();
            $table->foreign('id_pemodal')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('id_pengadas')->unsigned()->nullable();
            $table->foreign('id_pengadas')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
            $table->dropForeign(['id_pemodal']);
            $table->dropColumn('id_pemodal');
            $table->dropForeign(['id_pengadas']);
            $table->dropColumn('id_pengadas');
        });
    }
};
