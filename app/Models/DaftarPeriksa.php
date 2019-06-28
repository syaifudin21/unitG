<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPeriksa extends Model
{
    protected $fillable = [
        'nomor_rs','pasien_id','pegawai_id','dokter_id','cara_datang','jenis_kasus','keadaan_pra','tindakan_pra','keluhan_utama','anemnesa','circulation','breathing','airway','tanggal_masuk','tanggal_keluar', 'hasil_akhir'
    ];
    protected $casts = [
        'keadaan_pra' => 'array',
        'tindakan_pra' => 'array',
        'airway' => 'array',
        'breathing' => 'array',
        'circulation' => 'array',
        'hasil_akhir' => 'array'

    ];
    
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
    public function dokter(){
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'id');
    }
    public function alatterpasang()
    {
        return $this->hasMany(AlatTerpasang::class, 'periksa_id', 'id');
    }
    public function observasilanjutan()
    {
        return $this->hasMany(ObservasiLanjutan::class, 'periksa_id', 'id');
    }
    public function pemberianobat()
    {
        return $this->hasMany(PemberianObat::class, 'periksa_id', 'id');
    }
    public function tindakankeperawatan()
    {
        return $this->hasMany(TindakanKeperawatan::class, 'periksa_id', 'id');
    }
}
