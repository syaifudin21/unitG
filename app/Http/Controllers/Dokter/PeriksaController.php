<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarPeriksa;
use App\Models\TindakanKeperawatan;
use App\Models\PemberianObat;
use App\Models\AlatTerpasang;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dokter');
    }
    public function index()
    {
        $periksas = DaftarPeriksa::where('nomor_rs', env('RS_NOMOR'))->where('dokter_id',Auth::user()->id)->paginate(20);
    	return view('dokter.periksa', compact('periksas'));
    }

    public function show($id)
    {
        $periksa = DaftarPeriksa::find($id);
        return view('dokter.periksa-show', compact('periksa'));
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

        $periksa = new DaftarPeriksa();
        $periksa->fill($request->all());
        $periksa['nomor_rs'] = env('RS_NOMOR');
        $periksa['tanggal_masuk'] = date("Y-m-d H:i:s");
        $periksa->save();

        if($periksa){
            return redirect(route('dokter.periksa.show',['id'=> $periksa->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function storepra(Request $request)
    {
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
    public function storeprimer(Request $request)
    {
        $periksa = DaftarPeriksa::findOrFail($request->id);
        $periksa['airway->airway_patenTidak_paten'] = $request->airway_patenTidak_paten;
        $periksa['airway->airway_patenTidak_tidakPaten'] = $request->airway_patenTidak_tidakPaten;
        $periksa['airway->airway_patenTidak_tidakPatenSnoring'] = $request->airway_patenTidak_tidakPatenSnoring;
        $periksa['airway->airway_patenTidak_tidakPatenGargling'] = $request->airway_patenTidak_tidakPatenGargling;
        $periksa['airway->airway_patenTidak_tidakPatenStridor'] = $request->airway_patenTidak_tidakPatenStridor;
        $periksa['airway->airway_patenTidak_tidakPatenBendaAsing'] = $request->airway_patenTidak_tidakPatenBendaAsing;
        $periksa['airway->airway_patenTidak_tidakPatenLain'] = $request->airway_patenTidak_tidakPatenLain;
        $periksa['airway->airway_keperawatan_JalanNafasTidakEfektif'] = $request->airway_keperawatan_JalanNafasTidakEfektif;
        $periksa['airway->airway_keperawatan_resikoGagalNafas'] = $request->airway_keperawatan_resikoGagalNafas;
        $periksa['breathing->breathing_polaNafas_teratur'] = $request->breathing_polaNafas_teratur;
        $periksa['breathing->breathing_polaNafas_tidakTeratur'] = $request->breathing_polaNafas_tidakTeratur;
        $periksa['breathing->breathing_suaranafas_vesikuler'] = $request->breathing_suaranafas_vesikuler;
        $periksa['breathing->breathing_suaranafas_bronchovesikuler'] = $request->breathing_suaranafas_bronchovesikuler;
        $periksa['breathing->breathing_suaranafas_whezing'] = $request->breathing_suaranafas_whezing;
        $periksa['breathing->breathing_suaranafas_ronchi'] = $request->breathing_suaranafas_ronchi;
        $periksa['breathing->breathing_polaNafas_apneu'] = $request->breathing_polaNafas_apneu;
        $periksa['breathing->breathing_polaNafas_dyspneu'] = $request->breathing_polaNafas_dyspneu;
        $periksa['breathing->breathing_polaNafas_bradipneu'] = $request->breathing_polaNafas_bradipneu;
        $periksa['breathing->breathing_polaNafas_takhipneu'] = $request->breathing_polaNafas_takhipneu;
        $periksa['breathing->breathing_polaNafas_orthopneu'] = $request->breathing_polaNafas_orthopneu;
        $periksa['breathing->breathing_ototBantuNafas_reetraksiDada'] = $request->breathing_ototBantuNafas_reetraksiDada;
        $periksa['breathing->breathing_ototBantuNafas_cupingHidung'] = $request->breathing_ototBantuNafas_cupingHidung;
        $periksa['breathing->breathing_jenisNafas_pernafasanDada'] = $request->breathing_jenisNafas_pernafasanDada;
        $periksa['breathing->breathing_jenisNafas_pernafasanPerut'] = $request->breathing_jenisNafas_pernafasanPerut;
        $periksa['breathing->breathing_diagnosaKeperawatan_polaNafasTidakEfektif'] = $request->breathing_diagnosaKeperawatan_polaNafasTidakEfektif;
        $periksa['breathing->breathing_diagnosaKeperawatan_gangguanPertukaranGas'] = $request->breathing_diagnosaKeperawatan_gangguanPertukaranGas;
        $periksa['breathing->breathing_frekuensiNafas'] = $request->breathing_frekuensiNafas;
        $periksa['circulation->circulation_akral_hangat'] = $request->circulation_akral_hangat;
        $periksa['circulation->circulation_akral_dingin'] = $request->circulation_akral_dingin;
        $periksa['circulation->circulation_pucat_ya'] = $request->circulation_pucat_ya;
        $periksa['circulation->circulation_pucat_tidak'] = $request->circulation_pucat_tidak;
        $periksa['circulation->circulation_cianosis_ya'] = $request->circulation_cianosis_ya;
        $periksa['circulation->circulation_cianosis_tidak'] = $request->circulation_cianosis_tidak;
        $periksa['circulation->circulation_pengisianKapiler_kurangDari2'] = $request->circulation_pengisianKapiler_kurangDari2;
        $periksa['circulation->circulation_pengisianKapiler_lebihDari2'] = $request->circulation_pengisianKapiler_lebihDari2;
        $periksa['circulation->circulation_tekananDarah'] = $request->circulation_tekananDarah;
        $periksa['circulation->circulation_nadi'] = $request->circulation_nadi;
        $periksa['circulation->circulation_nadi_tidakTeraba'] = $request->circulation_nadi_tidakTeraba;
        $periksa['circulation->circulation_perdarahan_ya'] = $request->circulation_perdarahan_ya;
        $periksa['circulation->circulation_perdarahan_lokasi'] = $request->circulation_perdarahan_lokasi;
        $periksa['circulation->circulation_perdarahan_tidak'] = $request->circulation_perdarahan_tidak;
        $periksa['circulation->circulation_kehilanganCairan_diare'] = $request->circulation_kehilanganCairan_diare;
        $periksa['circulation->circulation_kehilanganCairan_muntah'] = $request->circulation_kehilanganCairan_muntah;
        $periksa['circulation->circulation_kehilanganCairan_lukaBakar'] = $request->circulation_kehilanganCairan_lukaBakar;
        $periksa['circulation->circulation_kehilanganCairan_perdarahan'] = $request->circulation_kehilanganCairan_perdarahan;
        $periksa['circulation->circulation_kelembabanKulit_lembab'] = $request->circulation_kelembabanKulit_lembab;
        $periksa['circulation->circulation_kelembabanKulit_kering'] = $request->circulation_kelembabanKulit_kering;
        $periksa['circulation->circulation_turgor_normal'] = $request->circulation_turgor_normal;
        $periksa['circulation->circulation_turgor_kurang'] = $request->circulation_turgor_kurang;
        $periksa['circulation->circulation_luasLukaBakar'] = $request->circulation_luasLukaBakar;
        $periksa['circulation->circulation_grade'] = $request->circulation_grade;
        $periksa['circulation->circulation_produksiUrine'] = $request->circulation_produksiUrine;
        $periksa['circulation->circulation_diagnosaKeperawatan_gangguanPerfusiJaringanPerifer'] = $request->circulation_diagnosaKeperawatan_gangguanPerfusiJaringanPerifer;
        $periksa['circulation->circulation_diagnosaKeperawatan_gangguanKeseimbanganCairanElektrolit'] = $request->circulation_diagnosaKeperawatan_gangguanKeseimbanganCairanElektrolit;
        $periksa['circulation->circulation_diagnosaKeperawatan_resikoShokHipovolemik'] = $request->circulation_diagnosaKeperawatan_resikoShokHipovolemik;
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

    public function createkeperawatan($periksa_id)
    {
        $periksa = DaftarPeriksa::findOrFail($periksa_id);
        return view('dokter.keperawatan-create', compact('periksa'));
    }
    public function storekeperawatan(Request $request)
    {
        $keperawatan = new TindakanKeperawatan();
        $keperawatan->fill($request->all());
        $keperawatan->save();

        if($keperawatan){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function createobatcairan($periksa_id)
    {
        $periksa = DaftarPeriksa::findOrFail($periksa_id);
        return view('dokter.obatcairan-create', compact('periksa'));
    }
    public function storeobatcairan(Request $request)
    {
        $obatcairan = new PemberianObat();
        $obatcairan->fill($request->all());
        $obatcairan->save();

        if($obatcairan){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function createalatterpasang($periksa_id)
    {
        $periksa = DaftarPeriksa::findOrFail($periksa_id);
        return view('dokter.alatterpasang-create', compact('periksa'));
    }
    public function storealatterpasang(Request $request)
    {
        $alatterpasang = new AlatTerpasang();
        $alatterpasang->fill($request->all());
        $alatterpasang->save();

        if($alatterpasang){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    
    public function storeakhir(Request $request)
    {
        $periksa = DaftarPeriksa::findOrFail($request->id);
        $periksa['hasil_akhir->akhir_dirawat_ruangan'] = $request->akhir_dirawat_ruangan;
        $periksa['hasil_akhir->akhir_dirawat_kelas'] = $request->akhir_dirawat_kelas;
        $periksa['hasil_akhir->akhir_operasi_kamar'] = $request->akhir_operasi_kamar;
        $periksa['hasil_akhir->akhir_operasi_tanggal'] = $request->akhir_operasi_tanggal;
        $periksa['hasil_akhir->akhir_rujuk_ke'] = $request->akhir_rujuk_ke;
        $periksa['hasil_akhir->akhir_rujuk_alasan'] = $request->akhir_rujuk_alasan;
        $periksa['hasil_akhir->akhir_pulang_indikasiMedis'] = $request->akhir_pulang_indikasiMedis;
        $periksa['hasil_akhir->akhir_pulang_tanggal'] = $request->akhir_pulang_tanggal;
        $periksa['hasil_akhir->akhir_pulang_permintaanSendiri'] = $request->akhir_pulang_permintaanSendiri;
        $periksa['hasil_akhir->akhir_pulang_menolakRawat'] = $request->akhir_pulang_menolakRawat;
        $periksa['hasil_akhir->akhir_pulang_meninggalDunia'] = $request->akhir_pulang_meninggalDunia;
        $periksa['hasil_akhir->akhir_pulang_doa'] = $request->akhir_pulang_doa;
        $periksa['hasil_akhir->akhir_pulang_lain'] = $request->akhir_pulang_lain;
        $periksa['tanggal_keluar'] = date("Y-m-d H:i:s");
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
}
