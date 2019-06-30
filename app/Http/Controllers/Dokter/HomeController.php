<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPasien;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dokter');
    }
    public function index()
    {
        $dokter = Auth::user();
        $jml_diagnosa = RiwayatPasien::where('dokter_id',Auth::user()->id)->count();
    	return view('dokter.dokter-home', compact('jml_diagnosa', 'dokter'));
    }
}
