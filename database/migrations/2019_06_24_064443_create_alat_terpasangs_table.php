<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatTerpasangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_terpasangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor_rs');
            $table->integer('periksa_id');
            $table->integer('pasien_id');
            $table->integer('pegawai_id');
            $table->integer('dokter_id');
            $table->string('jenis');
            $table->string('lokasi')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('keterangan');
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
        Schema::dropIfExists('alat_terpasangs');
    }
}
