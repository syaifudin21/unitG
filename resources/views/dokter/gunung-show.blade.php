@extends('admin.admin-template')
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

            <div class="media">
            <img src="{{asset($gunung->thumbnail)}}" style="max-height: 55px" alt="Icon Gunung" class="mr-3">
            <div class="media-body">
                <h5 class="mt-0">{{$gunung->nama}}</h5>
                {{$gunung->alamat}}
            </div>
            </div>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="publish('{{$gunung->id}}')" {{($gunung->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Private"></span>
            </label>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center">
                        <h3>{{$gunung->nama}}</h3>
                        <p>{{$gunung->alamat}}</p>
                    <img src="{{asset($gunung->thumbnail)}}" style="max-width: 400px" class="rounded" alt="Icon Gunung" class="mr-3">
                    </div>
                    <br>
                    {!!$gunung->deskripsi!!}


            <div class="tile-footer">
                Terakhir diupdate {{hari_tanggal_waktu($gunung->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('admin.gunung.edit', ['id'=> $gunung])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapu deskripsi gunung {{$gunung->nama}}" data-url="{{route('admin.gunung.delete', ['id'=> $gunung])}}" data-redirect="{{route('admin.gunung')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
            </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
                <div class="tile">
                <form action="{{ route('galeri.store') }}" class="dropzone" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} <input type="hidden" name="gunung_id" value="{{$gunung->id}}">
                </form>
                </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
            <div class="col-md-9 col-sm-12">
                <div class="tile">
                    <h5>Foto </h5>
                    <div class="card-columns">
                        @foreach ($gunung->galeri()->get() as $foto)
                            <div class="card">
                                <a href="{{asset($foto->foto)}}" target="_blank"><img src="{{asset($foto->foto)}}" class=" card-img-top"  alt="" style="width: 100%"></a>

                                <div class="card-body">
                                <button onClick="hapus('{{route('galeri.delete', ['id'=> $foto->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm btn-block">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <div class="row justify-content-md-center">
            <div class="col-md-9 col-sm-12">
                <div class="tile">
                    <h5>Riwayat / Berita tentang gunung
                    <a href="{{route('admin.berita.create').'?gunung_id='.$gunung->id}}" class="btn btn-default btn-sm float-right">Tambah</a>
                    </h5>
                    <br>
                        <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th class="text-center">Dibuat</th>
                                        <th class="text-center">Diupdate</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gunung->berita()->get() as $berita)
                                    <tr>
                                        <td><b>{{$berita->judul}}</b></td>
                                        <td class="text-center">{{hari_tanggal_waktu($berita->created_at, true)}}</td>
                                        <td class="text-center">{{hari_tanggal_waktu($berita->updated_at, true)}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-sm" href="{{route('admin.berita.show', ['id'=> $berita->id])}}">Detail</a>
                                            <a class="btn btn-outline-secondary btn-sm" href="{{route('admin.berita.edit', ['id'=>$berita->id])}}">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
    </div>
</main>

@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
<script>
    function publish(no) {
        $.get('{{ route('admin.gunung.publish')}}?id='+no, function(response){
            console.log(response);
        });
    }
</script>
@endsection
