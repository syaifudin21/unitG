<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama','username','password','lp','kota','foto','alamat_pasien','gol_darah','hp_pasien','pekerjaan','agama','nama_wali','hp_wali','alamat_wali'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        
    ];
}
