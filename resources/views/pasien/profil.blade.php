@extends('pasien.pasien-template')
@section('content')

    <main class="app-content">
      <div class="row user">
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-profil" data-toggle="tab">Profil</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-update" data-toggle="tab">Update</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-password" data-toggle="tab">Password</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-profil">
              <div class="tile user-settings">
                <h4 class="line-head">Profil</h4>
                <div class="row">
                    <div class="col-md-4">
                            @if (!empty($profil->foto))
                            <img src="{{asset($profil->foto)}}" style="width:100%; max-width: 300px" class="rounded" alt="Icon pasien" class="mr-3">
                            @else
                            <div class="text-center m-3">
                            <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                            </div>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-sm">
                            <tr><td>Nama</td> <th id="pasienNama">{{$profil->nama}}</th></tr>
                            <tr><td>Username</td> <th id="pasienUsername">{{$profil->username}}</th></tr>
                            <tr><td>Jenis Kelamin</td> <th id="pasienLp">{{$profil->lp}}</th></tr>
                            <tr><td>Kota</td> <th id="pasienKota">{{$profil->kota}}</th></tr>
                            <tr><td>Alamat</td> <th id="pasienAlamat">{{$profil->alamat_pasien}}</th></tr>
                            <tr><td>Golongan Darah</td> <th id="pasienGolDarah">{{$profil->gol_darah}}</th></tr>
                            <tr><td>HP</td> <th id="pasienHp">{{$profil->hp_pasien}}</th></tr>
                            <tr><td>Pekerjaan</td> <th id="pasienPekerjaan">{{$profil->pekerjaan}}</th></tr>
                            <tr><td>Agama</td> <th id="pasienAgama">{{$profil->agama}}</th></tr>
                            <tr><td>Nama Wali</td> <th id="pasienNamaWali">{{$profil->nama_wali}}</th></tr>
                            <tr><td>HP Wali</td> <th id="pasienHpWali">{{$profil->hp_wali}}</th></tr>
                            <tr><td>Alamat Wali</td> <th id="pasienAlamatWali">{{$profil->alamat_wali}}</th></tr>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="user-update">
              <div class="tile user-settings">
                <h4 class="line-head">Update User Pasien</h4>
                <form action="{{route('pasien.profil.update')}}" method="post" enctype="multipart/form-data" >
                        @method('PUT') @csrf
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama" required="" name="nama" value="{{$profil->nama}}">
                                    @if ($errors->has('nama'))
                                        <strong class="text-danger">{{ $errors->first('nama') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="foto">
                                @if ($errors->has('foto'))
                                    <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Username" disabled value="{{$profil->username}}">
                                    @if ($errors->has('username'))
                                        <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">L/P</label>
                                <div class="col-sm-10">
                                    <select name="lp" class="form-control">
                                        <option disabled>Pilih Jenis Kelamin</option>
                                        <option {{ $profil->lp=='Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                        <option {{ $profil->lp=='Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @if ($errors->has('lp'))
                                        <strong class="text-danger">{{ $errors->first('lp') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Kota" required="" name="kota" value="{{$profil->kota}}">
                                    @if ($errors->has('kota'))
                                        <strong class="text-danger">{{ $errors->first('kota') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="hp_pasien" class="col-sm-2 col-form-label">No HP Pasien</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nomor HP" required="" name="hp_pasien" value="{{$profil->hp_pasien}}">
                                    @if ($errors->has('hp_pasien'))
                                        <strong class="text-danger">{{ $errors->first('hp_pasien') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat Pasien</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat" rows="3" name="alamat_pasien" required="">{{$profil->alamat_pasien}}</textarea>
                                    @if ($errors->has('alamat_pasien'))
                                        <strong class="text-danger">{{ $errors->first('alamat_pasien') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="gol_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Golongan Darah" required="" name="gol_darah"value="{{$profil->gol_darah}}">
                                    @if ($errors->has('gol_darah'))
                                        <strong class="text-danger">{{ $errors->first('gol_darah') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Pekerjaan" required="" name="pekerjaan" value="{{$profil->pekerjaan}}">
                                    @if ($errors->has('pekerjaan'))
                                        <strong class="text-danger">{{ $errors->first('pekerjaan') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Agama Pasien</label>
                                <div class="col-sm-10">
                                    <select name="agama" class="form-control">
                                        <option disabled selected>Pilih Agama</option>
                                        <option {{ $profil->agama=='Islam' ? 'selected' : ''}}>Islam</option>
                                        <option {{ $profil->agama=='Kristen' ? 'selected' : ''}}>Kristen</option>
                                        <option {{ $profil->agama=='Katolik' ? 'selected' : ''}}>Katolik</option>
                                        <option {{ $profil->agama=='Hindu' ? 'selected' : ''}}>Hindu</option>
                                        <option {{ $profil->agama=='Budha' ? 'selected' : ''}}>Budha</option>
                                        <option {{ $profil->agama=='Kong Hu Chu' ? 'selected' : ''}}>Kong Hu Chu</option>
                                    </select>
                                    @if ($errors->has('agama'))
                                        <strong class="text-danger">{{ $errors->first('agama') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Nama Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Wali" required="" name="nama_wali" value="{{$profil->nama_wali}}">
                                    @if ($errors->has('nama_wali'))
                                        <strong class="text-danger">{{ $errors->first('nama_wali') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">No HP Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nomor HP Wali" required="" name="hp_wali" value="{{$profil->hp_wali}}">
                                    @if ($errors->has('hp_wali'))
                                        <strong class="text-danger">{{ $errors->first('hp_wali') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Alamat Wali</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat Wali" rows="3" name="alamat_wali" required="">{{$profil->alamat_wali}}</textarea>
                                    @if ($errors->has('alamat_wali'))
                                        <strong class="text-danger">{{ $errors->first('alamat_wali') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="row mb-10">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Updte Profil</button>
                        </div>
                        </div>
                      </form>
              </div>
            </div>

            <div class="tab-pane fade" id="user-password">
              <div class="tile user-settings">
                <h4 class="line-head">Rubah Password</h4>
                <form action="{{route('pasien.profil.password')}}" method="post">
                 @csrf 
                 @method('PUT')
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Password Lama</label>
                      <input class="form-control" type="password" placeholder="Password Lama" name="passwordlama">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Password Baru</label>
                      <input class="form-control" type="password" placeholder="Password Baru" name="passwordbaru">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Konfirmasi Password Baru</label>
                      <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="cpasswordbaru">
                    </div>
                    
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Rubah Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection

@section('script')
@endsection
    