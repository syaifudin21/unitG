<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPasien extends Model
{
    protected $fillable = [
        'nomor_rs','pasien_id','dokter_id','alergi','penyakit', 'nomor_periksa'
    ];
    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'nomor_rs');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
    public function dokter(){
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
    public function periksa(){
        return $this->belongsTo(DaftarPeriksa::class, 'nomor_periksa', 'nomor_periksa');
    }
}
