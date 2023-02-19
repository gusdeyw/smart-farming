<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_hewans', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_riwayat');
            $table->string('kondisi_hewan');
            $table->string('status_jual')->nullable();
            $table->integer('berat_hewat');
            $table->string('foto_kondisi');
            $table->string('status_berat');
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
        Schema::dropIfExists('riwayat_hewans');
    }
};