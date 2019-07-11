<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\RumahSakit;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;

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
            'username' => 'required|string|unique:pasiens',
            'password' => 'required|string',
            'lp' => 'required|string',
            'kota' => 'required|string',
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
        $pasien['password'] = Hash::make($request['password']);
        $pasien->save();

        $pasien['nomor'] = app('App\Helper\Images')->number($pasien->id, 'Pasien');
        $pasien->save();

        if($pasien){
            Auth::guard('pasien')->logout();
            return redirect(route('pasien.login'))
            ->with(['alert'=> "'title':'Pasien ".$pasien->nama." Berhasil Daftar','text':'silahkan login dan masukkan password', 'icon':'success'"])
            ->withInput($request->all());
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function cari()
    {
        $karakter = isset($_GET['karakter']) ? $_GET['karakter'] : '000000000000';
        $pasien = Pasien::where('nomor', $karakter)->orWhere('username', $karakter)->first();
        if(!empty($pasien)){
            return ['pasien' => $pasien, 'kode' => '00'];
        }else{
            return ['kode' => '01', 'message' => 'Tidak Diktemukan'];
        }
    }
}
