<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPasien;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Dokter;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pasien');
    }
    public function profil()
    {
        $profil = Auth::user();
        return view('pasien.profil', compact('profil'));
    }
    public function diagnosa()
    {
        $diagnosas = RiwayatPasien::where('pasien_id', Auth::user()->id)->paginate(20);
        return view('pasien.diagnosa', compact('diagnosas'));
    }
    
    public function profilupdate(Request $request)
    {
        $user = Pasien::findOrFail(Auth::user()->id);
        $userd = Pasien::find(Auth::user()->id);
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
        $user = Pasien::findOrFail(Auth::user()->id);
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
    public function dokterprofil($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('pasien.dokter-show', compact('dokter'));
    }
}
