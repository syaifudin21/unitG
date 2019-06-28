@extends('dokter.dokter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Diagnosa Dokter</h1>
            <p>Klaim penyakit dari dokter pada pasien mengenai Alergi / Penyakit </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" method="post" action="{{route('dokter.diagnosa.store')}}">
                    {{ csrf_field() }} 
                    <input type="hidden" name="periksa_id" value="{{$periksa->id}}">
                    <input type="hidden" name="pasien_id" value="{{$periksa->pasien_id}}">
                    <input type="hidden" name="nomor_rs" value="{{env('RS_NOMOR', 0000)}}">
                    <input type="hidden" name="dokter_id" value="{{Auth::user()->id}}">
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
                                <b>Penyakit</b>
                                <hr>
                                    <textarea class="form-control" name="penyakit" id="penyakit" rows="5" placeholder="Penyakit Diderita Pasien">{{old('penyakit')}}</textarea>
                                    @if ($errors->has('penyakit'))
                                        <small class="form-text text-muted">{{ $errors->first('penyakit') }}</small>
                                    @endif
                                    <br>
                                    <b>Alergi</b>
                                <hr>
                                    <textarea class="form-control" name="alergi" id="alergi" rows="5" placeholder="Alergi">{{old('alergi')}}</textarea>
                                    @if ($errors->has('alergi'))
                                        <small class="form-text text-muted">{{ $errors->first('alergi') }}</small>
                                    @endif
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
