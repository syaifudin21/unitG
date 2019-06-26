@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Gunung Indonesia</h1>
            <p>Informasi deskripsi gunung yang ada di Indonesia</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('admin.gunung.store')}}">
						{{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Gunung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="staticEmail" placeholder="Nama Gunung" value="{{old('nama')}}">
                                    @if ($errors->has('nama'))
                                        <small class="form-text text-muted">{{ $errors->first('nama') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat Gunung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" id="staticEmail" placeholder="Alamat Gunung" value="{{old('alamat')}}">
                                    @if ($errors->has('alamat'))
                                        <small class="form-text text-muted">{{ $errors->first('alamat') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" onchange="fotoURl(this)" name="thumbnail" id="staticEmail" >
                                    @if ($errors->has('thumbnail'))
                                        <small class="form-text text-muted">{{ $errors->first('thumbnail') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control" id="status">
                                        <option disabled selected>Pilih Status</option>
                                        <option>Aktif Normal</option>
                                        <option>Waspada</option>
                                        <option>Siaga</option>
                                        <option>Awas</option>
                                        <option>Non Aktif</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <small class="form-text text-muted">{{ $errors->first('status') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <img src="{{asset('images/thumbnail.svg')}}" width="100%" class="rounded" alt="thumbnail" id="thumbnail">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                        <textarea id="summernote" name="deskripsi">{{old('deskripsi')}}</textarea>
                    </div>
                    </div>

				</form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
					<small class="form-text text-muted" id="jadwalhelp">Foto galeri diinputkan setelah nama gunung dan deskripsi gunung sudah ditambah</small>
				</div>
				</div>
			  </div>
			</div>
		  </div>

    </div>
</main>

@endsection

@section('script')
<!-- include summernote css/js -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script>
$(document).ready(function() {
$("#summernote").summernote({
    placeholder: 'Deskripsi Gunung',
        height: 300,
            callbacks: {
        onImageUpload : function(files, editor, welEditable) {

                for(var i = files.length - 1; i >= 0; i--) {
                        sendFile(files[i], this);
            }
        }
    }
    });
});
function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    data: form_data,
    type: "POST",
    url: '{{route('upload.gambar')}}',
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
        console.log(response.image);
        $(el).summernote('editor.insertImage', response.image);
    }
});
}

function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
