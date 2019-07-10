@extends('pegawai.pegawai-template')
@section('css')
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

            <div class="media">
            <div class="media-body">
                <h5 class="mt-0">{{$pegawai->nama}}</h5>
            </div>
            </div>

    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-12 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($pegawai->foto))
                        <img src="{{asset($pegawai->foto)}}" style="max-width: 100%" class="rounded" alt="Icon pegawai" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm ">
                            <tr><td>Nama</td> <td>{{$pegawai->nama}}</td></tr>
                            <tr><td>Username</td> <td>{{$pegawai->username}}</td></tr>
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
                                @foreach ($pegawai->daftarperiksa()->get() as $periksa)
                                <tr>
                                    <td>{{$periksa->jenis_kasus}}</td>
                                    <td>{{$periksa->cara_datang}}</td>
                                    <td>
                                            Masuk : {{hari_tanggal_waktu($periksa->tanggal_masuk, true)}} <br>
                                            Keluar : {{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}} 
                                    </td>
                                    <td><a href="{{route('pegawai.pasien.show', ['pasien_id'=>$periksa->pasien->id])}}">{{$periksa->pasien->nama}}</a></td>
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
