@extends('dokter.dokter-template')
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
                            <img src="{{asset($profil->foto)}}" style="width:100%; max-width: 300px" class="rounded" alt="Icon dokter" class="mr-3">
                            @else
                            <div class="text-center m-3">
                            <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                            </div>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-sm">
                            <tr><td>Nama</td> <th id="dokterNama">{{$profil->nama}}</th></tr>
                            <tr><td>Username</td> <th id="dokterUsername">{{$profil->username}}</th></tr>
                            <tr><td>Jenis Kelamin</td> <th id="dokterLp">{{$profil->lp}}</th></tr>
                            <tr><td>Alamat</td> <th id="dokterAlamat">{{$profil->alamat}}</th></tr>
                            <tr><td>HP</td> <th id="dokterHp">{{$profil->hp}}</th></tr>
                            <tr><td>Pendidikan</td> <th id="dokterPekerjaan">{{$profil->pendidikan}}</th></tr>
                            <tr><td>Spesialis</td> <th id="dokterAgama">{{$profil->spesialis}}</th></tr>
                            <tr><td>Agama</td> <th id="dokterAgama">{{$profil->agama}}</th></tr>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="user-update">
              <div class="tile user-settings">
                <h4 class="line-head">Update User dokter</h4>
                <form action="{{route('dokter.profil.update')}}" method="post" enctype="multipart/form-data" >
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
                                <label for="hp" class="col-sm-2 col-form-label">No HP dokter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nomor HP" required="" name="hp" value="{{$profil->hp}}">
                                    @if ($errors->has('hp'))
                                        <strong class="text-danger">{{ $errors->first('hp') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat dokter</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat" rows="3" name="alamat" required="">{{$profil->alamat}}</textarea>
                                    @if ($errors->has('alamat'))
                                        <strong class="text-danger">{{ $errors->first('alamat') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Dokter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Golongan Darah" required="" name="pendidikan"value="{{$profil->pendidikan}}">
                                    @if ($errors->has('pendidikan'))
                                        <strong class="text-danger">{{ $errors->first('pendidikan') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="spesialis" class="col-sm-2 col-form-label">spesialis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Spesialis" required="" name="spesialis" value="{{$profil->spesialis}}">
                                    @if ($errors->has('spesialis'))
                                        <strong class="text-danger">{{ $errors->first('spesialis') }}</strong>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="pendidikan" class="col-sm-2 col-form-label">Agama Dokter</label>
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
                <form action="{{route('dokter.profil.password')}}" method="post">
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
    