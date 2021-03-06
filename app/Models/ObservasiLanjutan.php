<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservasiLanjutan extends Model
{
    protected $fillable = [
        'nomor_rs','periksa_id','pasien_id','pegawai_id','dokter_id','gcs','t','n','rr','s','sat','keluhan'
    ];
    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'nomor_rs');
    }
    public function periksa(){
        return $this->belongsTo(DaftarPeriksa::class, 'periksa_id', 'id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
    public function dokter(){
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
