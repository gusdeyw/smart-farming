<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupHewan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_hewans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_group');
            $table->string('jenis_group');
            $table->integer('harga_group');
            $table->integer('modal_group');
            $table->string('kontrak_group');
            $table->integer('target_berat_group');
            $table->integer('status_group')->default(0);
            $table->string('gambar_group');
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
        Schema::dropIfExists('group_hewans');
    }
}