<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nomor','nama','username','password','lp','kota','foto','alamat_pasien','gol_darah','hp_pasien','pekerjaan','agama','nama_wali','hp_wali','alamat_wali'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        
    ];
    public function daftarperiksa()
    {
        return $this->hasMany(DaftarPeriksa::class, 'pasien_id', 'id');
    }
    public function riwayatpasien()
    {
        return $this->hasMany(RiwayatPasien::class, 'pasien_id', 'id');
    }
    public function alatterpasang()
    {
        return $this->hasMany(AlatTerpasang::class, 'pasien_id', 'id');
    }
    public function observasilanjutan()
    {
        return $this->hasMany(ObservasiLanjutan::class, 'pasien_id', 'id');
    }
    public function pemberianobat()
    {
        return $this->hasMany(PemberianObat::class, 'pasien_id', 'id');
    }
    public function tindakankeperawatan()
    {
        return $this->hasMany(TindakanKeperawatan::class, 'pasien_id', 'id');
    }
}
