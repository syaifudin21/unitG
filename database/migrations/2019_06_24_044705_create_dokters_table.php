<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor')->nullable();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->enum('lp',['Laki-laki', 'Perempuan']);
            $table->string('pendidikan')->nullable();
            $table->string('hp')->nullable();
            $table->string('spesialis')->nullable();
            $table->string('agama')->nullable();
            $table->text('foto')->nullable();
            $table->enum('status_on',['ON', 'OFF'])->default("OFF");
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
        Schema::dropIfExists('dokters');
    }
}
