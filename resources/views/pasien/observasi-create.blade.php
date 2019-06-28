@extends('pasien.pasien-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Observasi Lanjutan</h1>
            <p>Keluhan yang dialami pasien</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" method="post" action="{{route('pegawai.observasi.store')}}">
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
                                    <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Keluhan">{{old('keluhan')}}</textarea>
                                        @if ($errors->has('keluhan'))
                                            <small class="form-text text-muted">{{ $errors->first('keluhan') }}</small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="gcs" class="col-sm-3 col-form-label">GCS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="gcs" id="gcs" placeholder="GCS" value="{{old('gcs')}}">
                                        @if ($errors->has('gcs'))
                                            <small class="form-text text-muted">{{ $errors->first('gcs') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t" class="col-sm-3 col-form-label">T</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t" id="t" placeholder="T" value="{{old('t')}}">
                                        @if ($errors->has('t'))
                                            <small class="form-text text-muted">{{ $errors->first('t') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="n" class="col-sm-3 col-form-label">N</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="n" id="n" placeholder="N" value="{{old('n')}}">
                                        @if ($errors->has('n'))
                                            <small class="form-text text-muted">{{ $errors->first('n') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rr" class="col-sm-3 col-form-label">RR</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rr" id="rr" placeholder="RR" value="{{old('rr')}}">
                                        @if ($errors->has('rr'))
                                            <small class="form-text text-muted">{{ $errors->first('rr') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s" class="col-sm-3 col-form-label">S</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s" id="s" placeholder="S" value="{{old('s')}}">
                                        @if ($errors->has('s'))
                                            <small class="form-text text-muted">{{ $errors->first('s') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="SAT" class="col-sm-3 col-form-label">SAT</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sat" id="SAT" placeholder="SAT" value="{{old('SAT')}}">
                                        @if ($errors->has('SAT'))
                                            <small class="form-text text-muted">{{ $errors->first('SAT') }}</small>
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
                    <b class="text-danger" >Tindakan keperwatan tidak dapat dirubah ataupun dihapus, hati hati dalam menulisakan Keluhan (Observasi Lanjutan) </b>
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
