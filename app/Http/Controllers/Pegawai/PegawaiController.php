<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use File;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $pegawais = Pegawai::all();
    	return view('pegawai.pegawai', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.pegawai-create');
    }
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawai-show', compact('pegawai'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pegawais',
            'password' => 'required|string',
        ]);


        $pegawai = new Pegawai();
        $pegawai->fill($request->all());
        $pegawai['password'] = Hash::make($request['password']);
        $pegawai->save();

        if($pegawai){
            return redirect(route('pegawai.pegawai.show',['id'=> $pegawai->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.pegawai-edit', compact('pegawai'));
    }
    public function status()
    {
        $pegawai = Pegawai::find($_GET['id']);
        if ($pegawai->status_on == 'ON') {
            $pegawai['status_on'] = 'OFF';
        }else{
            $pegawai['status_on'] = 'ON';
        }
        $pegawai->save();
        return response(['kode'=> '00', 'status' => $pegawai->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $pegawai =Pegawai::findOrFail($request->id);
        $pegawai->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'pegawai');
            $pegawai['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $pegawai['password'] = Hash::make($request['password']);
        }
        $pegawai->save();

        if($pegawai){
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
        $pegawai = Pegawai::findOrFail($id);
        if (!empty($pegawai)) {
            File::delete($pegawai->foto);

            // foreach ($pegawai->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $pegawai->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
