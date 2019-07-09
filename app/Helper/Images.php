<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function upload($request, $path, $name = null)
    {
        $filenamewithextension = $request->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->getClientOriginalExtension();
        $directori = 'images/'.env('APP_ENV').'/'.$path.'/';
        $filenamefile = empty($name)? $filename.uniqid().'.'.$extension: $name.'_'.$filename.uniqid().'.'.$extension;
        $request->move($directori,$filenamefile);
        return [
            'url' => $directori.$filenamefile,
            'name' => $filename
        ];
    }
    public function number($id, $auth)
    {
        $iduser = sprintf('%09d', $id);
        $auth = ($auth=='Dokter')? 930: 210;
        $formula = $auth.$iduser;

        return $formula;
    }
    public function nomorperiksa($id)
    {
        $id = substr($id, -4);
        $id = sprintf('%03d', $id);
        $date = date('ymd');
        $formula =$date.'0'.$id;

        return $formula;
    }
}
