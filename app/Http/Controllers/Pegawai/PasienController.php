<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use File;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $pasiens = Pasien::all();
    	return view('pegawai.pasien', compact('pasiens'));
    }
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pegawai.pasien-show', compact('pasien'));
    }
    public function reset($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien['password'] = bcrypt(env('DEFAULT_PASSWORD', 121212));
        $pasien->save();
        
        if ($pasien) {
            return response()->json(['kode'=>'00', 'message'=> 'Pasien Berhasil di Reset'], 200);
        }else{
            return response()->json(['kode'=>'01', 'message'=> 'Pasien Gagal di Reset'], 200);
        }
    }
    public function create()
    {
        return view('pegawai.pasien-create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|string',
            'lp' => 'required|string',
            'nama_wali' => 'required|string',
            'hp_wali' => 'required|string',
            'alamat_wali' => 'required|string'
        ]);

        $pasien = new Pasien();
        $pasien->fill($request->all());
        $pasien['username'] = 'pasien'.date('ymdHi');
        $pasien['password'] = bcrypt(env("DEFAULT_PASSWORD", 121212));
        $pasien->save();

        $pasien['nomor'] = app('App\Helper\Images')->number($pasien->id, 'Pasien');
        $pasien->save();


        if($pasien){
            return redirect(route('pegawai.pasien.show',['id'=> $pasien->id]))
            ->with(['alert'=> "'title':'Pasien ".$pasien->nama." Berhasil Daftar','text':'silahkan login dan masukkan password', 'icon':'success'"])
            ->withInput($request->all());
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function delete($id)
    {
        $pasien = Pasien::findOrFail($id);
        if (!empty($pasien)) {
            File::delete($pasien->foto);
            $pasien->delete();
            return response()->json(['kode'=>'00', 'message'=> 'Pasien Berhasil di Hapus'], 200);
        }else{
            return response()->json(['kode'=>'01', 'message'=> 'Pasien Gagal di Hapus'], 200);
        }
    }
}
