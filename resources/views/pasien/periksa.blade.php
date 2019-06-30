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
                                <th>Hasil Akhir</th>
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
                                <td><a href="{{route('pasien.dokter.show',['id'=>$periksa->dokter->id])}}">{{$periksa->dokter->nama}}</a></td>
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
                                    {!! !empty($periksa->hasil_akhir['akhir_pulang_doa'] ) ? "<b> DOA </b>". $periksa->hasil_akhir['akhir_pulang_doa']: ''!!}
                                    {!!$periksa->hasil_akhir['akhir_pulang_lain'] != '-' ? "<b> Lain </b>". $periksa->hasil_akhir['akhir_pulang_lain']: ''!!}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pasien.periksa.show', ['id'=> $periksa->id])}}">Detail</a>
                                    </div>
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
