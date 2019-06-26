<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dokter extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nomor','nama','username','password','foto','alamat','lp','pendidikan', 'hp','spesialis', 'agama','status_on'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
    ];
    
    public function daftarperiksa()
    {
        return $this->hasMany(DaftarPeriksa::class, 'dokter_id', 'id');
    }
    public function alatterpasang()
    {
        return $this->hasMany(AlatTerpasang::class, 'dokter_id', 'id');
    }
    public function observasilanjutan()
    {
        return $this->hasMany(ObservasiLanjutan::class, 'dokter_id', 'id');
    }
    public function pemberianobat()
    {
        return $this->hasMany(PemberianObat::class, 'dokter_id', 'id');
    }
    public function tindakankeperawatan()
    {
        return $this->hasMany(TindakanKeperawatan::class, 'dokter_id', 'id');
    }
}
