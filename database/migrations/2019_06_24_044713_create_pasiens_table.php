<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('lp',['Laki-laki', 'Perempuan']);
            $table->string('kota');
            $table->text('foto')->nullable();
            $table->text('alamat_pasien');
            $table->string('gol_darah')->nullable();
            $table->string('hp_pasien')->nullable();
            $table->string('pekerjaan')->default("Wiraswasta");
            $table->string('agama');
            $table->string('nama_wali')->nullable();
            $table->string('hp_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('pasiens');
    }
}
