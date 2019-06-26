@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Dokter {{$dokter->nama}} Update</h1>
            <p>Informasi dokter akan diedit</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('pegawai.dokter.update')}}">
                    {{ csrf_field() }} @method('PUT') <input type="hidden" name="id" value="{{$dokter->id}}">
    
                        <div class="row">
    
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Reporter" value="{{$dokter->nama}}">
                                        @if ($errors->has('nama'))
                                            <small class="form-text text-muted">{{ $errors->first('nama') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$dokter->username}}">
                                        @if ($errors->has('username'))
                                            <small class="form-text text-muted">{{ $errors->first('username') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="lp" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="lp" class="form-control">
                                                <option disabled selected>Pilih Jenis Kelamin</option>
                                                <option {{ $dokter->lp=='Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                                <option {{ $dokter->lp=='Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                            @if ($errors->has('lp'))
                                                <small class="form-text text-muted">{{ $errors->first('lp') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="agama" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="agama" class="form-control">
                                                <option disabled selected>Pilih Agama</option>
                                                <option {{ $dokter->agama=='Islam' ? 'selected' : ''}}>Islam</option>
                                                <option {{ $dokter->agama=='Kristen' ? 'selected' : ''}}>Kristen</option>
                                                <option {{ $dokter->agama=='Katolik' ? 'selected' : ''}}>Katolik</option>
                                                <option {{ $dokter->agama=='Hindu' ? 'selected' : ''}}>Hindu</option>
                                                <option {{ $dokter->agama=='Budha' ? 'selected' : ''}}>Budha</option>
                                                <option {{ $dokter->agama=='Kong Hu Chu' ? 'selected' : ''}}>Kong Hu Chu</option>
                                            </select>
                                            @if ($errors->has('agama'))
                                                <small class="form-text text-muted">{{ $errors->first('agama') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="{{$dokter->pendidikan}}">
                                            @if ($errors->has('pendidikan'))
                                                <small class="form-text text-muted">{{ $errors->first('pendidikan') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hp" class="col-sm-2 col-form-label">Handphone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="hp" id="hp" placeholder="Handphone" value="{{$dokter->hp}}">
                                            @if ($errors->has('hp'))
                                                <small class="form-text text-muted">{{ $errors->first('hp') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="spesialis" id="spesialis" placeholder="Spesialis / Keahlian" value="{{$dokter->spesialis}}">
                                            @if ($errors->has('spesialis'))
                                                <small class="form-text text-muted">{{ $errors->first('spesialis') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{$dokter->alamat}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <small class="form-text text-muted">{{ $errors->first('alamat') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Password Reporter" value="{{old('password')}}">
                                        @if ($errors->has('password'))
                                            <small class="form-text text-muted">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
    
    
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" onchange="fotoURl(this)" name="foto" id="staticEmail" >
                                        @if ($errors->has('foto'))
                                            <small class="form-text text-muted">{{ $errors->first('foto') }}</small>
                                        @endif
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <img src="{{(!empty($dokter->foto))?asset($dokter->foto): asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="foto">
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value="{{url()->previous()}}">
                    </form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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

@section('script')
<script>
function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
