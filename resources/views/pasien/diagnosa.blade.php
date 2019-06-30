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
                        @foreach (Auth::user()->riwayatpasien()->get() as $diagnosa)
                        <tr>
                            <td>{{hari_tanggal_waktu($diagnosa->created_at, true)}}</td>
                            <td>{{$diagnosa->rumahsakit->nama}}</td>
                            <td><a href="{{route('pasien.dokter.show',['id'=>$diagnosa->dokter->id])}}">{{$diagnosa->dokter->nama}}</a></td>
                            <td>{{$diagnosa->alergi}}</td>
                            <td>{{$diagnosa->penyakit}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$diagnosas->links()}}

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
@endsection
