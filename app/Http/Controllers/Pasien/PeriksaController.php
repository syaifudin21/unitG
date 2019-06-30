<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarPeriksa;
use App\Models\RiwayatPasien;
use App\Models\ObservasiLanjutan;

class PeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pasien');
    }
    public function index()
    {
        $periksas = DaftarPeriksa::where('pasien_id', Auth::user()->id)->paginate(20);
        return view('pasien.periksa', compact('periksas'));
    }
    public function show($id)
    {
        $periksa = DaftarPeriksa::find($id);
        return view('pasien.periksa-show', compact('periksa'));
    }
    public function createobservasi($periksa_id)
    {
        $periksa = DaftarPeriksa::findOrFail($periksa_id);
        return view('pasien.observasi-create', compact('periksa'));
    }
    public function storeobservasi(Request $request)
    {
        $observasi = new ObservasiLanjutan();
        $observasi->fill($request->all());
        $observasi->save();

        if($observasi){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function keluhan()
    {
        $keluhans = ObservasiLanjutan::where('pasien_id', Auth::user()->id)->paginate(20);
        return view('pasien.keluhan', compact('keluhans'));
    }
}
