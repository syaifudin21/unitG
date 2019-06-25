<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemberianObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemberian_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor_rs');
            $table->integer('periksa_id');
            $table->integer('pasien_id');
            $table->integer('pegawai_id');
            $table->integer('dokter_id');
            $table->string('obat_cairan');
            $table->string('dosis');
            $table->string('rute')->nullable();
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
        Schema::dropIfExists('pemberian_obats');
    }
}
