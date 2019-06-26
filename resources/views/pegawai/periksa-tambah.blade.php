@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Daftar Pemeriksaan Baru</h1>
            <p>Informasi yang didpatkan saat pasien baru masuk UGD</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nomorPasien" placeholder="Nomor Pasien" value="210000000002">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-block" onclick="caripasien($('#nomorPasien').val())">Cari</button>
                    </div>
                </div>
			</div>
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.periksa.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pasien_id" id="idPasien">
    
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                    <div class="row">
                                            <div class="col-sm-12">
                                            <strong>Profil Calon Pasien Pra Hospital</strong><hr>
                                            </div>
                                        </div>
                                    <table class="table table-sm table-borderless">
                                        <tr><td>Nama</td> <th id="pasienNama"></th></tr>
                                        <tr><td>Username</td> <th id="pasienUsername"></th></tr>
                                        <tr><td>Jenis Kelamin</td> <th id="pasienLp"></th></tr>
                                        <tr><td>Kota</td> <th id="pasienKota"></th></tr>
                                        <tr><td>Alamat</td> <th id="pasienAlamat"></th></tr>
                                        <tr><td>Golongan Darah</td> <th id="pasienGolDarah"></th></tr>
                                        <tr><td>HP</td> <th id="pasienHp"></th></tr>
                                        <tr><td>Pekerjaan</td> <th id="pasienPekerjaan"></th></tr>
                                        <tr><td>Agama</td> <th id="pasienAgama"></th></tr>
                                        <tr><td>Nama Wali</td> <th id="pasienNamaWali"></th></tr>
                                        <tr><td>HP Wali</td> <th id="pasienHpWali"></th></tr>
                                        <tr><td>Alamat Wali</td> <th id="pasienAlamatWali"></th></tr>
                                    </table>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <strong>Daftar Perawatan UGD</strong><hr>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Pasien" class="col-sm-4 col-form-label">Pasien</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="CalonPasien" value="" readonly required>
                                        <small class="form-text text-muted" id="jadwalhelp">pastikan Profil pencarian pasien tepat cocokkan dangan data pencarian</small>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cara_datang" class="col-sm-4 col-form-label">Pegawai</label>
                                    <div class="col-sm-8">
                                    <select name="pegawai_id" class="form-control" required>
                                        <option disabled selected>Pilih Pegawai / Perawat</option>
                                        @foreach ($pegawais as $pegawai)
                                            <option {{ old('pegawai_id')=='pegawai_id' ? 'selected' : ''}} value="{{$pegawai->id}}">{{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pegawai_id'))
                                        <strong class="text-danger">{{ $errors->first('pegawai_id') }}</strong>
                                    @endif
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="cara_datang" class="col-sm-4 col-form-label">Dokter</label>
                                    <div class="col-sm-8">
                                        <select name="dokter_id" class="form-control" required>
                                            <option disabled selected>Pilih Dokter</option>
                                            @foreach ($dokters as $dokter)
                                                <option {{ old('dokter_id')=='dokter_id' ? 'selected' : ''}} value="{{$dokter->id}}">{{$dokter->nama}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('dokter_id'))
                                            <strong class="text-danger">{{ $errors->first('dokter_id') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                
                               <div class="form-group row">
                                    <label for="cara_datang" class="col-sm-4 col-form-label">Cara Datang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cara_datang" id="cara_datang" placeholder="Cara Datang" value="{{old('cara_datang')}}" required>
                                        @if ($errors->has('cara_datang'))
                                            <strong class="text-danger">{{ $errors->first('cara_datang') }}</strong>
                                        @endif
                                        <small class="form-text text-muted" id="jadwalhelp">Sendiri, Ambulan, Diantar Polisi, Lain-lain</small>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kasus" class="col-sm-4 col-form-label">Jenis Kasus</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jenis_kasus" id="jenis_kasus" placeholder="Jenis kasus" value="{{old('jenis_kasus')}}" required>
                                         @if ($errors->has('jenis_kasus'))
                                            <strong class="text-danger">{{ $errors->first('jenis_kasus') }}</strong>
                                        @endif
                                        <small class="form-text text-muted" id="jadwalhelp">Non Trauma, Trauma, Kecelakaan Air, Kecelakaan Pejalan Kaki, Kecelakaan Lalulintas, Kecelakaan Kerja, Kecelakaan Rumah Tanggal, lain-lain...</small>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                </form>
             </div>
            </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
					<small class="form-text text-muted" id="jadwalhelp">Dokter dapat merubah password</small>
				</div>
				</div>
			  </div>
			</div>
		  </div>

    </div>
</main>

@endsection


{{-- <div class="tile">
        <div class="tile-body">
          <form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.periksa.store')}}">
              {{ csrf_field() }}

                  <div class="row">
                      <div class="col-md-4 col-sm-12">
                              <div class="row">
                                      <div class="col-sm-12">
                                      <strong>Profil Calon Pasien Pra Hospital</strong><hr>
                                      </div>
                                  </div>
                              <table class="table table-sm table-borderless">
                                  <tr><td>Nama</td> <th id="pasienNama"></th></tr>
                                  <tr><td>Username</td> <th id="pasienUsername"></th></tr>
                                  <tr><td>Jenis Kelamin</td> <th id="pasienLp"></th></tr>
                                  <tr><td>Kota</td> <th id="pasienKota"></th></tr>
                                  <tr><td>Alamat</td> <th id="pasienAlamat"></th></tr>
                                  <tr><td>Golongan Darah</td> <th id="pasienGolDarah"></th></tr>
                                  <tr><td>HP</td> <th id="pasienHp"></th></tr>
                                  <tr><td>Pekerjaan</td> <th id="pasienPekerjaan"></th></tr>
                                  <tr><td>Agama</td> <th id="pasienAgama"></th></tr>
                                  <tr><td>Nama Wali</td> <th id="pasienNamaWali"></th></tr>
                                  <tr><td>HP Wali</td> <th id="pasienHpWali"></th></tr>
                                  <tr><td>Alamat Wali</td> <th id="pasienAlamatWali"></th></tr>
                              </table>
                      </div>
                      <div class="col-md-5 col-sm-12">
                          <div class="row">
                              <div class="col-sm-12">
                              <strong>Keadaan Pra Hospital</strong><hr>
                              </div>
                          </div>
                         <div class="form-group row">
                              <label for="avpu" class="col-sm-4 col-form-label col-form-label-sm">AVPU</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="avpu" id="avpu" placeholder="AVPU" value="{{old('avpu')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="pernafasan" class="col-sm-4 col-form-label col-form-label-sm">Pernavasan (x/Menit)</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="pernafasan" id="pernafasan" placeholder="Pernavasan (x/Menit)" value="{{old('pernafasan')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="tensidarah" class="col-sm-4 col-form-label col-form-label-sm">Tensi Darah (mmHg)</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="tensidarah" id="tensidarah" placeholder="Tensi Darah (mmHg)" value="{{old('tensidarah')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="suhu" class="col-sm-4 col-form-label col-form-label-sm">Suhu Axila (C)</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="suhu" id="suhu" placeholder="Suhu Axila (C)" value="{{old('suhu')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="nadi" class="col-sm-4 col-form-label col-form-label-sm">Nadi (x/Menit)</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="nadi" id="nadi" placeholder="Nadi (x/Menit)" value="{{old('nadi')}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="spo2" class="col-sm-4 col-form-label col-form-label-sm">SPO2 (%)</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" name="spo2" id="spo2" placeholder="SPO2 (%)" value="{{old('spo2')}}">
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
                                  <input type="checkbox" class="custom-control-input" name="cpr" value="CPR" id="cpr">
                                  <label class="custom-control-label" for="cpr">CPR</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="o2" value="O2" id="o2">
                                  <label class="custom-control-label" for="o2">O2</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="infus" value="Infus" id="infus">
                                  <label class="custom-control-label" for="infus">Infus</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="ngt" value="NGT" id="ngt">
                                  <label class="custom-control-label" for="ngt">NGT</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="nasopharingealTube" value="Nasopharingeal Tube" id="nasopharingealTube">
                                  <label class="custom-control-label" for="nasopharingealTube">Nasopharingeal Tube</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="ett" value="ETT" id="ett">
                                  <label class="custom-control-label" for="ett">ETT</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="suction" value="Suction" id="suction">
                                  <label class="custom-control-label" for="suction">Suction</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="krikotiroidotomi" value="Krikotiroidotomi" id="krikotiroidotomi">
                                  <label class="custom-control-label" for="krikotiroidotomi">Krikotiroidotomi</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="bvm" value="BVM" id="bvm">
                                  <label class="custom-control-label" for="bvm">BVM</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="bidai" value="Bidai" id="bidai">
                                  <label class="custom-control-label" for="bidai">Bidai</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="catheterUrine" value="Catheter Urine" id="catheterUrine">
                                  <label class="custom-control-label" for="catheterUrine">Catheter Urine</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="bebanTekan" value="Beban Tekan" id="bebanTekan">
                                  <label class="custom-control-label" for="bebanTekan">Beban Tekan</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="heacting" value="Heacting" id="heacting">
                                  <label class="custom-control-label" for="heacting">Heacting</label>
                              </div>
                              <div class="form-group row" style="margin-bottom: 4px">
                                  <label for="obat" class="col-sm-2 col-form-label col-form-label-sm">Obat</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control form-control-sm" name="obat" id="obat" placeholder="Obat" value="{{old('obat')}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="lain" class="col-sm-2 col-form-label col-form-label-sm">lain</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control form-control-sm" name="lain" id="lain" placeholder="Lain-lain" value="{{old('lain')}}">
                                  </div>
                              </div>
                          </div>
                  </div>

          </form>
       </div>
      </div> --}}

@section('script')
<script>
        function caripasien(no) {
            $.get('{{ route('cari')}}?karakter='+no, function(response){
                
                if (response.kode=='00') {
                    $('#pasienNama').html(response.pasien.nama);
                    $('#pasienUsername').text(response.pasien.username);
                    $('#pasienLp').text(response.pasien.lp);
                    $('#pasienKota').text(response.pasien.kota);
                    $('#pasienAlamat').text(response.pasien.alamat_pasien);
                    $('#pasienGolDarah').text(response.pasien.gol_darah);
                    $('#pasienHp').text(response.pasien.hp_pasien);
                    $('#pasienPekerjaan').text(response.pasien.pekerjaan);
                    $('#pasienAgama').text(response.pasien.agama);
                    $('#pasienNamaWali').text(response.pasien.nama_wali);
                    $('#pasienHpWali').text(response.pasien.hp_wali);
                    $('#pasienAlamatWali').text(response.pasien.alamat_wali);
                    $('#CalonPasien').val(response.pasien.nama);
                    $('#idPasien').val(response.pasien.id);
                    
                }else{
                    $('#pasienNama').html("Tidak Diketemukan");
                    $('#pasienUsername').text("Tidak Diketemukan");
                    $('#pasienLp').text("Tidak Diketemukan");
                    $('#pasienKota').text("Tidak Diketemukan");
                    $('#pasienAlamat').text("Tidak Diketemukan");
                    $('#pasienGolDarah').text("Tidak Diketemukan");
                    $('#pasienHp').text("Tidak Diketemukan");
                    $('#pasienPekerjaan').text("Tidak Diketemukan");
                    $('#pasienAgama').text("Tidak Diketemukan");
                    $('#pasienNamaWali').text("Tidak Diketemukan");
                    $('#pasienHpWali').text("Tidak Diketemukan");
                    $('#pasienAlamatWali').text("Tidak Diketemukan");
                    $('#CalonPasien').val("");
                    $('#idPasien').val("");
                }

            });
        }
    </script>
@endsection
