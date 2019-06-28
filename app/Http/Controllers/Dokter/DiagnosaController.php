<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarPeriksa;
use App\Models\RiwayatPasien;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dokter');
    }
    public function index()
    {
        $diagnosas = RiwayatPasien::where('dokter_id', Auth::user()->id)->paginate(20);
        return view('dokter.diagnosa', compact('diagnosas'));
    }
    public function create($periksa_id)
    {
        $periksa = DaftarPeriksa::findOrFail($periksa_id);
        return view('dokter.diagnosa-create', compact('periksa'));
    }
    public function store(Request $request)
    {
        $keperawatan = new RiwayatPasien();
        $keperawatan->fill($request->all());
        $keperawatan->save();

        if($keperawatan){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
}
