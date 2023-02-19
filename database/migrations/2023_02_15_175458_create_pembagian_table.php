<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembagian', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_setor')->nullable();
            $table->integer('persentase')->nullable();
            $table->integer('grup')->nullable();
            $table->bigInteger('id_pemodal')->unsigned()->nullable();
            $table->foreign('id_pemodal')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('id_group')->unsigned()->nullable();
            $table->foreign('id_group')->references('id')->on('group_hewans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembagian');
    }
}