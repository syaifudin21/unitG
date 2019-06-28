<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\DaftarPeriksa;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    public function index()
    {
        $jml_pasienPerawatan = DaftarPeriksa::whereNotNull('tanggal_keluar')->count();
        $jml_dokterAktif = Dokter::where('status_on', 'ON')->count();
        $jml_dokterAbsen = Dokter::where('status_on', 'OFF')->count();
        $jml_pasien = Pasien::count();
    	return view('pegawai.pegawai-home', compact('jml_pasienPerawatan', 'jml_dokterAktif', 'jml_dokterAbsen', 'jml_pasien'));
    }
}
