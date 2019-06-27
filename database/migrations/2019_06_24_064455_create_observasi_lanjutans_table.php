<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservasiLanjutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observasi_lanjutans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor_rs');
            $table->integer('periksa_id');
            $table->integer('pasien_id');
            $table->integer('pegawai_id')->nullable();
            $table->integer('dokter_id')->nullable();
            $table->string('gcs')->nullable();
            $table->string('t')->nullable();
            $table->string('n')->nullable();
            $table->string('rr')->nullable();
            $table->string('s')->nullable();
            $table->string('sat')->nullable();
            $table->text('keluhan')->nullable();
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
        Schema::dropIfExists('observasi_lanjutans');
    }
}
