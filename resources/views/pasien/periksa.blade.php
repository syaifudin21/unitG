@extends('pasien.pasien-template')
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
                <h3 class="tile-title">Riwayat Pasien Perawatan</h3>
                <div class="bs-component">
                    <table class="table table-sm table-responsive-md">
                        <thead>
                            <tr>
                                <th>Jenis Kasus</th>
                                <th>Cara Datang</th>
                                <th>Masuk Keluar</th>
                                <th>Dokter</th>
                                <th>Perawat / Pegawai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periksas as $periksa)
                            <tr>
                                <td>{{$periksa->jenis_kasus}}</td>
                                <td>{{$periksa->cara_datang}}</td>
                                <td>
                                        Masuk : {{hari_tanggal_waktu($periksa->tanggal_masuk, true)}} <br>
                                        Keluar : {{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}} 
                                </td>
                                <td>{{$periksa->dokter->nama}}</td>
                                <td>{{$periksa->pegawai->nama}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pasien.periksa.show', ['id'=> $periksa->id])}}">Detail</a>
                             
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
