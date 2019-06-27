<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\DaftarPeriksa;
use App\Models\Pegawai;
use App\Models\Dokter;
use App\Models\RumahSakit;
use Carbon\Carbon;

class PeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $periksas = DaftarPeriksa::where('nomor_rs','01290')->paginate(20);
    	return view('pegawai.periksa', compact('periksas'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        $dokters = Dokter::where('status_on', 'ON')->get();
        return view('pegawai.periksa-tambah', compact('pegawais', 'dokters'));
    }
    public function show($id)
    {
        $periksa = DaftarPeriksa::find($id);
        return view('pegawai.periksa-show', compact('periksa'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'pasien_id' => 'required|string',
            'pegawai_id' => 'required|string',
            'dokter_id' => 'required|string',
            'cara_datang' => 'required|string',
            'jenis_kasus' => 'required|string',
        ]);

        $rs = RumahSakit::find(1);

        $periksa = new DaftarPeriksa();
        $periksa->fill($request->all());
        $periksa['nomor_rs'] = $rs->nomor_rs;
        $periksa['tanggal_masuk'] = date("Y-m-d H:i:s");
        $periksa->save();

        if($periksa){
            return redirect(route('pegawai.periksa.show',['id'=> $periksa->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $periksa = DaftarPeriksa::findOrFail($id);
        return view('pegawai.periksa-edit', compact('periksa'));
    }
    public function status()
    {
        $periksa = DaftarPeriksa::find($_GET['id']);
        if ($periksa->status_on == 'ON') {
            $periksa['status_on'] = 'OFF';
        }else{
            $periksa['status_on'] = 'ON';
        }
        $periksa->save();
        return response(['kode'=> '00', 'status' => $periksa->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $periksa =DaftarPeriksa::findOrFail($request->id);
        $periksa->fill($request->all());
        $periksa->save();

        if($periksa){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function storepra(Request $request)
    {
        // dd($request);
        $request->id = 4;
        $periksa = DaftarPeriksa::findOrFail($request->id);
        $periksa['keadaan_pra->avpu'] = $request->avpu;
        $periksa['keadaan_pra->pernafasan'] = $request->pernafasan;
        $periksa['keadaan_pra->tensi_darah'] = $request->tensidarah;
        $periksa['keadaan_pra->suhu'] = $request->suhu;
        $periksa['keadaan_pra->nadi'] = $request->nadi;
        $periksa['keadaan_pra->spo2'] = $request->spo2;
        $periksa['tindakan_pra->o2'] = $request->o2;
        $periksa['tindakan_pra->cpr'] = $request->cpr;
        $periksa['tindakan_pra->infus'] = $request->infus;
        $periksa['tindakan_pra->ngt'] = $request->ngt;
        $periksa['tindakan_pra->nasopharingeal_tube'] = $request->nasopharingealTube;
        $periksa['tindakan_pra->ett'] = $request->ett;
        $periksa['tindakan_pra->suction'] = $request->suction;
        $periksa['tindakan_pra->krikotiroidotomi'] = $request->krikotiroidotomi;
        $periksa['tindakan_pra->bvm'] = $request->bvm;
        $periksa['tindakan_pra->bidai'] = $request->bidai;
        $periksa['tindakan_pra->catheter_urine'] = $request->catheterUrine;
        $periksa['tindakan_pra->beban_tekan'] = $request->bebanTekan;
        $periksa['tindakan_pra->heacting'] = $request->heacting;
        $periksa['tindakan_pra->obat'] = $request->obat;
        $periksa['tindakan_pra->lain'] = $request->lain;
        $periksa['keluhan_utama'] = $request->keluhanUtama;
        $periksa['anemnesa'] = $request->anemnesa;
        $periksa->save();
        
        if($periksa){
            return back()
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function delete($id)
    {
        $periksa = DaftarPeriksa::findOrFail($id);
        if (!empty($periksa)) {
            File::delete($periksa->foto);
            $periksa->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
