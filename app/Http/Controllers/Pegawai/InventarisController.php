<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\AlatTerpasang;

class InventarisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $inventariss = Inventaris::orderBy('id', 'DESC')->get();
    	return view('pegawai.inventaris', compact('inventariss'));
    }

    public function create()
    {
        return view('pegawai.inventaris-create');
    }
    public function show($id)
    {
        $alatterpasangs = AlatTerpasang::where('inventaris_id', $id)->orderBy('id', 'DESC')->get();
        return view('pegawai.inventaris-show', compact('alatterpasangs'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required|string|max:255',
            'stok' => 'required|max:255',
        ]);

        $inventaris = new Inventaris();
        $inventaris['nomor_rs'] =  env('RS_NOMOR');
        $inventaris->fill($request->all());
        // $upload = app('App\Helper\Images')->upload($request->file('foto'), 'inventaris');
        // $inventaris['foto'] = $upload['url'];
        $inventaris->save();

        if($inventaris){
            return redirect(route('pegawai.inventaris.show',['id'=> $inventaris->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('pegawai.inventaris-edit', compact('inventaris'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required|string|max:255',
        ]);

        $inventaris =Inventaris::findOrFail($request->id);
        $inventaris->fill($request->all());
        // if($request->hasFile('foto')){
        //     $upload = app('App\Helper\Images')->upload($request->file('foto'), 'inventaris');
        //     $inventaris['foto'] = $upload['url'];
        // }
        $inventaris->save();

        if($inventaris){
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
        $inventaris = Inventaris::findOrFail($id);
        if (!empty($inventaris)) {
            File::delete($inventaris->foto);

            // foreach ($pegawai->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $inventaris->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
