@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Pasien yang terdaftar</h1>
            <p>Informasi deskripsi pasien</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.pasien.create')}}">
                <i class="fa fa-plus"></i>Tambah Pasien</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar Pasien</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama pasien</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                            <tr>
                                <td>{{$pasien->nomor}}</td>
                                <td><b>{{$pasien->nama}}</b></td>
                                <td>{{$pasien->alamat_pasien}}</td>
                                <td>{{$pasien->username}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.pasien.show', ['id'=> $pasien->id])}}">Detail</a>
                                    <button onClick="hapus('{{route('pegawai.pasien.delete', ['id'=> $pasien->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                             
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
