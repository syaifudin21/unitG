<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $fillable = [
        'nomor_rs','nim_rs','nama','kota','telephone','alamat'
    ];
}
