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
        Schema::create('hewans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->string('jenis_hewan');
            $table->integer('harga_hewan');
            $table->integer('modal_hewan');
            $table->string('kontrak_hewan');
            $table->integer('target_berat_hewan');
            $table->int('status_hewan')->default(0);
            $table->string('gambar');
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
        Schema::dropIfExists('hewans');
    }
};
