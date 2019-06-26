<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nomor_rs','nama','username','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
    ];

    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'id');
    }
    public function daftarperiksa()
    {
        return $this->hasMany(DaftarPeriksa::class, 'pegawai_id', 'id');
    }
    public function alatterpasang()
    {
        return $this->hasMany(AlatTerpasang::class, 'pegawai_id', 'id');
    }
    public function observasilanjutan()
    {
        return $this->hasMany(ObservasiLanjutan::class, 'pegawai_id', 'id');
    }
    public function pemberianobat()
    {
        return $this->hasMany(PemberianObat::class, 'pegawai_id', 'id');
    }
    public function tindakankeperawatan()
    {
        return $this->hasMany(TindakanKeperawatan::class, 'pegawai_id', 'id');
    }
}
