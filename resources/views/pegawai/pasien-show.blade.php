@extends('pegawai.pegawai-template')
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

            <div class="media">
                    @if (!empty($pasien->foto))
                        <img src="{{asset($pasien->foto)}}" style="max-height: 55px" alt="Icon pasien" class="mr-3">
                    @else
                    <div class="mr-3">
                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                    </div>
                    @endif
            <div class="media-body">
                <h5 class="mt-0">{{$pasien->nama}}</h5>
                {{$pasien->alamat_pasien}}
            </div>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($pasien->foto))
                        <img src="{{asset($pasien->foto)}}" style="max-width: 400px" class="rounded" alt="Icon pasien" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm table-borderless">
                            <tr><td>Nama</td> <td>{{$pasien->nama}}</td></tr>
                            <tr><td>Username</td> <td>{{$pasien->username}}</td></tr>
                            <tr><td>Jenis Kelamin</td> <td>{{$pasien->lp}}</td></tr>
                            <tr><td>Kota</td> <td>{{$pasien->kota}}</td></tr>
                            <tr><td>Alamat</td> <td>{{$pasien->alamat_pasien}}</td></tr>
                            <tr><td>Golongan Darah</td> <td>{{$pasien->gol_darah}}</td></tr>
                            <tr><td>HP</td> <td>{{$pasien->hp_pasien}}</td></tr>
                            <tr><td>Pekerjaan</td> <td>{{$pasien->pekerjaan}}</td></tr>
                            <tr><td>Agama</td> <td>{{$pasien->agama}}</td></tr>
                            <tr><td>Nama Wali</td> <td>{{$pasien->nama_wali}}</td></tr>
                            <tr><td>HP Wali</td> <td>{{$pasien->hp_wali}}</td></tr>
                            <tr><td>Alamat Wali</td> <td>{{$pasien->alamat_wali}}</td></tr>
                        </table>
                    </div>
                </div>
                    <br>

            <div class="tile-footer">
                Terakhir diupdate {{hari_tanggal_waktu($pasien->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapu deskripsi pasien {{$pasien->nama}}" data-url="{{route('pegawai.pasien.delete', ['id'=> $pasien])}}" data-redirect="{{route('pegawai.pasien')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
            </div>
            </div>
        </div>

    </div>
    {{-- <div class="row justify-content-md-center">
            <div class="col-md-9 col-sm-12">
                <div class="tile">
                    <h5>Riwayat / Berita tentang pasien
                    <a href="{{route('pegawai.berita.create').'?pasien_id='.$pasien->id}}" class="btn btn-default btn-sm float-right">Tambah</a>
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
                                    @foreach ($pasien->berita()->get() as $berita)
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

@endsection
