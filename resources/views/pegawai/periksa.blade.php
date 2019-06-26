@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Periksa Pasien</h1>
            <p>Informasi pasien terdaftar</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.periksa.create')}}">
                <i class="fa fa-plus"></i>Tambah Periksa</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Pasien Perawatan</h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Alamat Pasien</th>
                                <th>Jenis Kasus</th>
                                <th>Tanggal Masuk</th>
                                <th>Dokter</th>
                                <th>Pegawai</th>
                                <th>Tanggal Keluar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periksas as $periksa)
                            <tr>
                                <td>{{$periksa->pasien->nomor}}</td>
                                <td><b>{{$periksa->pasien->nama}}</b></td>
                                <td><b>{{$periksa->pasien->alamat_pasien}}</b></td>
                                <td>{{$periksa->jenis_kasus}}</td>
                                <td>{{$periksa->tanggal_masuk}}</td>
                                <td>{{$periksa->dokter->nama}}</td>
                                <td>{{$periksa->pegawai->nama}}</td>
                                <td>{{$periksa->tanggal_keluar}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.periksa.show', ['id'=> $periksa->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.periksa.edit', ['id'=>$periksa->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('pegawai.periksa.delete', ['id'=> $periksa->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$periksas->links()}}

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
@endsection
