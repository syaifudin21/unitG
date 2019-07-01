@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Alat Terpasang</h1>
            <p>Alat yang terpasang pada pasien</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.alatterpasang.store')}}">
                    {{ csrf_field() }} 
                    <input type="hidden" name="periksa_id" value="{{$periksa->id}}">
                    <input type="hidden" name="pasien_id" value="{{$periksa->pasien_id}}">
                    <input type="hidden" name="nomor_rs" value="{{env('RS_NOMOR', 0000)}}">
                    <input type="hidden" name="pegawai_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="redirect" value="{{url()->previous()}}">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                <strong>Profil Pasien</strong><hr>
                                </div>
                            </div>
                            <table class="table table-sm table-borderless">
                                <tr><td>Nama</td> <th id="pasienNama">{{$periksa->pasien->nama}}</th></tr>
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
                        <div class="col-md-8 col-sm-12">
                                <b>Observasi Lanjutan</b>
                                <hr>

                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{old('keterangan')}}</textarea>
                                        @if ($errors->has('keterangan'))
                                            <small class="form-text text-muted">{{ $errors->first('keterangan') }}</small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="{{old('jenis')}}">
                                        @if ($errors->has('jenis'))
                                            <small class="form-text text-muted">{{ $errors->first('jenis') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="{{old('lokasi')}}">
                                        @if ($errors->has('lokasi'))
                                            <small class="form-text text-muted">{{ $errors->first('lokasi') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ukuran" class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran" value="{{old('ukuran')}}">
                                        @if ($errors->has('ukuran'))
                                            <small class="form-text text-muted">{{ $errors->first('ukuran') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

			  <div class="tile-footer">
				<div class="row">
                <div class="col-md-8">
                    <b class="text-danger" >Tindakan keperwatan tidak dapat dirubah ataupun dihapus, hati hati dalam menulisakan keperawatan </b>
                </div>
				  <div class="col-md-4">
                    <div class="float-right">
                        <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
                        <a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
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
@endsection