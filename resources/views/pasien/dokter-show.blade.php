@extends('pasien.pasien-template')
@section('css')
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
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-12 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($dokter->foto))
                        <img src="{{asset($dokter->foto)}}" style="max-width: 100%" class="rounded" alt="Icon dokter" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm ">
                            <tr><td>Nama</td> <td>{{$dokter->nama}}</td></tr>
                            <tr><td>Username</td> <td>{{$dokter->username}}</td></tr>
                            <tr><td>Jenis Kelamin</td> <td>{{$dokter->lp}}</td></tr>
                            <tr><td>Pendidikan</td> <td>{{$dokter->pendidikan}}</td></tr>
                            <tr><td>Alamat</td> <td>{{$dokter->alamat}}</td></tr>
                            <tr><td>HP</td> <td>{{$dokter->hp}}</td></tr>
                            <tr><td>Spesialis</td> <td>{{$dokter->spesialis}}</td></tr>
                            <tr><td>Agama</td> <td>{{$dokter->agama}}</td></tr>
                            <tr><td>Status ON</td> <td>{{$dokter->status_on}}</td></tr>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Daftar Periksa Rumah Saki</strong> <br><br>
                        <table class="table table-sm table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Jenis Kasus</th>
                                    <th>Cara Datang</th>
                                    <th>Masuk Keluar</th>
                                    <th>Pasien</th>
                                    <th>Perawat / Pegawai</th>
                                    <th>Hasil Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter->daftarperiksa()->get() as $periksa)
                                <tr>
                                    <td>{{$periksa->jenis_kasus}}</td>
                                    <td>{{$periksa->cara_datang}}</td>
                                    <td>
                                            Masuk : {{hari_tanggal_waktu($periksa->tanggal_masuk, true)}} <br>
                                            Keluar : {{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}} 
                                    </td>
                                    <td>{{$periksa->pasien->nama}}</td>
                                    <td>{{$periksa->pegawai->nama}}</td>
                                    <td>
                                        @if($periksa->hasil_akhir != NULL)
                                        {!!$periksa->hasil_akhir['akhir_dirawat_ruangan'] != '-' ? "<b>Rawat Ruangan </b>". $periksa->hasil_akhir['akhir_dirawat_ruangan']. ' - '. $periksa->hasil_akhir['akhir_dirawat_kelas']: ''!!}

                                        {!!$periksa->hasil_akhir['akhir_operasi_kamar'] != '-' ? "<b> Operasi </b>". $periksa->hasil_akhir['akhir_operasi_kamar'].' - '. $periksa->hasil_akhir['akhir_operasi_tanggal']: ''!!}
                                        
                                        {!!$periksa->hasil_akhir['akhir_rujuk_ke'] != '-' ? "<b> Rujuk </b>". $periksa->hasil_akhir['akhir_rujuk_ke'].' - '. $periksa->hasil_akhir['akhir_rujuk_alasan']: ''!!}

                                        {!!$periksa->hasil_akhir['akhir_pulang_indikasiMedis'] != '-' ? "<b> Pulang </b>". $periksa->hasil_akhir['akhir_pulang_indikasiMedis'] . "Tanggal ". $periksa->hasil_akhir['akhir_pulang_tanggal']: ''!!}

                                        {!!$periksa->hasil_akhir['akhir_pulang_permintaanSendiri'] != '-' ? "<b> Pulang </b>". $periksa->hasil_akhir['akhir_pulang_permintaanSendiri']: ''!!}

                                        {!!$periksa->hasil_akhir['akhir_pulang_menolakRawat'] != '-' ? "<b> Menolak Rawat </b>". $periksa->hasil_akhir['akhir_pulang_menolakRawat']: ''!!}

                                        {!! !empty($periksa->hasil_akhir['akhir_pulang_meninggalDunia'])? "<b> Meninggal Dunia </b>". $periksa->hasil_akhir['akhir_pulang_meninggalDunia']: ''!!}
                                        
                                        {!!  !empty($periksa->hasil_akhir['akhir_pulang_doa'] ) ? "<b> DOA </b>". $periksa->hasil_akhir['akhir_pulang_doa']: ''!!}
                                        
                                        {!!$periksa->hasil_akhir['akhir_pulang_lain'] != '-' ? "<b> Lain </b>". $periksa->hasil_akhir['akhir_pulang_lain']: ''!!}
                                        @else
                                        Masih Perawatan
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Diagnosa Dokter</strong> <br><br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Rumah Sakit</th>
                                <th>Pasien</th>
                                <th>Alergi</th>
                                <th>Penyakit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dokter->riwayatpasien()->get() as $diagnosa)
                            <tr>
                                <td>{{hari_tanggal_waktu($diagnosa->created_at, true)}}</td>
                                <td>{{$diagnosa->rumahsakit->nama}}</td>
                                <td>{{$diagnosa->pasien->nama}}</td>
                                <td>{{$diagnosa->alergi}}</td>
                                <td>{{$diagnosa->penyakit}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <br><br>
                {{hari_tanggal_waktu(date("Y-m-d H:i:s"), true)}}
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>

            
            </div>
        </div>

    </div>
</main>

@endsection

@section('script')
@endsection
