<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->bigInteger('id_pemodal')->unsigned()->nullable();
            $table->foreign('id_pemodal')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('id_pengadas')->unsigned()->nullable();
            $table->foreign('id_pengadas')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('laporans');
    }
}
