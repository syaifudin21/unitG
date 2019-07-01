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
                    <table  id="sampleTable" class="table table-sm table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nomor Pasien</th>
                                <th>Pasien</th>
                                <th>Jenis Kasus</th>
                                <th>Masuk Keluar</th>
                                <th>Dokter</th>
                                <th>Pegawai</th>
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
                                <td>{{$periksa->dokter->nama}}</td>
                                <td>{{$periksa->pegawai->nama}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.periksa.show', ['id'=> $periksa->id])}}">Detail</a>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection
