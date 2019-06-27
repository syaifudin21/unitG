@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Pemeriksaan Detail</h1>
            <p>Informasi pemeriksaan pasien </p>
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
                            @if(!empty($periksa->pasien->riwayatpasien()->count()))
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <strong>Riwayat Diagnosa Pasien</strong>
                                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                                            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('dokter.diagnosa.create')}}">
                                                <i class="fa fa-plus"></i>Tambah Diagnosa</a> 
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Rumah Sakit</th>
                                        <th>Dokter</th>
                                        <th>Alergi</th>
                                        <th>Penyakit</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($periksa->pasien->riwayatpasien()->get() as $riwayat)
                                    <tr>
                                            <td>{{$riwayat->rumahsakit->nama}}</td>
                                            <td>{{$riwayat->dokter->nama}}</td>
                                            <td>{{$riwayat->alergi}}</td>
                                            <td>{{$riwayat->penyakit}}</td>
                                            <td></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
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
                                    <tr><td>Nama </td> <th>{{$periksa->dokter->nama}}</th></tr>
                                    <tr><td>Alamat </td> <th>{{$periksa->dokter->alamat}}</th></tr>
                                    <tr><td>Jenis Kelamin </td> <th>{{$periksa->dokter->lp}}</th></tr>
                                    <tr><td>Pendidikan </td> <th>{{$periksa->dokter->pendidikan}}</th></tr>
                                    <tr><td>No HP </td> <th>{{$periksa->dokter->hp}}</th></tr>
                                    <tr><td>Spesialis </td> <th>{{$periksa->dokter->spesialis}}</th></tr>
                                    <tr><td>Agama </td> <th>{{$periksa->dokter->agama}}</th></tr>
                                    <tr><td>Status On </td> <th>{{$periksa->dokter->status_on}}</th></tr>
                                </table>

                                
                               
                                
                            </div>
                            @endif
                        </div>

             </div>
            </div>



            <div class="tile">
                    <div class="tile-body">
                      <form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.periksa.store.pra')}}">
                          {{ csrf_field() }}
            
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
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="cpr" value="CPR" id="cpr" {{!empty($periksa->tindakan_pra['cpr'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="cpr">CPR</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="o2" value="O2" id="o2" {{!empty($periksa->tindakan_pra['o2'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="o2">O2</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="infus" value="Infus" id="infus" {{!empty($periksa->tindakan_pra['infus'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="infus">Infus</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="ngt" value="NGT" id="ngt" {{!empty($periksa->tindakan_pra['ngt'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="ngt">NGT</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="nasopharingealTube" value="Nasopharingeal Tube" id="nasopharingealTube" {{!empty($periksa->tindakan_pra['nasopharingeal_tube'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="nasopharingealTube">Nasopharingeal Tube</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="ett" value="ETT" id="ett" {{!empty($periksa->tindakan_pra['ett'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="ett">ETT</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="suction" value="Suction" id="suction" {{!empty($periksa->tindakan_pra['suction'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="suction">Suction</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="krikotiroidotomi" value="Krikotiroidotomi" id="krikotiroidotomi" {{!empty($periksa->tindakan_pra['krikotiroidotomi'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="krikotiroidotomi">Krikotiroidotomi</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="bvm" value="BVM" id="bvm" {{!empty($periksa->tindakan_pra['bvm'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="bvm">BVM</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="bidai" value="Bidai" id="bidai" {{!empty($periksa->tindakan_pra['bidai'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="bidai">Bidai</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="catheterUrine" value="Catheter Urine" id="catheterUrine" {{!empty($periksa->tindakan_pra['catheter_urine'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="catheterUrine">Catheter Urine</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="bebanTekan" value="Beban Tekan" id="bebanTekan" {{!empty($periksa->tindakan_pra['beban_tekan'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="bebanTekan">Beban Tekan</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="heacting" value="Heacting" id="heacting" {{!empty($periksa->tindakan_pra['heacting'])? 'checked' : ''}}>
                                              <label class="custom-control-label" for="heacting">Heacting</label>
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
                                            <hr>
                                            <div class="row">
                                                <div class="col-8">
                                                        <small class="form-text text-muted" id="jadwalhelp">Keadaan Pra Hospital, Tindakan Pra Hospital dan juga Anemnesa Perawat tidak bisa dirubah lagi jika sudah dismpan</small>
                                                </div>
                                                <div class="col-4"><button class="btn btn-primary btn-block" type="submit">Simpan</button></div>
                                            </div>
                                            
                                                
                                            
                                        </div>
                              </div>
            
                      </form>
                   </div>
                  </div>

                  <div class="tile">
                      <h4 class="tile-title">Pengkajian Keperawatan Primer</h4>
                      


                      {{-- breathing

                      pola_nafas (teratur, tidak_teratur)
                      suara_nafas (vesikuler, bronchovesikuler, whezing, ronchi)
                      pola_nafas (apneu dyspneu bradipneu takhipneu, orthopneu, penggunaan_otot_bantu_nafas, pernafasan_perut)
                      frekuensi_nafas ..... xmnt
                      diagnosa_keperawatan (pola_nafas_tidak_efektif, gangguanPertukaranGas)

                      circulation
                      Akral (hangat, dingin)
                      pucat (ya, tidak)
                      cianosis (ya, tidak)
                      pengisian_kapiler (<2 detik, >2 detik)
                          tekanan_darah ... mmHg
                          nadi (teraba ....x/mnt, tidak_teraba)
                          perdarahan (ya ....cc lokasi perdarahan ...... , tidak)
                          Adanya riwayat kehilangan cairan dalam jumlah besar (Diare, Muntah, Luka bakar, Perdarahan)
                          Kelembaban kulit (lembab, kering)
                          turgor (normal, kurang)
                          Luas luka bakar ........ % 
                          Grade .......
                          Produksi Urine ....... cc
                          Diagnosa Keperawatan (Ganggunan perfusi jaringan perifer, Gangguan keseimbangan cairan elektrolit, Resiko shok Hipovolemik) --}}
                        

                      <div class="tile-body">
                          <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <strong>Airway</strong><hr>
                                        </div>
                                    </div>
                                    Paten Tidak Paten
                      diagnosaKeperawatan bersihkanJalanNafasTidakEfektif resikoGagalnafas --}}
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="paten" value="Paten" id="paten" {{!empty($periksa->tindakan_pra['paten'])? 'checked' : ''}}>
                                        <label class="custom-control-label" for="paten">Paten</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="paten" value="Tidak Paten" id="tidakpaten" {{!empty($periksa->tindakan_pra['paten'])? 'checked' : ''}}>
                                        <label class="custom-control-label" for="tidakpaten">Tidak Paten</label>
                                    </div>
                                        <div class="ml-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="tidak_paten_snoring" value="Snoring" id="tidak_paten_snoring" {{!empty($periksa->tindakan_pra['tidak_paten_snoring'])? 'checked' : ''}}>
                                                <label class="custom-control-label" for="tidak_paten_snoring">Snoring</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="tidak_paten_gargling" value="Gargling" id="tidak_paten_gargling" {{!empty($periksa->tindakan_pra['tidak_paten_gargling'])? 'checked' : ''}}>
                                                <label class="custom-control-label" for="tidak_paten_gargling">Gargling</label>
                                            </div>
                                           
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="tidak_paten_stridor" value="Striodor" id="tidak_paten_stridor" {{!empty($periksa->tindakan_pra['tidak_paten_stridor'])? 'checked' : ''}}>
                                                <label class="custom-control-label" for="tidak_paten_stridor">Striodor</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="tidak_paten_benda_asing" value="Benda Asing" id="tidak_paten_benda_asing" {{!empty($periksa->tindakan_pra['tidak_paten_benda_asing'])? 'checked' : ''}}>
                                                <label class="custom-control-label" for="tidak_paten_benda_asing">Benda Asing</label>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" name="tidak_paten_lain" id="tidak_paten_lain" placeholder="Lain-lain" value="{{!empty($periksa->tindakan_pra['lain'])? $periksa->tindakan_pra['lain'] : ''}}">
                                            
                                        </div>
                                    
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="paten" value="Tidak Paten" id="tidakpaten" {{!empty($periksa->tindakan_pra['paten'])? 'checked' : ''}}>
                                        <label class="custom-control-label" for="tidakpaten">Tidak Paten</label>
                                    </div>
                                </div>
                          </div>
                      </div>
                  </div>
                  
			</div>
		  </div>

    </div>
</main>

@endsection




@section('script')
<script>
    var logika = 'disabled'
    if (logika == 'disabled') {
        // jQuery("input[type='text']").prop("disabled", true);
        jQuery("#avpu ,#pernafasan ,#tensiDarah ,#suhu ,#nadi ,#spo2 ,#o2 ,#cpr ,#infus ,#ngt ,#nasopharingealTube ,#ett ,#suction ,#krikotiroidotomi ,#bvm ,#bidai ,#catheterUrine ,#bebanTekan ,#heacting ,#obat ,#lain ,#keluhanUtama ,#anemnesa").prop("disabled", true);
    }
</script>
@endsection
