@extends('pegawai.pegawai-template')
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

            <div class="media">
            <img src="{{asset($dokter->foto)}}" style="max-height: 55px" alt="Icon dokter" class="mr-3">
            <div class="media-body">
                <h5 class="mt-0">{{$dokter->nama}}</h5>
                {{$dokter->alamat}}
            </div>
            </div>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="status('{{$dokter->id}}')" {{($dokter->status_on == 'ON')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
            </label>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center">
                        <h3>{{$dokter->nama}}</h3>
                        <p>{{$dokter->alamat}}</p>
                        <p>{{$dokter->username}}</p>
                    <img src="{{asset($dokter->foto)}}" style="max-width: 400px" class="rounded" alt="Icon dokter" class="mr-3">
                    </div>
                    <br>

            <div class="tile-footer">
                Terakhir diupdate {{hari_tanggal_waktu($dokter->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('pegawai.dokter.edit', ['id'=> $dokter])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapu deskripsi dokter {{$dokter->nama}}" data-url="{{route('pegawai.dokter.delete', ['id'=> $dokter])}}" data-redirect="{{route('pegawai.dokter')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
            </div>
            </div>
        </div>

    </div>
    {{-- <div class="row justify-content-md-center">
            <div class="col-md-9 col-sm-12">
                <div class="tile">
                    <h5>Riwayat / Berita tentang dokter
                    <a href="{{route('pegawai.berita.create').'?dokter_id='.$dokter->id}}" class="btn btn-default btn-sm float-right">Tambah</a>
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
                                    @foreach ($dokter->berita()->get() as $berita)
                                    <tr>
                                        <td><b>{{$berita->judul}}</b></td>
                                        <td class="text-center">{{hari_tanggal_waktu($berita->created_at, true)}}</td>
                                        <td class="text-center">{{hari_tanggal_waktu($berita->updated_at, true)}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-sm" href="{{route('pegawai.berita.show', ['id'=> $berita->id])}}">Detail</a>
                                            <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.berita.edit', ['id'=>$berita->id])}}">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
    </div> --}}
</main>

@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
<script>
    function status(no) {
        $.get('{{ route('pegawai.dokter.status')}}?id='+no, function(response){
            console.log(response);
        });
    }
</script>
@endsection
