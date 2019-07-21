@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Pasien</h1>
            <p>Mendaftarkan Pasien Baru</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('pegawai.pasien.store')}}">
                    {{ csrf_field() }}
    
                        <div class="row">
    
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pasien" value="{{old('nama')}}">
                                        @if ($errors->has('nama'))
                                            <small class="form-text text-muted">{{ $errors->first('nama') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lp" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="lp" class="form-control">
                                            <option disabled selected>Pilih Jenis Kelamin</option>
                                            <option {{ old('lp')=='Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                            <option {{ old('lp')=='Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                        </select>
                                        @if ($errors->has('lp'))
                                            <small class="form-text text-muted">{{ $errors->first('lp') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_wali" class="col-sm-2 col-form-label">Nama Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" value="{{old('nama_wali')}}">
                                        @if ($errors->has('nama_wali'))
                                            <small class="form-text text-muted">{{ $errors->first('nama_wali') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_wali" class="col-sm-2 col-form-label">Alamat Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" placeholder="Alamat Wali" value="{{old('alamat_wali')}}">
                                        @if ($errors->has('alamat_wali'))
                                            <small class="form-text text-muted">{{ $errors->first('alamat_wali') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hp_wali" class="col-sm-2 col-form-label">Hp Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="hp_wali" id="hp_wali" placeholder="Hp Wali" value="{{old('hp_wali')}}">
                                        @if ($errors->has('hp_wali'))
                                            <small class="form-text text-muted">{{ $errors->first('hp_wali') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat Pasien</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_pasien" id="alamat_pasien" placeholder="Alamat Pasien">{{old('alamat_pasien')}}</textarea>
                                        @if ($errors->has('alamat_pasien'))
                                            <small class="form-text text-muted">{{ $errors->first('alamat_pasien') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
					<small class="form-text text-muted" id="jadwalhelp">Username Dan Password Tergenerate Automatis</small>
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
