<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $fillable = [
        'nomor_rs','nim_rs','nama','kota','telephone','alamat'
    ];
    
    public function riwayatpasien()
    {
        return $this->hasMany(RiwayatPasien::class, 'nomor_rs', 'id');
    }
    public function alatterpasang()
    {
        return $this->hasMany(AlatTerpasang::class, 'nomor_rs', 'id');
    }
    public function observasilanjutan()
    {
        return $this->hasMany(ObservasiLanjutan::class, 'nomor_rs', 'id');
    }
    public function pemberianobat()
    {
        return $this->hasMany(PemberianObat::class, 'nomor_rs', 'id');
    }
    public function tindakankeperawatan()
    {
        return $this->hasMany(TindakanKeperawatan::class, 'nomor_rs', 'id');
    }
}
