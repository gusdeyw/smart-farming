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
        Schema::table('users', function (Blueprint $table) {
            $table->string('tgl_lahir');
            $table->string('alamat');
            $table->string('nama_ibu_kandung');
            $table->string('bank');
            $table->string('no_rekening');
            $table->string('no_telp');
            $table->string('sts_tempat_tinggal');
            $table->string('foto_ktp');
            $table->string('foto_npwp');
            $table->integer('status')->default(0);
            $table->integer('pendapatan')->nullable();
            $table->string('alamat_tanah')->nullable();
            $table->string('keahlian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('alamat');
            $table->dropColumn('nama_ibu_kandung');
            $table->dropColumn('bank');
            $table->dropColumn('no_rekening');
            $table->dropColumn('sts_tempat_tinggal');
            $table->dropColumn('foto_ktp');
            $table->dropColumn('foto_npwp');
            $table->dropColumn('status');
            $table->dropColumn('pendapatan');
            $table->dropColumn('alamat_tanah');
            $table->dropColumn('keahlian');
        });
    }
};
