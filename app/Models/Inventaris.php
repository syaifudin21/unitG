<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'nomor_rs','jenis','stok','ukuran'
    ];
    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class, 'nomor_rs', 'id');
    }
    public function inventaris()
    {
        return $this->hasMany(AlatTerpasang::class, 'inventaris_id', 'id');
    }
    public function terpasang($id)
    {
        $terpasang = AlatTerpasang::where('inventaris_id', $id)->where('status', 'Terpasang')->count();
        return $terpasang;
    }
}
