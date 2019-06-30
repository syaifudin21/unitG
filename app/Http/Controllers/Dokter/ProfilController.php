<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Pasien;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dokter');
    }
    public function profil()
    {
        $profil = Auth::user();
        return view('dokter.profil', compact('profil'));
    }

    public function profilupdate(Request $request)
    {
        $user = Dokter::findOrFail(Auth::user()->id);
        $userd = Dokter::find(Auth::user()->id);
        $user->fill($request->all());

        if ($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'profil');
            $user['foto'] = $upload['url'];
            if(!empty($userd->foto)){
                File::delete($userd->foto);
            }
        }

        $user->update();
        if($user){
            return back()
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function profilupdatepasword(Request $request)
    {
        $user = Dokter::findOrFail(Auth::user()->id);
        if (Hash::check($request->passwordlama, $user->password)){

            if ($request->passwordbaru == $request->cpasswordbaru){
                $passwordbaru = Hash::make($request->passwordbaru);
                 $user->update(['password' => $passwordbaru]);
                 return back()
                 ->with(['alert'=> "'title':'Berhasil','text':'Password Berhasil Diupdate', 'icon':'success','buttons': false, 'timer': 1200"]);
            }else{
                return back()
                ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Konfirmasi password baru tidak sesuai', 'icon':'error'"]);
            }
        }else{
            return back()
            ->with(['alert'=> "'title':'Password lama tidak sesuai','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"]);
        }
    }
    public function status()
    {
        $dokter = Dokter::find($_GET['id']);
        if ($dokter->status_on == 'ON') {
            $dokter['status_on'] = 'OFF';
        }else{
            $dokter['status_on'] = 'ON';
        }
        $dokter->save();
        return response(['kode'=> '00', 'status' => $dokter->status_on]);
    }
    public function dokterprofil($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.dokter-show', compact('dokter'));
    }
    public function pasienprofil($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('dokter.pasien-show', compact('pasien'));
    }
}
