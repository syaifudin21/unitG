<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanKeperawatan extends Model
{
    protected $fillable = [
        'nomor_rs','periksa_id','pasien_id','pegawai_id','dokter_id','tindakan'
    ];
}
