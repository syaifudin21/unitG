<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPeriksa extends Model
{
    protected $fillable = [
        'nomor_rs','pasien_id','pegawai_id','dokter_id','cara_datang','jenis_kasus','keadaan_pra','circulation','breathing','ariway','keluhan_utama','anamnesa','tanggal_masuk','tanggal_keluar'
    ];
}
