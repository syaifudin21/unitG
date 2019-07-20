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
        <div class="col-md-12 col-sm-12">
			<div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                            @if (!empty($pasien->foto))
                            <img src="{{asset($pasien->foto)}}" style="width:100%; max-width: 300px" class="rounded" alt="Icon pasien" class="mr-3">
                            @else
                            <div class="text-center m-3">
                            <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                            </div>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-sm">
                            <tr><th colspan="2">Profil Pasien</th></tr>
                            <tr><td>Nama</td> <th id="pasienNama">{{$pasien->nama}}</th></tr>
                            <tr><td>Username</td> <th id="pasienUsername">{{$pasien->username}}</th></tr>
                            <tr><td>Jenis Kelamin</td> <th id="pasienLp">{{$pasien->lp}}</th></tr>
                            <tr><td>Kota</td> <th id="pasienKota">{{$pasien->kota}}</th></tr>
                            <tr><td>Alamat</td> <th id="pasienAlamat">{{$pasien->alamat_pasien}}</th></tr>
                            <tr><td>Golongan Darah</td> <th id="pasienGolDarah">{{$pasien->gol_darah}}</th></tr>
                            <tr><td>HP</td> <th id="pasienHp">{{$pasien->hp_pasien}}</th></tr>
                            <tr><td>Pekerjaan</td> <th id="pasienPekerjaan">{{$pasien->pekerjaan}}</th></tr>
                            <tr><td>Agama</td> <th id="pasienAgama">{{$pasien->agama}}</th></tr>
                            <tr><td>Nama Wali</td> <th id="pasienNamaWali">{{$pasien->nama_wali}}</th></tr>
                            <tr><td>HP Wali</td> <th id="pasienHpWali">{{$pasien->hp_wali}}</th></tr>
                            <tr><td>Alamat Wali</td> <th id="pasienAlamatWali">{{$pasien->alamat_wali}}</th></tr>
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
                                    <th>Dokter</th>
                                    <th>Perawat / Pegawai</th>
                                    <th>Hasil Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien->daftarperiksa()->get() as $periksa)
                                <tr>
                                    <td>{{$periksa->jenis_kasus}}</td>
                                    <td>{{$periksa->cara_datang}}</td>
                                    <td>
                                            Masuk : {{hari_tanggal_waktu($periksa->tanggal_masuk, true)}} <br>
                                            Keluar : {{!empty($periksa->tanggal_keluar)? hari_tanggal_waktu($periksa->tanggal_keluar, true) : '-'}} 
                                    </td>
                                    <td><a href="{{route('pegawai.dokter.show', ['dokter_id'=>$periksa->dokter->id])}}">{{$periksa->dokter->nama}}</a></td>
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
                                <th>Dokter</th>
                                <th>Alergi</th>
                                <th>Penyakit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pasien->riwayatpasien()->get() as $diagnosa)
                            <tr>
                                <td>{{hari_tanggal_waktu($diagnosa->created_at, true)}}</td>
                                <td>{{$diagnosa->rumahsakit->nama}}</td>
                                <td><a href="{{route('pegawai.dokter.show', ['dokter_id'=>$periksa->dokter->id])}}">{{$diagnosa->dokter->nama}}</a></td>
                                <td>{{$diagnosa->alergi}}</td>
                                <td>{{$diagnosa->penyakit}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Keluhan Pasien</strong> <br><br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>RS & Tanggal</th>
                                <th>GCS</th>
                                <th>T</th>
                                <th>N</th>
                                <th>RR</th>
                                <th>S</th>
                                <th>SAT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pasien->observasilanjutan()->get() as $keluhan)
                            <tr>
                                <td><b>{{$keluhan->rumahsakit->nama}}</b></td>
                                <td>{{$keluhan->gcs}}</td>
                                <td>{{$keluhan->t}}</td>
                                <td>{{$keluhan->n}}</td>
                                <td>{{$keluhan->rr}}</td>
                                <td>{{$keluhan->s}}</td>
                                <td>{{$keluhan->sat}}</td>
                            </tr>
                            <tr>
                                <td>{{hari_tanggal_waktu($keluhan->created_at, true)}}</td>
                                <td colspan="6"><b>{{$keluhan->keluhan}}</b></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br>
            {{hari_tanggal_waktu(date("Y-m-d H:i:s"), true)}}
            <hr>
            
            <div class="row d-print-none mt-2">
                
                <div class="col-12 text-right">
                    <button onClick="hapus('{{route('pegawai.pasien.reset', ['id'=> $pasien->id])}}', 'Pasien akan direset?')" class="btn btn-danger">Reset Password Pasien</button>
                    <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                </div>
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
