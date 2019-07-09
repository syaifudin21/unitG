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
            'nama' => 'Nama Pegawai',
            'username' => 'pegawai',
            'password' => bcrypt('121212'),
        ]);

        DB::table('dokters')->insert([
            'nomor' => app('App\Helper\Images')->number(1, 'Dokter'),
            'nama' => 'Nama Pasien',
            'username'=> 'dokter',
            'password'=> bcrypt('121212'),
            'lp' => 'Laki-laki',
            'pendidikan'=> 'Dokter S3',
            'foto'=> NULL,
            'alamat'=> 'Alamat Dokter',
            'hp'=> '0121212998',
            'agama'=> 'Islam',
            'spesialis'=> 'Bedah Ginjal',
            'status_on'=> 'ON',
        ]);
        
        DB::table('pasiens')->insert([
            'nomor' => app('App\Helper\Images')->number(1, 'Pasien'),
            'nama' => 'Nama Pasien',
            'username'=> 'pasien',
            'password'=> bcrypt('121212'),
            'lp' => 'Laki-laki',
            'kota'=> 'Surabaya',
            'foto'=> NULL,
            'alamat_pasien'=> 'Alamat Pasien',
            'gol_darah'=> 'o negatif',
            'hp_pasien'=> '012812998',
            'pekerjaan'=> 'Wiraswasta',
            'agama'=> 'Islam',
            'nama_wali'=> 'Nama Wali',
            'hp_wali'=> '0812912128',
            'alamat_wali'=> 'Alamat Wali'
        ]);

        DB::table('daftar_periksas')->insert([
            'nomor_rs' => env('RS_NOMOR'),
            'nomor_periksa' => app('App\Helper\Images')->nomorperiksa(1),
            'pasien_id' => '1',
            'pegawai_id' => '1',
            'dokter_id' => '1',
            'cara_datang' => 'Sendiri',
            'jenis_kasus' => 'Non Trauma',
            'keadaan_pra' => '{"avpu":"lkasjdflk","pernafasan":"kljasldk","tensi_darah":"lkjads","suhu":"lkjas","nadi":"lkj","spo2":"klja"}',
            'tindakan_pra' => '{"o2":null,"cpr":null,"infus":null,"ngt":"NGT","nasopharingeal_tube":null,"ett":null,"suction":"Suction","krikotiroidotomi":null,"bvm":null,"bidai":null,"catheter_urine":"Catheter Urine","beban_tekan":null,"heacting":null,"obat":null,"lain":null}',
            'keluhan_utama' => 'Keluhan utama',
            'anemnesa' => 'hasil analisa pertama',
            'tanggal_masuk' => '2019-07-09 16:47:52',
        ]);

        DB::table('inventaris')->insert([
            'nomor_rs' => env('RS_NOMOR'),
            'jenis' => "Pipa kapiler",
            'stok' => "100",
            'ukuran' => "Besar"
        ]);
        

    }
}
