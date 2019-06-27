<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarPeriksasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_periksas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor_rs');
            $table->integer('pasien_id');
            $table->integer('pegawai_id');
            $table->integer('dokter_id');
            $table->string('cara_datang');
            $table->string('jenis_kasus');
            $table->text('keadaan_pra')->nullable();
            $table->text('tindakan_pra')->nullable();
            $table->text('circulation')->nullable();
            $table->text('breathing')->nullable();
            $table->text('ariway')->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->text('anemnesa')->nullable();
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar')->nullable();
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
        Schema::dropIfExists('daftar_periksas');
    }
}
