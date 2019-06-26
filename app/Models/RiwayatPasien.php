<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPasien extends Model
{
    protected $fillable = [
        'nomor_rs','pasien_id','dokter_id','alergi','penyakit'
    ];
    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}
