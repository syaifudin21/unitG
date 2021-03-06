@extends('pasien.pasien-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Pemeriksaan Detail</h1>
            <p>Informasi pemeriksaan pasien </p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a id="btn_observasi1" href="{{route('pasien.observasi.create', ['periksa_id'=> $periksa->id])}}" class="btn btn-warning float-right">Tambah Keluhan</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
    
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <strong>Keterangan Pasien</strong><hr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        @if (empty($periksa->pasien->foto))
                                            <img src="{{asset('images/thumbnail.svg')}}" style="width: 100%" class="rounded" alt="thumbnail" id="fotoPasien">
                                        @else
                                            <img src="{{asset($periksa->pasien->foto)}}" style="width: 100%" class="rounded" alt="thumbnail" id="fotoPasien">
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-sm table-borderless">
                                        <tr><td>Datang</td> <th id="pasienMasuk">{{hari_tanggal_waktu($periksa->tanggal_masuk, true)}}</th></tr>
                                        <tr><td>Keluar</td> <th id="pasienKeluar">{{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}}</th></tr>
                                        <tr><td>Nama Pegawai</td> <th id="pasienNama">{{$periksa->pegawai->nama}}</th></tr>
                                        <tr><td>Cara Datang</td> <th id="pasienCaraDatang">{{$periksa->cara_datang}}</th></tr>
                                        <tr><td>Jenis Kasus</td> <th id="pasienJenisKasus">{{$periksa->jenis_kasus}}</th></tr>
                                </table>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                    <div class="row">
                                            <div class="col-sm-12">
                                            <strong>Profil Pasien</strong><hr>
                                            </div>
                                        </div>
                                    <table class="table table-sm table-borderless">
                                        <tr><td>Nama</td> <th id="pasienNama">{{$periksa->pasien->nama}}</th></tr>
                                        <tr><td>Username</td> <th id="pasienUsername">{{$periksa->pasien->username}}</th></tr>
                                        <tr><td>Jenis Kelamin</td> <th id="pasienLp">{{$periksa->pasien->lp}}</th></tr>
                                        <tr><td>Kota</td> <th id="pasienKota">{{$periksa->pasien->kota}}</th></tr>
                                        <tr><td>Alamat</td> <th id="pasienAlamat">{{$periksa->pasien->alamat_pasien}}</th></tr>
                                        <tr><td>Golongan Darah</td> <th id="pasienGolDarah">{{$periksa->pasien->gol_darah}}</th></tr>
                                        <tr><td>HP</td> <th id="pasienHp">{{$periksa->pasien->hp_pasien}}</th></tr>
                                        <tr><td>Pekerjaan</td> <th id="pasienPekerjaan">{{$periksa->pasien->pekerjaan}}</th></tr>
                                        <tr><td>Agama</td> <th id="pasienAgama">{{$periksa->pasien->agama}}</th></tr>
                                        <tr><td>Nama Wali</td> <th id="pasienNamaWali">{{$periksa->pasien->nama_wali}}</th></tr>
                                        <tr><td>HP Wali</td> <th id="pasienHpWali">{{$periksa->pasien->hp_wali}}</th></tr>
                                        <tr><td>Alamat Wali</td> <th id="pasienAlamatWali">{{$periksa->pasien->alamat_wali}}</th></tr>
                                    </table>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <strong>Profil Dokter</strong><hr>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-12">
                                            @if (empty($periksa->dokter->foto))
                                                <img src="{{asset('images/thumbnail.svg')}}" style="width: 50%" class="rounded" alt="thumbnail" id="fotoPasien">
                                            @else
                                                <img src="{{asset($periksa->dokter->foto)}}" style="width: 50%; max-height: 200px" class="rounded" alt="thumbnail" id="fotoPasien">
                                            @endif
                                        </div>
                                    </div>
                                    <hr>

                                <table class="table table-borderless table-sm">
                                    <tr><td>Nama </td> <th><a href="{{route('pasien.dokter.show',['id'=>$periksa->dokter->id])}}">{{$periksa->dokter->nama}}</a></th></tr>
                                    <tr><td>Alamat </td> <th>{{$periksa->dokter->alamat}}</th></tr>
                                    <tr><td>Jenis Kelamin </td> <th>{{$periksa->dokter->lp}}</th></tr>
                                    <tr><td>Pendidikan </td> <th>{{$periksa->dokter->pendidikan}}</th></tr>
                                    <tr><td>No HP </td> <th>{{$periksa->dokter->hp}}</th></tr>
                                    <tr><td>Spesialis </td> <th>{{$periksa->dokter->spesialis}}</th></tr>
                                    <tr><td>Agama </td> <th>{{$periksa->dokter->agama}}</th></tr>
                                    <tr><td>Status On </td> <th>{{$periksa->dokter->status_on}}</th></tr>
                                </table>

                                
                               
                                
                            </div>
                        </div>

             </div>
            </div>



            <div class="tile d-print-flex">
                    <div class="tile-body">
                      <form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.periksa.store.pra')}}">
                          {{ csrf_field() }} <input type="hidden" name="id" value="{{$periksa->id}}">
            
                              <div class="row">
                                  <div class="col-md-4 col-sm-12">
                                      <div class="row">
                                          <div class="col-sm-12">
                                          <strong>Keadaan Pra Hospital</strong><hr>
                                          </div>
                                      </div>
                                     <div class="form-group row">
                                          <label for="avpu" class="col-sm-4 col-form-label col-form-label-sm">AVPU</label>
                                          <div class=" col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="avpu" id="avpu" placeholder="AVPU" value="{{( empty(old('avpu')))? (!empty($periksa->keadaan_pra['avpu']))? $periksa->keadaan_pra['avpu'] : '-': old('avpu')}}"> 
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="pernafasan" class="col-sm-4 col-form-label col-form-label-sm">Pernavasan </label>
                                          <div class="input-group input-group-sm col-sm-8">
                                              <input type="text" class="form-control form-control-sm" name="pernafasan" id="pernafasan" placeholder="Pernavasan" value="{{( empty(old('pernafasan')))? (!empty($periksa->keadaan_pra['pernafasan']))? $periksa->keadaan_pra['pernafasan'] : '-' : old('pernafasan')}}">
                                              <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">(x/Menit)</span>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="tensidarah" class="col-sm-4 col-form-label col-form-label-sm">Tensi Darah</label>
                                          <div class="input-group input-group-sm col-sm-8">
                                              <input type="text" class="form-control form-control-sm" name="tensidarah" id="tensiDarah" placeholder="Tensi Darah " value="{{( empty(old('tensidarah')))? (!empty($periksa->keadaan_pra['tensi_darah']))? $periksa->keadaan_pra['tensi_darah'] : '-': old('tensidarah')}}">
                                              <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"> (mmHg)</span>
                                                    </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="suhu" class="col-sm-4 col-form-label col-form-label-sm">Suhu Axila</label>
                                          <div class="input-group input-group-sm col-sm-8">
                                              <input type="text" class="form-control form-control-sm" name="suhu" id="suhu" placeholder="Suhu Axila" value="{{( empty(old('suhu')))? (!empty($periksa->keadaan_pra['suhu']))? $periksa->keadaan_pra['suhu'] : '-': old('suhu')}}">
                                              <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">(C)</span>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="nadi" class="col-sm-4 col-form-label col-form-label-sm">Nadi </label>
                                          <div class="input-group input-group-sm col-sm-8">
                                              <input type="text" class="form-control form-control-sm" name="nadi" id="nadi" placeholder="Nadi" value="{{( empty(old('nadi')))? (!empty($periksa->keadaan_pra['nadi']))? $periksa->keadaan_pra['nadi'] : '-': old('nadi')}}">
                                              <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">(x/Menit)</span>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="spo2" class="col-sm-4 col-form-label col-form-label-sm">SPO2 </label>
                                          <div class="input-group input-group-sm col-sm-8">
                                              <input type="text" class="form-control form-control-sm" name="spo2" id="spo2" placeholder="SPO2" value="{{( empty(old('spo2')))? (!empty($periksa->keadaan_pra['spo2']))? $periksa->keadaan_pra['spo2'] : '-': old('spo2')}}">
                                              <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">(%)</span>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-12">
                                          <div class="row">
                                              <div class="col-sm-12">
                                              <strong>Tindakan Pra Hospital</strong><hr>
                                              </div>
                                          </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox"   > <span class="label-text">nama</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="cpr" value="CPR" id="cpr" {{!empty($periksa->tindakan_pra['cpr'])? 'checked' : ''}} readonly  > <span class="label-text">CPR</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox"  name="o2" value="O2" id="o2" {{!empty($periksa->tindakan_pra['o2'])? 'checked' : ''}}  > <span class="label-text">O2</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="infus" value="Infus" id="infus" {{!empty($periksa->tindakan_pra['infus'])? 'checked' : ''}}> <span class="label-text">Infus</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="ngt" value="NGT" id="ngt" {{!empty($periksa->tindakan_pra['ngt'])? 'checked' : ''}}> <span class="label-text">NGT</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="nasopharingealTube" value="Nasopharingeal Tube" id="nasopharingealTube" {{!empty($periksa->tindakan_pra['nasopharingeal_tube'])? 'checked' : ''}}> <span class="label-text">Nasopharingeal Tube</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="ett" value="ETT" id="ett" {{!empty($periksa->tindakan_pra['ett'])? 'checked' : ''}}> <span class="label-text">ETT</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="suction" value="Suction" id="suction" {{!empty($periksa->tindakan_pra['suction'])? 'checked' : ''}}> <span class="label-text">Suction</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="krikotiroidotomi" value="Krikotiroidotomi" id="krikotiroidotomi" {{!empty($periksa->tindakan_pra['krikotiroidotomi'])? 'checked' : ''}}> <span class="label-text">Krikotiroidotomi</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="bvm" value="BVM" id="bvm" {{!empty($periksa->tindakan_pra['bvm'])? 'checked' : ''}}> <span class="label-text">BVM</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="bidai" value="Bidai" id="bidai" {{!empty($periksa->tindakan_pra['bidai'])? 'checked' : ''}}> <span class="label-text">Bidai</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="catheterUrine" value="Catheter Urine" id="catheterUrine" {{!empty($periksa->tindakan_pra['catheter_urine'])? 'checked' : ''}}> <span class="label-text">Catheter Urine</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="bebanTekan" value="Beban Tekan" id="bebanTekan" {{!empty($periksa->tindakan_pra['beban_tekan'])? 'checked' : ''}}> <span class="label-text">Beban Tekan</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="heacting" value="Heacting" id="heacting" {{!empty($periksa->tindakan_pra['heacting'])? 'checked' : ''}}> <span class="label-text">Heacting</span> </label>
                                        </div>
                                          <div class="form-group row" style="margin-bottom: 4px">
                                              <label for="obat" class="col-sm-2 col-form-label col-form-label-sm">Obat</label>
                                              <div class="col-sm-10">
                                                  <input type="text" class="form-control form-control-sm" name="obat" id="obat" placeholder="Obat" value="{{!empty($periksa->tindakan_pra['obat'])? $periksa->tindakan_pra['obat'] : ''}}">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="lain" class="col-sm-2 col-form-label col-form-label-sm">Lain</label>
                                              <div class="col-sm-10">
                                                  <input type="text" class="form-control form-control-sm" name="lain" id="lain" placeholder="Lain-lain" value="{{!empty($periksa->tindakan_pra['lain'])? $periksa->tindakan_pra['lain'] : ''}}">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-5 col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <strong>Anemnesa Perawat</strong><hr>
                                                </div>
                                            </div>
                                           <div class="form-group row">
                                                <label for="keluhanUtama" class="col-sm-4 col-form-label col-form-label-sm">Keluhan Utamat</label>
                                                <div class=" col-sm-8">
                                                    <textarea name="keluhanUtama" id="keluhanUtama" class="form-control" placeholder="Keluhan Utama" rows="4">{{( empty(old('keluhanUtama')))? (!empty($periksa->keluhan_utama))? $periksa->keluhan_utama : '-': old('keluhanUtama')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="anemnesa" class="col-sm-4 col-form-label col-form-label-sm">Anemnesa</label>
                                                <div class=" col-sm-8">
                                                    <textarea name="anemnesa" id="anemnesa" class="form-control" placeholder="Anemnesa" rows="8">{{( empty(old('anemnesa')))? (!empty($periksa->anemnesa))? $periksa->anemnesa : '-': old('anemnesa')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                              </div>
            
                      </form>
                   </div>
                  </div>

                <form action="{{route('pegawai.periksa.store.primer')}}" method="post">
                    @csrf <input type="hidden" name="id" value="{{$periksa->id}}">
                  <div class="tile">
                      <h4 class="tile-title">Pengkajian Keperawatan Primer</h4>
                      
                      <div class="tile-body">
                          <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <strong>Airway</strong><hr>
                                        </div>
                                    </div>
                                    <b>Paten Tidak Paten  </b>          
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="airway_patenTidak_paten" value="Paten" id="airway_patenTidak_paten" {{!empty($periksa->airway['airway_patenTidak_paten'])? 'checked' : ''}}> <span class="label-text">Paten</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="airway_patenTidak_tidakPaten" value="Tidak Paten" id="airway_patenTidak_tidakPaten" {{!empty($periksa->airway['airway_patenTidak_tidakPaten'])? 'checked' : ''}}> <span class="label-text">Tidak Paten</span> </label>
                                    </div>
                                    <div class="ml-4">
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="airway_patenTidak_tidakPatenSnoring" value="Snoring" id="airway_patenTidak_tidakPatenSnoring" {{!empty($periksa->airway['airway_patenTidak_tidakPatenSnoring'])? 'checked' : ''}}> <span class="label-text">Snoring</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="airway_patenTidak_tidakPatenGargling" value="Gargling" id="airway_patenTidak_tidakPatenGargling" {{!empty($periksa->airway['airway_patenTidak_tidakPatenGargling'])? 'checked' : ''}}> <span class="label-text">Gargling</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="airway_patenTidak_tidakPatenStridor" value="Striodor" id="airway_patenTidak_tidakPatenStridor" {{!empty($periksa->airway['airway_patenTidak_tidakPatenStridor'])? 'checked' : ''}}> <span class="label-text">Striodor</span> </label>
                                        </div>
                                        <div class="animated-checkbox">
                                            <label> <input type="checkbox" name="airway_patenTidak_tidakPatenBendaAsing" value="Benda Asing" id="airway_patenTidak_tidakPatenBendaAsing" {{!empty($periksa->airway['airway_patenTidak_tidakPatenBendaAsing'])? 'checked' : ''}}> <span class="label-text">Benda Asing</span> </label>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" name="airway_patenTidak_tidakPatenLain" id="airway_patenTidak_tidakPatenLain" placeholder="Lain-lain" value="{{!empty($periksa->airway['airway_patenTidak_tidakPatenLain'])? $periksa->airway['airway_patenTidak_tidakPatenLain'] : ''}}">
                                    </div>
                                    <b> Keperawatan </b>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="airway_keperawatan_JalanNafasTidakEfektif" value="Bersihkan Jalan Nafas Tidak Efektif" id="airway_keperawatan_JalanNafasTidakEfektif" {{!empty($periksa->airway['airway_keperawatan_JalanNafasTidakEfektif'])? 'checked' : ''}}> <span class="label-text">Bersihkan Jalan Nafas Tidak Efektif</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="airway_keperawatan_resikoGagalNafas" value="Tidak Paten" id="airway_keperawatan_resikoGagalNafas" {{!empty($periksa->airway['airway_keperawatan_resikoGagalNafas'])? 'checked' : ''}}> <span class="label-text">Resiko Gagal Nafas</span> </label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <strong>Breathing</strong><hr>
                                        </div>
                                    </div>
                                    <b>Pola Nafas</b> 
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_teratur" value="Teratur" id="breathing_polaNafas_teratur" {{!empty($periksa->breathing['breathing_polaNafas_teratur'])? 'checked' : ''}}> <span class="label-text">Teratur</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_tidakTeratur" value="Tidak Teratur" id="breathing_polaNafas_tidakTeratur" {{!empty($periksa->breathing['breathing_polaNafas_tidakTeratur'])? 'checked' : ''}}> <span class="label-text">Tidak Teratur</span> </label>
                                    </div>
                                    <b>Suara Nafas</b> 
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_suaranafas_vesikuler" value="Vesikuler" id="breathing_suaranafas_vesikuler" {{!empty($periksa->breathing['breathing_suaranafas_vesikuler'])? 'checked' : ''}}> <span class="label-text">Vesikuler</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_suaranafas_bronchovesikuler" value="Bronchovesikuler" id="breathing_suaranafas_bronchovesikuler" {{!empty($periksa->breathing['breathing_suaranafas_bronchovesikuler'])? 'checked' : ''}}> <span class="label-text">Bronchovesikuler</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_suaranafas_whezing" value="Whezing" id="breathing_suaranafas_whezing" {{!empty($periksa->breathing['breathing_suaranafas_whezing'])? 'checked' : ''}}> <span class="label-text">Whezing</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_suaranafas_ronchi" value="Ronchi" id="breathing_suaranafas_ronchi" {{!empty($periksa->breathing['breathing_suaranafas_ronchi'])? 'checked' : ''}}> <span class="label-text">Ronchi</span> </label>
                                    </div>
                                    <b>Pola Nafas</b>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_apneu" value="Apneu" id="breathing_polaNafas_apneu" {{!empty($periksa->breathing['breathing_polaNafas_apneu'])? 'checked' : ''}}> <span class="label-text">Apneu</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_dyspneu" value="Dyspneu" id="breathing_polaNafas_dyspneu" {{!empty($periksa->breathing['breathing_polaNafas_dyspneu'])? 'checked' : ''}}> <span class="label-text">Dyspneu</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_bradipneu" value="Bradipneu" id="breathing_polaNafas_bradipneu" {{!empty($periksa->breathing['breathing_polaNafas_bradipneu'])? 'checked' : ''}}> <span class="label-text">Bradipneu</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_takhipneu" value="Takhipneu" id="breathing_polaNafas_takhipneu" {{!empty($periksa->breathing['breathing_polaNafas_takhipneu'])? 'checked' : ''}}> <span class="label-text">Takhipneu</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_polaNafas_orthopneu" value="Orthopneu" id="breathing_polaNafas_orthopneu" {{!empty($periksa->breathing['breathing_polaNafas_orthopneu'])? 'checked' : ''}}> <span class="label-text">Orthopneu</span> </label>
                                    </div>
                                    <b>Penggunaan Otot Bantu Nafas</b>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_ototBantuNafas_reetraksiDada" value="Reetraksi Dada" id="breathing_ototBantuNafas_reetraksiDada" {{!empty($periksa->breathing['breathing_ototBantuNafas_reetraksiDada'])? 'checked' : ''}}> <span class="label-text">Reetraksi Dada</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_ototBantuNafas_cupingHidung" value="Cuping Hidung" id="breathing_ototBantuNafas_cupingHidung" {{!empty($periksa->breathing['breathing_ototBantuNafas_cupingHidung'])? 'checked' : ''}}> <span class="label-text">Cuping Hidung</span> </label>
                                    </div>
                                    <b>Jenis Nafas</b>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_jenisNafas_pernafasanDada" value="Pernafasan Dada" id="breathing_jenisNafas_pernafasanDada" {{!empty($periksa->breathing['breathing_jenisNafas_pernafasanDada'])? 'checked' : ''}}> <span class="label-text">Pernafasan Dada</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_jenisNafas_pernafasanPerut" value="Pernafasn Perut" id="breathing_jenisNafas_pernafasanPerut" {{!empty($periksa->breathing['breathing_jenisNafas_pernafasanPerut'])? 'checked' : ''}}> <span class="label-text">Pernafasn Perut</span> </label>
                                    </div>
                                    <b>Frekuensi Nafas</b>   
                                        <input type="text" class="form-control form-control-sm" name="breathing_frekuensiNafas" id="breathing_frekuensiNafas" placeholder="Frekuensi Nafas (xmnt)" value="{{!empty($periksa->breathing['breathing_frekuensiNafas'])? $periksa->breathing['breathing_frekuensiNafas'] : ''}}">
                                    <b>Diagnosa Keperawatan</b>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_diagnosaKeperawatan_polaNafasTidakEfektif" value="Pola Nafas Tidak Efektif" id="breathing_diagnosaKeperawatan_polaNafasTidakEfektif" {{!empty($periksa->breathing['breathing_diagnosaKeperawatan_polaNafasTidakEfektif'])? 'checked' : ''}}> <span class="label-text">Pola Nafas Tidak Efektif</span> </label>
                                    </div>
                                    <div class="animated-checkbox">
                                        <label> <input type="checkbox" name="breathing_diagnosaKeperawatan_gangguanPertukaranGas" value="Gangguan Pertukaran Gas" id="breathing_diagnosaKeperawatan_gangguanPertukaranGas" {{!empty($periksa->breathing['breathing_diagnosaKeperawatan_gangguanPertukaranGas'])? 'checked' : ''}}> <span class="label-text">Gangguan Pertukaran Gas</span> </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <strong>Circulation</strong><hr>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <b>Akral</b> 
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_akral_hangat" value="Hangat" id="circulation_akral_hangat" {{!empty($periksa->circulation['circulation_akral_hangat'])? 'checked' : ''}}> <span class="label-text">Hangat</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_akral_dingin" value="Dingin" id="circulation_akral_dingin" {{!empty($periksa->circulation['circulation_akral_dingin'])? 'checked' : ''}}> <span class="label-text">Dingin</span> </label>
                                            </div>
                                            <b>Pucat</b>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_pucat_ya" value="Ya" id="circulation_pucat_ya" {{!empty($periksa->circulation['circulation_pucat_ya'])? 'checked' : ''}}> <span class="label-text">Ya</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_pucat_tidak" value="Tidak" id="circulation_pucat_tidak" {{!empty($periksa->circulation['circulation_pucat_tidak'])? 'checked' : ''}}> <span class="label-text">Tidak</span> </label>
                                            </div>
                                            <b>Cianosis</b> 
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_cianosis_ya" value="Ya" id="circulation_cianosis_ya" {{!empty($periksa->circulation['circulation_cianosis_ya'])? 'checked' : ''}}> <span class="label-text">Ya</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_cianosis_tidak" value="Tidak" id="circulation_cianosis_tidak" {{!empty($periksa->circulation['circulation_cianosis_tidak'])? 'checked' : ''}}> <span class="label-text">Tidak</span> </label>
                                            </div>
                                            <b>Pengisian Kapiler</b> 
                                            <div class="animated-checkbox">
                                                <label>
                                                    <input type="checkbox"  name="circulation_pengisianKapiler_kurangDari2" value="< 2 Detik" id="circulation_pengisianKapiler_kurangDari2" {{!empty($periksa->circulation['circulation_pengisianKapiler_kurangDari2'])? 'checked' : ''}}><span class="label-text">< 2 Detik</span>
                                                </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_pengisianKapiler_lebihDari2" value="> 2 Detik" id="circulation_pengisianKapiler_lebihDari2" {{!empty($periksa->circulation['circulation_pengisianKapiler_lebihDari2'])? 'checked' : ''}}> <span class="label-text">> 2 Detik</span> </label>
                                            </div>
                                            <b>Tekanan Darah (mmHg)</b>
                                            <input type="text" class="form-control form-control-sm" name="circulation_tekananDarah" id="circulation_tekananDarah" placeholder="Tekanan Darah (mmHg)" value="{{!empty($periksa->circulation['circulation_tekananDarah'])? $periksa->circulation['circulation_tekananDarah'] : ''}}">
                                            <b>Nadi</b>
                                            <input type="text" class="form-control form-control-sm" name="circulation_nadi" id="circulation_nadi" placeholder="Nadi (xmnt)" value="{{!empty($periksa->circulation['circulation_nadi'])? $periksa->circulation['circulation_nadi'] : ''}}">
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_nadi_tidakTeraba" value="> 2 Detik" id="circulation_nadi_tidakTeraba" {{!empty($periksa->circulation['circulation_nadi_tidakTeraba'])? 'checked' : ''}}> <span class="label-text">Tidak Teraba</span> </label>
                                            </div>
                                            <b>Perdarahan</b> 
                                            <input type="text" class="form-control form-control-sm" name="circulation_perdarahan_ya" id="circulation_perdarahan_ya" placeholder="Ya (....... cc)" value="{{!empty($periksa->circulation['circulation_perdarahan_ya'])? $periksa->circulation['circulation_perdarahan_ya'] : ''}}">
                                            <input type="text" class="form-control form-control-sm" name="circulation_perdarahan_lokasi" id="circulation_perdarahan_lokasi" placeholder="Lokasi Perdarahan " value="{{!empty($periksa->circulation['circulation_perdarahan_lokasi'])? $periksa->circulation['circulation_perdarahan_lokasi'] : ''}}">
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_perdarahan_tidak" value="Tidak" id="circulation_perdarahan_tidak" {{!empty($periksa->circulation['circulation_perdarahan_tidak'])? 'checked' : ''}}> <span class="label-text">Tidak</span> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <b>Adanya riwayat kehilangan cairan dalam jumlah besar</b> 
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kehilanganCairan_diare" value="Diare" id="circulation_kehilanganCairan_diare" {{!empty($periksa->circulation['circulation_kehilanganCairan_diare'])? 'checked' : ''}}> <span class="label-text">Diare</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kehilanganCairan_muntah" value="Muntah" id="circulation_kehilanganCairan_muntah" {{!empty($periksa->circulation['circulation_kehilanganCairan_muntah'])? 'checked' : ''}}> <span class="label-text">Muntah</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kehilanganCairan_lukaBakar" value="Luka Bakar" id="circulation_kehilanganCairan_lukaBakar" {{!empty($periksa->circulation['circulation_kehilanganCairan_lukaBakar'])? 'checked' : ''}}> <span class="label-text">Luka Bakar</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kehilanganCairan_perdarahan" value="Perdarahan" id="circulation_kehilanganCairan_perdarahan" {{!empty($periksa->circulation['circulation_kehilanganCairan_perdarahan'])? 'checked' : ''}}> <span class="label-text">Perdarahan</span> </label>
                                            </div>
                                            
                                            <b>Kelembabab kulit</b>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kelembabanKulit_lembab" value="Lembab" id="circulation_kelembabanKulit_lembab" {{!empty($periksa->circulation['circulation_kelembabanKulit_lembab'])? 'checked' : ''}}> <span class="label-text">Lembab</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_kelembabanKulit_kering" value="Kering" id="circulation_kelembabanKulit_kering" {{!empty($periksa->circulation['circulation_kelembabanKulit_kering'])? 'checked' : ''}}> <span class="label-text">Kering</span> </label>
                                            </div>
                                            <b>Turgor</b> 
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_turgor_normal" value="Normal" id="circulation_turgor_normal" {{!empty($periksa->circulation['circulation_turgor_normal'])? 'checked' : ''}}> <span class="label-text">Normal</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_turgor_kurang" value="Kurang" id="circulation_turgor_kurang" {{!empty($periksa->circulation['circulation_turgor_kurang'])? 'checked' : ''}}> <span class="label-text">Kurang</span> </label>
                                            </div>
                                            <b>Luas Luka Bakar (%)</b> 
                                            <input type="text" class="form-control form-control-sm" name="circulation_luasLukaBakar" id="circulation_luasLukaBakar" placeholder="Luas Luka Bakar (%)" value="{{!empty($periksa->circulation['circulation_luasLukaBakar'])? $periksa->circulation['circulation_luasLukaBakar'] : ''}}">
                                            <b>Grade</b> 
                                            <input type="text" class="form-control form-control-sm" name="circulation_grade" id="circulation_grade" placeholder="Grade" value="{{!empty($periksa->circulation['circulation_grade'])? $periksa->circulation['circulation_grade'] : ''}}">
                                            <b>Produksi Urine (cc)</b>
                                            <input type="text" class="form-control form-control-sm" name="circulation_produksiUrine" id="circulation_produksiUrine" placeholder="Produksi Urine (cc)" value="{{!empty($periksa->circulation['circulation_produksiUrine'])? $periksa->circulation['circulation_produksiUrine'] : ''}}">
                                            <b>Diagnosa Keperawatan</b> 
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_diagnosaKeperawatan_gangguanPerfusiJaringanPerifer" value="Gangguan Perfusi Jaringan Perifer" id="circulation_diagnosaKeperawatan_gangguanPerfusiJaringanPerifer" {{!empty($periksa->circulation['circulation_diagnosaKeperawatan_gangguanPerfusiJaringanPerifer'])? 'checked' : ''}}> <span class="label-text">Ganggunan perfusi jaringan perifer</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_diagnosaKeperawatan_gangguanKeseimbanganCairanElektrolit" value="Gangguan Keseimbangan Cairan Elektrolit" id="circulation_diagnosaKeperawatan_gangguanKeseimbanganCairanElektrolit" {{!empty($periksa->circulation['circulation_diagnosaKeperawatan_gangguanKeseimbanganCairanElektrolit'])? 'checked' : ''}}> <span class="label-text">Gangguan keseimbangan cairan elektrolit</span> </label>
                                            </div>
                                            <div class="animated-checkbox">
                                                <label> <input type="checkbox" name="circulation_diagnosaKeperawatan_resikoShokHipovolemik" value="Resiko Shok Hipovolemik" id="circulation_diagnosaKeperawatan_resikoShokHipovolemik" {{!empty($periksa->circulation['circulation_diagnosaKeperawatan_resikoShokHipovolemik'])? 'checked' : ''}}> <span class="label-text">Resiko shok Hipovolemik</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                          </div>
                      </div>
                      </div>
                  </div>
                </form>


                <div class="tile">
                    <h4 class="tile-title">Tindakan Keperawatan</h4>
                    <div class="tile-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Waktu</th>
                                    <th>Tindakan Keperawatan</th>
                                    <th class="text-center">Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periksa->tindakankeperawatan()->get() as $keperawatan)
                                <tr>
                                    <td>{{hari_tanggal_waktu($keperawatan->created_at,true)}}</td>
                                    <td>{{$keperawatan->tindakan}}</td>
                                    <td>{{!empty($keperawatan->dokter_id)? "Dokter ". $keperawatan->dokter->nama : $keperawatan->pegawai->nama}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tile">
                    <h4 class="tile-title">Pemberian Obat dan Cairan Obat-obatan</h4>
                    <div class="tile-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Waktu</th>
                                    <th>Nama Obat / Jenis Cairan</th>
                                    <th>Rute</th>
                                    <th>Dosis</th>
                                    <th class="text-center">Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periksa->pemberianobat()->get() as $obatcairan)
                                <tr>
                                    <td>{{hari_tanggal_waktu($obatcairan->created_at,true)}}</td>
                                    <td>{{$obatcairan->obat_cairan}}</td>
                                    <td>{{$obatcairan->rute}}</td>
                                    <td>{{$obatcairan->dosis}}</td>
                                    <td>{{!empty($obatcairan->dokter_id)? "Dokter ". $obatcairan->dokter->nama : $obatcairan->pegawai->nama}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tile">
                    <h4 class="tile-title">Observasi Lanjutan <a id="btn_observasi2" href="{{route('pasien.observasi.create', ['periksa_id'=> $periksa->id])}}" class="btn btn-warning float-right">Tambah</a></h4>
                    <div class="tile-body">
                        <table class="table table-sm table-bordered table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="text-center">Waktu</th>
                                    <th>GCS</th>
                                    <th>T</th>
                                    <th>N</th>
                                    <th>RR</th>
                                    <th>S</th>
                                    <th>SAT</th>
                                    <th>Keluhan</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periksa->observasilanjutan()->get() as $observasi)
                                <tr>
                                    <td>{{hari_tanggal_waktu($observasi->created_at,true)}}</td>
                                    <td>{{$observasi->gcs}}</td>
                                    <td>{{$observasi->t}}</td>
                                    <td>{{$observasi->n}}</td>
                                    <td>{{$observasi->rr}}</td>
                                    <td>{{$observasi->s}}</td>
                                    <td>{{$observasi->sat}}</td>
                                    <td>{{$observasi->keluhan}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="tile">
                    <h4 class="tile-title">Alat yang terpasang di pasiean</h4>
                    <div class="tile-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Waktu</th>
                                    <th>Jenis</th>
                                    <th>Lokasi</th>
                                    <th>Ukuran</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periksa->alatterpasang()->get() as $alatterpasang)
                                <tr>
                                    <td>{{hari_tanggal_waktu($alatterpasang->created_at,true)}}</td>
                                    <td>{{$alatterpasang->inventaris->jenis}}</td>
                                    <td>{{$alatterpasang->lokasi}}</td>
                                    <td>{{$alatterpasang->inventaris->ukuran}}</td>
                                    <td>{{$alatterpasang->keterangan}}</td>
                                    <td>{{!empty($alatterpasang->dokter_id)? "Dokter ". $alatterpasang->dokter->nama : $alatterpasang->pegawai->nama}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <form action="{{route('pegawai.periksa.store.akhir')}}" method="post">
                @csrf @method('delete') <input type="hidden" name="id" value="{{$periksa->id}}">
               <div class="tile">
                    <h4 class="tile-title">Hasil Akhir</h4>
                    <div class="tile-body">
                        <div class="form-group row">
                            <label for="akhir_dirawat_ruangan" class="col-sm-2 col-form-label col-form-label-sm">Dirawat diruangan</label>
                            <div class=" col-sm-4">
                                <input type="text" class="form-control form-control-sm" name="akhir_dirawat_ruangan" id="akhir_dirawat_ruangan" placeholder="akhir_dirawat_ruangan" value="{{( empty(old('akhir_dirawat_ruangan')))? (!empty($periksa->hasil_akhir['akhir_dirawat_ruangan']))? $periksa->hasil_akhir['akhir_dirawat_ruangan'] : '-': old('akhir_dirawat_ruangan')}}"> 
                            </div>
                            <label for="akhir_dirawat_kelas" class="col-sm-2 col-form-label col-form-label-sm">Kelas</label>
                            <div class=" col-sm-4">
                                <input type="text" class="form-control form-control-sm" name="akhir_dirawat_kelas" id="akhir_dirawat_kelas" placeholder="akhir_dirawat_kelas" value="{{( empty(old('akhir_dirawat_kelas')))? (!empty($periksa->hasil_akhir['akhir_dirawat_kelas']))? $periksa->hasil_akhir['akhir_dirawat_kelas'] : '-': old('akhir_dirawat_kelas')}}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="akhir_operasi_kamar" class="col-sm-2 col-form-label col-form-label-sm">Kamar Operasi</label>
                            <div class=" col-sm-4">
                                <input type="text" class="form-control form-control-sm" name="akhir_operasi_kamar" id="akhir_operasi_kamar" placeholder="akhir_operasi_kamar" value="{{( empty(old('akhir_operasi_kamar')))? (!empty($periksa->hasil_akhir['akhir_operasi_kamar']))? $periksa->hasil_akhir['akhir_operasi_kamar'] : '-': old('akhir_operasi_kamar')}}"> 
                            </div>
                            <label for="akhir_operasi_tanggal" class="col-sm-2 col-form-label col-form-label-sm">Tanggal</label>
                            <div class=" col-sm-4">
                                <input type="date" class="form-control form-control-sm" name="akhir_operasi_tanggal" id="akhir_operasi_tanggal" placeholder="akhir_operasi_tanggal" value="{{( empty(old('akhir_operasi_tanggal')))? (!empty($periksa->hasil_akhir['akhir_operasi_tanggal']))? $periksa->hasil_akhir['akhir_operasi_tanggal'] : '-': old('akhir_operasi_tanggal')}}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="akhir_rujuk_ke" class="col-sm-2 col-form-label col-form-label-sm">Rujuk ke</label>
                            <div class=" col-sm-4">
                                <input type="text" class="form-control form-control-sm" name="akhir_rujuk_ke" id="akhir_rujuk_ke" placeholder="akhir_rujuk_ke" value="{{( empty(old('akhir_rujuk_ke')))? (!empty($periksa->hasil_akhir['akhir_rujuk_ke']))? $periksa->hasil_akhir['akhir_rujuk_ke'] : '-': old('akhir_rujuk_ke')}}"> 
                            </div>
                            <label for="akhir_rujuk_alasan" class="col-sm-2 col-form-label col-form-label-sm">Alasan rujuk (indikasi medis)</label>
                            <div class=" col-sm-4">
                                <input type="text" class="form-control form-control-sm" name="akhir_rujuk_alasan" id="akhir_rujuk_alasan" placeholder="akhir_rujuk_alasan" value="{{( empty(old('akhir_rujuk_alasan')))? (!empty($periksa->hasil_akhir['akhir_rujuk_alasan']))? $periksa->hasil_akhir['akhir_rujuk_alasan'] : '-': old('akhir_rujuk_alasan')}}"> 
                            </div>
                        </div>
                        <hr>
                        Pulang
                        <div class="form-group row">
                            <label for="akhir_dirawat_ruangan" class="col-sm-4 col-form-label col-form-label-sm">Indikasi medis, kontrol berobat jalan pada poli</label>
                            <div class=" col-sm-6">
                                <input type="text" class="form-control form-control-sm" name="akhir_pulang_indikasiMedis" id="akhir_pulang_indikasiMedis" placeholder="akhir_pulang_indikasiMedis" value="{{( empty(old('akhir_pulang_indikasiMedis')))? (!empty($periksa->hasil_akhir['akhir_pulang_indikasiMedis']))? $periksa->hasil_akhir['akhir_pulang_indikasiMedis'] : '-': old('akhir_pulang_indikasiMedis')}}"> 
                            </div>
                            <div class=" col-sm-2">
                                <input type="date" class="form-control form-control-sm" name="akhir_pulang_tanggal" id="akhir_pulang_tanggal" placeholder="akhir_pulang_tanggal" value="{{( empty(old('akhir_pulang_tanggal')))? (!empty($periksa->hasil_akhir['akhir_pulang_tanggal']))? $periksa->hasil_akhir['akhir_pulang_tanggal'] : '-': old('akhir_pulang_tanggal')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akhir_pulang_permintaanSendiri" class="col-sm-4 col-form-label col-form-label-sm">Atas permintaan sendiri</label>
                            <div class=" col-sm-6">
                                <input type="text" class="form-control form-control-sm" name="akhir_pulang_permintaanSendiri" id="akhir_pulang_permintaanSendiri" placeholder="akhir_pulang_permintaanSendiri" value="{{( empty(old('akhir_pulang_permintaanSendiri')))? (!empty($periksa->hasil_akhir['akhir_pulang_permintaanSendiri']))? $periksa->hasil_akhir['akhir_pulang_permintaanSendiri'] : '-': old('akhir_pulang_permintaanSendiri')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akhir_pulang_menolakRawat" class="col-sm-4 col-form-label col-form-label-sm">Menolak rawat inap dengan alasan</label>
                            <div class=" col-sm-6">
                                <input type="text" class="form-control form-control-sm" name="akhir_pulang_menolakRawat" id="akhir_pulang_menolakRawat" placeholder="akhir_pulang_menolakRawat" value="{{( empty(old('akhir_pulang_menolakRawat')))? (!empty($periksa->hasil_akhir['akhir_pulang_menolakRawat']))? $periksa->hasil_akhir['akhir_pulang_menolakRawat'] : '-': old('akhir_pulang_menolakRawat')}}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="akhir_pulang_meninggalDunia" class="col-sm-4 col-form-label col-form-label-sm">Meninggal dunia tanggal </label>
                            <div class=" col-sm-6">
                                <input type="date" class="form-control form-control-sm" name="akhir_pulang_meninggalDunia" id="akhir_pulang_meninggalDunia" placeholder="akhir_pulang_meninggalDunia" value="{{( empty(old('akhir_pulang_meninggalDunia')))? (!empty($periksa->hasil_akhir['akhir_pulang_meninggalDunia']))? $periksa->hasil_akhir['akhir_pulang_meninggalDunia'] : '-': old('akhir_pulang_meninggalDunia')}}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="akhir_pulang_doa" class="col-sm-4 col-form-label col-form-label-sm">Dead On Arrival (DOA) tanggal </label>
                            <div class=" col-sm-6">
                                <input type="date" class="form-control form-control-sm" name="akhir_pulang_doa" id="akhir_pulang_doa" placeholder="akhir_pulang_doa" value="{{( empty(old('akhir_pulang_doa')))? (!empty($periksa->hasil_akhir['akhir_pulang_doa']))? $periksa->hasil_akhir['akhir_pulang_doa'] : '-': old('akhir_pulang_doa')}}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="akhir_pulang_lain" class="col-sm-4 col-form-label col-form-label-sm">Lain-lain</label>
                            <div class=" col-sm-6">
                                <input type="text" class="form-control form-control-sm" name="akhir_pulang_lain" id="akhir_pulang_lain" placeholder="akhir_pulang_lain" value="{{( empty(old('akhir_pulang_lain')))? (!empty($periksa->hasil_akhir['akhir_pulang_lain']))? $periksa->hasil_akhir['akhir_pulang_lain'] : '-': old('akhir_pulang_lain')}}"> 
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                
			</div>
          </div>
          
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

    </div>
</main>

@endsection




@section('script')
<script>
    var tgl_keluar = {{( $periksa->tangal_keluar == '' OR $periksa->tangal_keluar==NULL ) ? 'true' : 'false'}};
    if (tgl_keluar == false) {
        $("#btn_observasi1").css("display", "none")
        $("#btn_observasi2").css("display", "none")
    }

        jQuery("input").removeAttr('name');
        jQuery("textarea").removeAttr('name');
        
</script>
@endsection
