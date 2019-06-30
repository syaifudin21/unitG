@extends('pasien.pasien-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Keluhan Pasien</h1>
            <p>Rekap keluhan pasien yang telah disampaikan pada setiap pemeriksaaan</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Keluhan Pasien Perawatan</h3>
                <div class="bs-component">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Rumah Sakit</th>
                            <th>GCS</th>
                            <th>T</th>
                            <th>N</th>
                            <th>RR</th>
                            <th>S</th>
                            <th>SAT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($keluhans as $keluhan)
                        <tr>
                            <td rowspan="2">{{hari_tanggal_waktu($keluhan->created_at, true)}}</td>
                            <td>{{$keluhan->rumahsakit->nama}}</td>
                            <td>{{$keluhan->gcs}}</td>
                            <td>{{$keluhan->t}}</td>
                            <td>{{$keluhan->n}}</td>
                            <td>{{$keluhan->rr}}</td>
                            <td>{{$keluhan->s}}</td>
                            <td>{{$keluhan->sat}}</td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>{{$keluhan->keluhan}}</b></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$keluhans->links()}}

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
@endsection
