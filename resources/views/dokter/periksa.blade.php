@extends('dokter.dokter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Periksa Pasien</h1>
            <p>Informasi pasien terdaftar</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Pasien Perawatan</h3>
                <div class="bs-component">
                    <table class="table table-sm table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nomor Pasien</th>
                                <th>Pasien</th>
                                <th>Jenis Kasus</th>
                                <th>Masuk Keluar</th>
                                <th>Perawat Pegawai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periksas as $periksa)
                            <tr>
                                <td>{{$periksa->pasien->nomor}}</td>
                                <td><b>{{$periksa->pasien->nama}}</b><br>{{$periksa->pasien->alamat_pasien}}</td>
                                <td>{{$periksa->jenis_kasus}} <br>{{$periksa->cara_datang}}</td>
                                <td>
                                        Masuk : {{hari_tanggal_waktu($periksa->tanggal_masuk, true)}} <br>
                                        Keluar : {{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}} 
                                </td>
                                <td>{{$periksa->pegawai->nama}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('dokter.periksa.show', ['id'=> $periksa->id])}}">Detail</a>
                             
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
@endsection
