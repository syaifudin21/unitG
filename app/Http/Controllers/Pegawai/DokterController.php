<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Dokter;
use File;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $dokters = Dokter::all();
    	return view('pegawai.dokter', compact('dokters'));
    }

    public function create()
    {
        return view('pegawai.dokter-create');
    }
    public function show($id)
    {
        $dokter = Dokter::find($id);
        return view('pegawai.dokter-show', compact('dokter'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'alamat' => 'required|string',
        ]);


        $dokter = new Dokter();
        $dokter->fill($request->all());
        $upload = app('App\Helper\Images')->upload($request->file('foto'), 'dokter');
        $dokter['foto'] = $upload['url'];
        $dokter['password'] = Hash::make($request['password']);
        $dokter->save();

        $dokter['nomor'] = app('App\Helper\Images')->number($dokter->id,'Dokter');
        $dokter->save();

        if($dokter){
            return redirect(route('pegawai.dokter.show',['id'=> $dokter->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('pegawai.dokter-edit', compact('dokter'));
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

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $dokter =Dokter::findOrFail($request->id);
        $dokter->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'dokter');
            $dokter['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $dokter['password'] = Hash::make($request['password']);
        }
        $dokter->save();

        if($dokter){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function delete($id)
    {
        $dokter = Dokter::findOrFail($id);
        if (!empty($dokter)) {
            File::delete($dokter->foto);

            // foreach ($pegawai->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $dokter->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
