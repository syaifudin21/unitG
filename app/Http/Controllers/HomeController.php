<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class HomeController extends Controller
{
    public function home()
    {
        $profil = RumahSakit::find(1);
        return view('front.front-home', compact('profil'));
    }
    public function daftar()
    {
        $profil = RumahSakit::find(1);
        return view('front.front-daftar', compact('profil'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'lp' => 'required|string',
            'kota' => 'required|string',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'alamat_pasien' => 'required|string',
            'gol_darah' => 'required|string',
            'hp_pasien' => 'required|string',
            'pekerjaan' => 'required|string',
            'agama' => 'required|string',
            'hp_wali' => 'required|string',
            'alamat_wali' => 'required|string'
        ]);

        $pasien = new Pasien();
        $pasien->fill($request->all());
        $upload = app('App\Helper\Images')->upload($request->file('foto'), 'pasien');
        $pasien['foto'] = $upload['url'];
        $pasien->save();

        if($pasien){
            return redirect(route('pasien.login'))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
}
