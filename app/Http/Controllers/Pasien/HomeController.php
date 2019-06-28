<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarPeriksa;
use Illuminate\Support\Facades\Auth;
use App\Models\ObservasiLanjutan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pasien');
    }
    public function index()
    {
        $jml_ugd = DaftarPeriksa::where('pasien_id', Auth::user()->id)->count();
        $jml_keluhan = ObservasiLanjutan::where('pasien_id', Auth::user()->id)->count();
        $pasien = Auth::user();
    	return view('pasien.pasien-home', compact('jml_ugd', 'jml_keluhan', 'pasien'));
    }
}
