<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use File;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $pasiens = Pasien::paginate(20);
    	return view('pegawai.pasien', compact('pasiens'));
    }
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pegawai.pasien-show', compact('pasien'));
    }
    public function delete($id)
    {
        $pasien = Pasien::findOrFail($id);
        if (!empty($pasien)) {
            File::delete($pasien->foto);
            $pasien->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
