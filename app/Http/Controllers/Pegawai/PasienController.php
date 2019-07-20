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
