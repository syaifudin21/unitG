@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Inventeras</h1>
            <p>Informasi inventaris yang akan ditambahkan</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('pegawai.inventaris.store')}}">
                    {{ csrf_field() }}
    
                        <div class="row">
    
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Inventaris</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Inventaris" value="{{old('jenis')}}">
                                        @if ($errors->has('jenis'))
                                            <small class="form-text text-danger">{{ $errors->first('jenis') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-2 col-form-label">Total Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok yang dipunya" value="{{old('stok')}}">
                                        @if ($errors->has('stok'))
                                            <small class="form-text text-danger">{{ $errors->first('stok') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran" value="{{old('ukuran')}}">
                                        @if ($errors->has('ukuran'))
                                            <small class="form-text text-danger">{{ $errors->first('ukuran') }}</small>
                                        @endif
                                        <small class="form-text text-muted">Bisa Dikosongkan </small>
                                    </div>
                                </div>
                               
                                {{-- <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" onchange="fotoURl(this)" name="foto" id="staticEmail" >
                                        @if ($errors->has('foto'))
                                            <small class="form-text text-danger">{{ $errors->first('foto') }}</small>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="col-sm-12 col-md-3">
                                <img src="{{asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="foto">
                            </div> --}}
                        </div>
                    </form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
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
