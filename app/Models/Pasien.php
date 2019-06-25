<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama','username','password','lp','kota','alamat_pasien','hp_pasien','pekerjaan','agama','hp_wali','alamat_wali'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
    ];
}
