<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gunung;
use File;

class GunungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $gunungs = Gunung::paginate(20);
    	return view('admin.gunung', compact('gunungs'));
    }

    public function create()
    {
        return view('admin.gunung-tambah');
    }
    public function show($id)
    {
        $gunung = Gunung::find($id);
        return view('admin.gunung-show', compact('gunung'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $gunung = new Gunung();
        $gunung->fill($request->all());
        $upload = app('App\Helper\Images')->upload($request->file('thumbnail'), 'gunung');
        $gunung['thumbnail'] = $upload['url'];
        $gunung->save();

        if($gunung){
            return redirect(route('admin.gunung.show',['id'=> $gunung->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $gunung = Gunung::findOrFail($id);
        return view('admin.gunung-edit', compact('gunung'));
    }
    public function publish()
    {
        $gunung = Gunung::find($_GET['id']);
        if ($gunung->publish == 'Public') {
            $gunung['publish'] = 'Private';
        }else{
            $gunung['publish'] = 'Public';
        }
        $gunung->save();
        return response(['kode'=> '00', 'publish' => $gunung->publish]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $gunung =Gunung::findOrFail($request->id);
        $gunung->fill($request->all());
        if($request->hasFile('thumbnail')){
            $upload = app('App\Helper\Images')->upload($request->file('thumbnail'), 'gunung');
            $gunung['thumbnail'] = $upload['url'];
        }
        $gunung->save();

        if($gunung){
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
        $admin = Gunung::findOrFail($id);
        if (!empty($admin)) {
            foreach ($admin->galeri()->get() as $galeri) {
                File::delete($galeri->foto);
                $galeri->delete();
            }

            $admin->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
