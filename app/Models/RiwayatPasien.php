<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPasien extends Model
{
    protected $fillable = [
        'nomor_rs','pasien_id','dokter_id','alergi','penyakit'
    ];
}
