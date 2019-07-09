@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Inventaris Terpasang</h1>
            <p>Alat yang terpasang pada pasien</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Periksa UGD</th>
                            <th>Nomor Pasien</th>
                            <th>Pasien</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alatterpasangs as $alatterpasang)
                        <tr>
                            <td>{{$alatterpasang->periksa->nomor_periksa}}</td>
                            <td>{{$alatterpasang->pasien->nomor}}</td>
                            <td>{{$alatterpasang->pasien->nama}}</td>
                            <td>{{$alatterpasang->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
			  
            </div>
        </div>
    </div>

</main>

@endsection

@section('script')
@endsection
