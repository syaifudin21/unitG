<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPasien;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pasien');
    }
    public function profil()
    {
        return view('pasien.profil');
    }
    public function diagnosa()
    {
        $diagnosas = RiwayatPasien::where('pasien_id', Auth::user()->id)->paginate(20);
        return view('pasien.diagnosa', compact('diagnosas'));
    }
}
