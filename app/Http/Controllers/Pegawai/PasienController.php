<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;

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
}
