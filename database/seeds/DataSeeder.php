<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rumah_sakits')->insert([
            'nomor_rs' => '01290',
            'nim_rs' => '18921029',
            'nama' => 'RS MUJI RAHAYU',
            'kota' => 'Surabaya',
            'telephone' => '( 031 ) 7404132',
            'alamat' => 'Jl Raya Manukan Wetan 46-48 SURABAYA 60185'
        ]);
        DB::table('pegawais')->insert([
            'nama' => 'RS MUJI RAHAYU',
            'username' => 'pegawai',
            'password' => bcrypt('121212'),
        ]);
    }
}
